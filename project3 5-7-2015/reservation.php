<!--
reservation.php

Rebecca Murphy
Richard C Brown

Team Dayzd & Confuzd
5/2/2015
SD2
Project 3
-->
<?php
session_start();
require_once 'db.php';

$hasReservation =checkHasReservation();

if (isset($_POST['option'])) {
	$option = $_POST['option'];

	if ($option ==="DELETE"){
		deleteReservation();
		$hasReservation =checkHasReservation();
		if (!$hasReservation)
			echo "<b>Deleted Sucessfully</b>";
		else
			echo "<b>Delete Failed</b>";
	}
	else {
		$_SESSION["option"] = $option;
		header("Location: page1-rb.php");
	}

}
?>
<html>
	<title> Project 3 </title>
	<head>
		<p>
			<h1>Reservation Page</h1>
		</p>
	</head>
	<body>
	<?php echo"<h2>Hello, ".$_SESSION["username"]."</h2>"?>
	  
	<form action="reservation.php" method='post'>
			<select name='option'>
			<?php 
				if ($hasReservation)
					echo '<option value="DELETE">Delete Reservation</option>';
				else{
					echo '<option value="CREATE">Create Reservation</option>';
					echo '<option value="UPDATE">Update Reservation</option>';
				}
			?>
			</select>	
		<input type="submit" value="Submit" name='submitForm'>
	</form>	
			
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>

