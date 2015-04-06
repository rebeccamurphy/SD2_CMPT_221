<!--
Rebecca Murphy
2/25/15
SD2
Project 1
-->
<?php
	session_start();
	$residence = $_POST['options'];
	$_SESSION['residence'] = $residence;

	// connects to the database
	$servername="localhost";
	$username="root";
	$password="";
	$dbname = "housing_selection";



	$conn = mysql_connect($servername,$username,$password);
	$db_found = mysql_select_db($dbname, $conn);

	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
	if ($db_found){
		$sql = "INSERT INTO reservation (name, cwid, gender, class, ra) VALUES ('".$_SESSION['name']."','".$_SESSION['CWID']."','".$_SESSION['gender']."','".$_SESSION['class']."','".$_SESSION['residence']."');";
		$result = mysql_query($sql);


	$res = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);

	mysql_close($conn);
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
	<div id='page3'>
		<?php
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
			
		?>
	</div>
	</body>
</html>