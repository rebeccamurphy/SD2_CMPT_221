

 <?php

 	session_start();
 	function displayPage1(){
 		echo '<style>#page1{display:block!important;}</style>';
 	}
 	function hidePage1(){
 		echo '<style>#page1{display:none!important;}</style>';
 	}
 	function displayPage2(){
 		echo '<style>#page2{display:block!important;}</style>';
 	}
 	function hidePage2(){
 		echo '<style>#page2{display:none!important;}</style>';
 	}
 	function displayPage3(){
 		echo '<style>#page3{display:block!important;}</style>';
 	}
 	function hidePage3(){
 		echo '<style>#page3{display:none!important;}</style>';
 	}
 	$displayConfirm =false;
 	if (isset($_POST['back'])) {
	    hidePage2();
	    displayPage1();
    }
    else if (isset($_POST['confirm'])) {
    	hidePage1();
	    hidePage2();
	    $residence = $_POST['options'];
	    displayPage3();
	    $displayConfirm = true;
    }

    else if(isset($_POST['submitForm'])) {
    	//page 1 form submitted
		$name = $_POST["name"];
		$CWID = $_POST['cwid'];
		$gender = $_POST['gender'];
		$class = $_POST['class'];
		$coed = $_POST['coedOption'];
		$laundry =  isset($_POST['laundry']) ? $_POST['laundry'] : '';
		$handicap =  isset($_POST['handicap']) ? $_POST['handicap'] : '';
		$housingKind = $_POST['housingKind'];
		$residence = $_POST['residence'];

		$_SESSION['name'] = $name;
		$_SESSION['CWID'] = $CWID;
		$_SESSION['gender'] = $gender;
		$_SESSION['class'] = $class;
		$_SESSION['coed'] = $coed;
		$_SESSION['laundry'] = $laundry;
		$_SESSION['handicap'] = $handicap;
		$_SESSION['housingKind'] = $housingKind;

		hidePage1();
		
		displayPage2();

		

		//TODO Write function to bring you to the confirmatin 2nd
		//and a separate function to bring you to the go back second page
		//and a third function to display the information details on both
		if ($coed == 'coed'){
			//there is no coed housing
			$valid = false;
		}
		else if ($housingKind=='apartment'){
			//there are no apartment dorms on campus
			$valid = false;
		}
		else if (($residence=='champ' || $residence =='leo'||$residence=='sheahan' ||$residence=='marian') && $class==1){
			//Freshman
			//valid and proceed to next page
			if ($housingKind!='dorm')
				$valid = false;
			else
				$valid = true;	
		}

		else if (($residence=='midrise' || $residence =='gartland'||$residence=='foy' ||$residence=='uppernew'||$residence=='lowernew') && $class==2){
			//Sophmore 
			if (($housingKind=='dorm' && $residence!='midrise') ||($residence=='midrise'&&$housingKind!='dorm'))
				$valid=false;
			else
				$valid = true;
		}
		else if (($residence=='lowerfulton' || $residence =='lowerwest'||$residence=='midfulton' ||$residence=='upperwest'||$residence=='upperfulton'||$residence=='talmadge') && ($class==3 || $class==4 )){
			
			//Junior Senior
			//valid and proceed to next page
			if ($housingKind=='dorm')
				$valid = false;
			else if ($residence == 'upperfulton' && $laundry =='laundry'){
				//upperfulton does not have laundry on premises so selection is invalid
				//go back to page one
				$valid = false;
			}
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
				<option value="female">Female</option>
				<option value="male">Male</option>
				<option value="other">Other</option>
			</select>
			<br>
			<br>
			
		<div>Residential Life Options List</div>
		<select name='residence'>
			<!--Freshman Housing-->
			<option value="none">None</option>
			<option value="champ">Champ</option>
			<option value='leo'>Leo</option>
			<option value="sheahan">Sheahan</option>
			<option value="marian">Marian</option>
		
		<!--sophmore Housing-->
		
			<option value="foy">Foy</option>
			<option value='uppernew'>Upper New</option>
			<option value="lowernew">Lower New</option>
			<option value="gartland">Gartland</option>
			<option value="midrise">Mid Rise</option>
		<!--junior or senior Housing-->
			<option value="lowerwest">Lower West</option>
			<option value='lowerfulton'>Lower Fulton</option>
			<option value="midfulton">Mid Fulton</option>
			<option value="upperwest">Upper West</option>
			<option value="upperfulton">Upper Fulton</option>
			<option value="talmadge">Talmadge Court</option>

		</select>
		<br><br>
			<label for='class'>Class</label>
			<select name='class'>
				<option value="4">Senior</option>
				<option value="3">Junior</option>
				<option value="2">Sophmore</option>
				<option value="1">Freshman</option>
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
				<option value="apartment">Apartment</option>
				<option value="townhouse">Townhouse</option>
				<option value="dorm">Dormitory</option>
			</select>			
			<br>
			<br>
			<label for='coedOption'>Coed or Non-Coed</label>
			<select name='coedOption'>
				<option value="coed">Coed</option>
				<option value="noncoed">Non-Coed</option>
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
			print '<p>Coed Option : ' .$coed .'</p>';
				$laundryOption = ($laundry=='laundry') ? 'Yes' : 'No';
			print '<p>Laundry on premises:'.$laundryOption .' </p>';
				$handicapOption = ($handicap=='handicap') ? 'Yes' : 'No';
			print '<p>Handicap Accessible: '.$handicapOption .' </p>';
			print '<p>Kind of Housing: ' .$housingKind .'</p>';
	
			if($valid){
				//valid choice
				echo '<p>Your housing choice was valid with your options. Click confirm to go to the confirmation page.</p>';
				echo "<form action='index.php' method='post'>
					<input type='submit' value='Confirm' name='confirm'>
					<input type='submit' value='Go Back' name='back'>
					</form>";
			}
			else if (!$valid && $residence!=='none'){
				//invalid choice
				echo '<p>Your choice with your preferences was not valid. Click go back to try again.<p>';
				echo "<form action='index.php' method='post'>
					<input type='submit' value='Go Back' name='back'>
					</form>";										
			}
			else if (!$valid && $residence=='none') {
				//no choice made, so display options
				switch($class){
					case 4:
					case 3:
						if ($laundry =='laundry')
							$options = array('lowerfulton','lowerwest','midfulton','upperwest','talmadge');
						else
							$options = array('lowerfulton','lowerwest','midfulton','upperwest','upperfulton','talmadge');
						break;
					case 2:
						if ($housingKind!='dorm')
							$options = array('gartland','foy','uppernew','lowernew');
						else
							$options = array('midrise');
						break;
					case 1:
						if ($housingKind=='dorm')
							$options = array('champ','leo','sheahan','marian');
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
		?>
	</div>
	<div id='page3'>
		<?php
			if ($displayConfirm){
				print "<p>Confirmation Page</p>";
				print '<p>Residence Preference: '. $residence .'</p>';
				print '<p>Name: ' .$_SESSION['name'].'</p>';
				print '<p>CWID: ' .$_SESSION['CWID'].'</p>';
				print '<p>Gender: ' .$_SESSION['gender'] .'</p>';
				print '<p>Class: ' .$_SESSION['class'] .'</p>';
				print '<p>Coed Option : ' .$_SESSION['coed'] .'</p>';
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