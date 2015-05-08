<!--
page3-rb.php
Rebecca Murphy
Richard C Brown

Team Dayzd & Confuzd
2/25/15
SD2
Project 3
-->
<?php
	session_start();
	$residence = $_POST['options'];
	$_SESSION['residence'] = $residence;

	require_once 'connect.php';
	

	if ($db_found){
		if ($_SESSION["option"] ==="UPDATE"){
			deleteReservation();
		}
		//save reservation
		$sql = "INSERT INTO reservations (username, ra) VALUES ('".$_SESSION['username'] ."','".$_SESSION['residence']."');";
		$result = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);

		//get slot numbers of residence
		$sql = 'SELECT * FROM residence_areas WHERE hall="' .  $_SESSION['residence'].'"' ;
		$result = mysql_query($sql)or trigger_error(mysql_error()." in ".$sql);;
		$numSlots = mysql_fetch_array($result)['slots'];
		//--$numSlots;
		
		if (!$numSlots <=0)
			$sql = 'UPDATE residence_areas SET slots='. --$numSlots. ' WHERE hall="' .$_SESSION['residence'].'"';

		$res = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);

	mysql_close($conn);
	}

?>
<html>
	<title>Project 3 </title>
	<head>
		<p>
			<h1> Reservation Confirmation Page </h1> 
		</p>
	</head>
	<body>
	<div id='page3'>
		<?php
				// print "<p>Confirmation Page</p>";
				print '<p>Residence Preference: '.  $_SESSION['residence'] .'</p>';
				print '<p>Name: ' .$_SESSION['stuName'].'</p>';  //fixed by Rick
				print '<p>CWID: ' .$_SESSION['stuCWID'].'</p>';  //fixed by Rick
				print '<p>Gender: ' .$_SESSION['stuGender'] .'</p>'; //fixed by Rick
				print '<p>Class: ' .$_SESSION['stuClass'] .'</p>';  //fixed by Rick
				print '<p>Coed Option : ' .$_SESSION['Coed'] .'</p>';
					$laundryOption = ($_SESSION['laundry']=='laundry') ? 'Yes' : 'No';
				print '<p>Laundry on premises:'.$laundryOption .' </p>';
					$handicapOption = ($_SESSION['handicap']=='handicap') ? 'Yes' : 'No';
				print '<p>Handicap Accessible: '.$handicapOption .' </p>';
				print '<p>Kind of Housing: ' .$_SESSION['housingKind'] .'</p>';
		?>
	</div>
	<p></p>
	<a href="logout.php">Log Out</a>
	
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	
	</body>
</html>