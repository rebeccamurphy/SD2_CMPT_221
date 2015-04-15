<!--
Rebecca Murphy
2/25/15
SD2
Project 1
-->
<?php
session_start();
require_once 'connect.php';


if ($db_found){
	$sql = "SELECT * FROM residence_areas;";
	$result = mysql_query($sql);


$res = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);

$halls = array();

while($row = mysql_fetch_assoc($result)) {
     $halls[$row["hall"]] = $row;
}
var_dump($halls);
var_dump($halls["Lower West Cedar St Townhouses"]);
mysql_close($conn);
}
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
		else if (($residence=='New Fulton Townhouses' || $residence =='Lower West Cedar St Townhouses' ||$residence=='Upper West Cedar St Townhouses'||$residence=='Fulton Street Townhouses'||$residence=='Talmadge Court') && ($class=='Junior' || $class=='Senior' )){
			
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


?>

<html>
	<title>Project 1 </title>
	<head>
		<p>
			<h1> Housing Recommendation Form </h1
		</p>
	</head>
	<body>
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
				echo "<form action='page3-rb.php' method='post'>
					<input type='submit' value='Confirm' name='confirm'>
					</form>";
				echo "<input type='submit' value='Go Back' name='back' onClick='document.location.href='page1-rb.php''>";
			
			}
			else if (!$valid && $residence=='None') {
				//no choice made, so display options
				switch($class){
					case 'Senior':
					case 'Junior':
						if ($laundry =='laundry')
							$options = array('New Fulton Townhouses','Lower West Cedar St Townhouses','Upper West Cedar St Townhouses','Talmadge Court');
						else
							$options = array('New Fulton Townhouses','Lower West Cedar St Townhouses','Upper West Cedar St Townhouses','Fulton St Townhouses','Talmadge Court');
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
					echo "<form action='page1-rb.php' method='post'>
					<input type='submit' value='Go Back' name='back'>
					</form>";

				}
				else{
					echo '<p> Based on your preferences, you have the following options to choose from:</p>';
					echo "<form action='page3-rb.php' method='post'>";
					echo "<label for='options'>Options</label>";
					echo "<select name='options'>";
					foreach ($options as $value){
						if ($halls[$value]['slots']>0)
							print "<option value='". $value."'>".$value. "</option>";
						else
							print "<option value='". $value."' disabled >".$value. "</option>";
					}
					echo "</select>";
					echo "<p>Select Confirm to go to the confirmation page or go back to rechoose.</p>";

					echo "<input type='submit' value='Confirm' name='confirm'>
					</form>";
					echo "<input type='submit' value='Go Back' name='back' onClick='document.location.href='page1-rb.php''>";
				}

			}
			else if (!$valid || $invalidPref){
				//invalid choice
				echo '<p>Your choice with your preferences was not valid. Click go back to try again.<p>';
				echo "<form action='page1-rb.php' method='post'>
					<input type='submit' value='Go Back' name='back'>
					</form>";										
			}
		?>
	</div>
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	
	</body>
</html>