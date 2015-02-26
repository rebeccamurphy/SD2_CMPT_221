<!--
Rebecca Murphy
2/25/15
SD2
Project 1
-->
 <?php

 	session_start();
 	function displayPage1(){
 		echo '<style>#page1{display:block!important;}</style>';
 	}
 	function hidePage1(){
 		echo '<style>#page1{display:None!important;}</style>';
 	}
 	function displayPage2(){
 		echo '<style>#page2{display:block!important;}</style>';
 	}
 	function hidePage2(){
 		echo '<style>#page2{display:None!important;}</style>';
 	}
 	function displayPage3(){
 		echo '<style>#page3{display:block!important;}</style>';
 	}
 	function hidePage3(){
 		echo '<style>#page3{display:None!important;}</style>';
 	}
 	$displayConfirm =false;
 	if (isset($_POST['back'])) {
	    hidePage2();
	    displayPage1();
    }
    else if (isset($_POST['confirm'])) {
    	hidePage1();
	    hidePage2();

	    if (isset($_POST['options'])) {
	    	$residence = $_POST['options'];
	    	$_SESSION['residence'] = $residence;
		}
	    displayPage3();
	    $displayConfirm = true;
    }

    else if(isset($_POST['submitForm'])) {
    	//page 1 form submitted
		$name = $_POST["name"];
		$CWID = $_POST['cwid'];
		$gender = $_POST['gender'];
		$class = $_POST['class'];
		$Coed = $_POST['CoedOption'];
		$laundry =  isset($_POST['laundry']) ? $_POST['laundry'] : '';
		$handicap =  isset($_POST['handicap']) ? $_POST['handicap'] : '';
		$housingKind = $_POST['housingKind'];
		$residence = $_POST['residence'];

		$_SESSION['name'] = $name;
		$_SESSION['CWID'] = $CWID;
		$_SESSION['gender'] = $gender;
		$_SESSION['class'] = $class;
		$_SESSION['Coed'] = $Coed;
		$_SESSION['laundry'] = $laundry;
		$_SESSION['handicap'] = $handicap;
		$_SESSION['housingKind'] = $housingKind;

		hidePage1();
		displayPage2();

		if ($Coed == 'Coed'){
			//there is no Coed housing
			$invalidPref = true;
		}
		if ($housingKind=='Apartment'){
			//there are no Apartment Dorms on campus
			$invalidPref = true;
		}
		if (($residence=='Champagnat Hall' || $residence =='Leo Hall'||$residence=='Sheahan Hall' ||$residence=='Marian Hall') && $class=='Freshman'){
			//Freshman
			//valid and proceed to next page
			if ($housingKind!='Dormitory')
				$valid = false;
			else
				$valid = true;	
		}

		else if (($residence=='Midrise Hall' || $residence =='Gartland Commons'||$residence=='Foy Townhouses' ||$residence=='New Townhouses') && $class=='Sophmore'){
			//Sophmore 
			if (($housingKind=='Dormitory' && $residence!='Midrise Hall') ||($residence=='Midrise Hall'&&$housingKind!='Dormitory'))
				$valid=false;
			else
				$valid = true;
		}
		else if (($residence=='New Fulton Townhouses' || $residence =='Lower West Cedar St Townhouses ' ||$residence=='Upper West Cedar St Townhouses'||$residence=='Fulton Street Townhouses'||$residence=='Talmadge Court') && ($class=='Junior' || $class=='Senior' )){
			
			//Junior Senior
			//valid and proceed to next page
			if ($housingKind=='Dormitory')
				$valid = false;
			else
				$valid = true;
		}
		else{
			//invalid selection
			//go back to page one
			$valid = false;
		}

    }
    else{
    	hidePage2();
    	hidePage3();
    }
    ?>


<html>
	<title>Project 1 </title>
	<head>
		<p>
			Housing Recommendation Form 
		</p>
	</head>
	<body>
	<div id="page1"> 
		<form action="index.php" method='post'>
			<label for="name">Name</label>
			<input type="text" name="name">
			<br>
			<br>
			<label for="cwid">CWID</label>
			<input type="text" name="cwid">
			<br>
			<br>
			<label for='gender'>Gender</label>
			<select name ='gender'>
				<option value="Female">Female</option>
				<option value="Male">Male</option>
				<option value="Other">Other</option>
			</select>
			<br>
			<br>
			
		<div>Residential Life Options List</div>
		<select name='residence'>
			<!--Freshman Housing-->
			<option value="None">None</option>
			<option value="Champagnat Hall">Champagnat Hall</option>
			<option value='Leo Hall'>Leo Hall</option>
			<option value="Sheahan Hall">Sheahan Hall</option>
			<option value="Marian Hall">Marian Hall</option>
		
		<!--Sophmore Housing-->
		
			<option value="Foy Townhouses">Foy Townhouses</option>
			<option value='New Townhouses'>New Townhouses</option>
			<option value="Gartland Commons">Gartland Commons</option>
			<option value="Midrise Hall">Mid Rise</option>
		<!--junior or senior Housing-->
			<option value="Lower West Cedar St Townhouses ">Lower West Cedar St Townhouses </option>
			<option value='New Fulton Townhouses'>New Fulton Townhouses</option>
			<option value="Upper West Cedar St Townhouses">Upper West Cedar St Townhouses</option>
			<option value="Fulton Street Townhouses">Fulton Street Townhouses</option>
			<option value="Talmadge Court">Talmadge Court Court</option>

		</select>
		<br><br>
			<label for='class'>Class</label>
			<select name='class'>
				<option value="Senior">Senior</option>
				<option value='Junior'>Junior</option>
				<option value="Sophmore">Sophmore</option>
				<option value="Freshman">Freshman</option>
			</select>
			<br>
			<br>
			<label for='handicap'> Handicap Accessible?</label>
			<input type="checkbox" name="handicap" value="handicap">
			<br>
			<br>
			<label for='laundry'>Laundry on premise?</label>
			<input type="checkbox" name="laundry" value="laundry">
			<br>
			<br>
			<label for='housingKind'>Kind of Housing?</label>
			<select name='housingKind'>
				<option value="Apartment">Apartment</option>
				<option value="Townhouse">Townhouse</option>
				<option value="Dormitory">Dormitory</option>
			</select>			
			<br>
			<br>
			<label for='CoedOption'>Coed or Non-Coed</label>
			<select name='CoedOption'>
				<option value="Coed">Coed</option>
				<option value="NonCoed">Non-Coed</option>
			</select>			
			<br><br>
			<input type="submit" value="Submit" name='submitForm'>
		</form>
	</div>
	<div id='page2'>
		<?php
			print '<p>Residence Preference: ' .$residence .'</p>';
			print '<p>Name: ' .$name .'</p>';
			print '<p>CWID: ' .$CWID .'</p>';
			print '<p>Gender: ' .$gender .'</p>';
			print '<p>Class: ' .$class .'</p>';
			print '<p>Coed Option : ' .$Coed .'</p>';
				$laundryOption = ($laundry=='laundry') ? 'Yes' : 'No';
			print '<p>Laundry on premises:'.$laundryOption .' </p>';
				$handicapOption = ($handicap=='handicap') ? 'Yes' : 'No';
			print '<p>Handicap Accessible: '.$handicapOption .' </p>';
			print '<p>Kind of Housing: ' .$housingKind .'</p>';
	
			if($valid){

				//valid choice
				$_SESSION['residence'] = $residence;
				echo '<p>Your housing choice was valid with your options. Click confirm to go to the confirmation page.</p>';
				echo "<form action='index.php' method='post'>
					<input type='submit' value='Confirm' name='confirm'>
					<input type='submit' value='Go Back' name='back'>
					</form>";
			}
			else if (!$valid && $residence=='None') {
				//no choice made, so display options
				switch($class){
					case 'Senior':
					case 'Junior':
						if ($laundry =='laundry')
							$options = array('New Fulton Townhouses','Lower West Cedar St Townhouses ','Upper West Cedar St Townhouses','Talmadge Court Court');
						else
							$options = array('New Fulton Townhouses','Lower West Cedar St Townhouses ','Upper West Cedar St Townhouses','Fulton Street Townhouses','Talmadge Court Court');
						break;
					case 'Sophmore':
						if ($housingKind!='Dormitory')
							$options = array('Gartland Commons','Foy Townhouses','New Townhouses');
						else
							$options = array('Midrise Hall');
						break;
					case 'Freshman':
						if ($housingKind=='Dormitory')
							$options = array('Champagnat Hall','Leo Hall','Sheahan Hall','Marian Hall');
						else
							$options = null;
						break;
				}
				if (is_null($options)){
					echo '<p> Based on your preferences, you have no options. Please go back and try again.<p>';
					echo "<form action='index.php' method='post'>
					<input type='submit' value='Go Back' name='back'>
					</form>";

				}
				else{
					echo '<p> Based on your preferences, you have the following options to choose from:</p>';
					echo "<form action='index.php' method='post'>";
					echo "<label for='options'>Options</label>";
					echo "<select name='options'>";
					foreach ($options as $value){
						print "<option value='". $value."'>".$value. "</option>";
					}
					echo "</select>";
					echo "<p>Select Confirm to go to the confirmation page or go back to rechoose.</p>";

					echo "<form action='index.php' method='post'>
					<input type='submit' value='Confirm' name='confirm'>
					<input type='submit' value='Go Back' name='back'>
					</form>";
				}

			}
			else if (!$valid || $invalidPref){
				//invalid choice
				echo '<p>Your choice with your preferences was not valid. Click go back to try again.<p>';
				echo "<form action='index.php' method='post'>
					<input type='submit' value='Go Back' name='back'>
					</form>";										
			}
		?>
	</div>
	<div id='page3'>
		<?php
			if ($displayConfirm){
				print "<p>Confirmation Page</p>";
				print '<p>Residence Preference: '.  $_SESSION['residence'] .'</p>';
				print '<p>Name: ' .$_SESSION['name'].'</p>';
				print '<p>CWID: ' .$_SESSION['CWID'].'</p>';
				print '<p>Gender: ' .$_SESSION['gender'] .'</p>';
				print '<p>Class: ' .$_SESSION['class'] .'</p>';
				print '<p>Coed Option : ' .$_SESSION['Coed'] .'</p>';
					$laundryOption = ($_SESSION['laundry']=='laundry') ? 'Yes' : 'No';
				print '<p>Laundry on premises:'.$laundryOption .' </p>';
					$handicapOption = ($_SESSION['handicap']=='handicap') ? 'Yes' : 'No';
				print '<p>Handicap Accessible: '.$handicapOption .' </p>';
				print '<p>Kind of Housing: ' .$_SESSION['housingKind'] .'</p>';
			}
		?>
	</div>
	</body>
</html>