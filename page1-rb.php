<!--
Rebecca Murphy
Richard C Brown

Team Dayzd & Confuzd
2/25/15
SD2
Project 3
-->
<?php
session_start();
require_once 'connect.php';
require_once 'db.php';  // ricks little test

if ($db_found){
	$sql = "SELECT * FROM residence_areas;";
	$result = mysql_query($sql);

	

$res = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);

$halls = array();

$index = 0;
while($row = mysql_fetch_assoc($result)) {
     $halls[$index] = $row;
     $index++;
}
// Ricks little test
    $msg = $_SESSION['stuName'];
    echo "Hello $msg<br>";
    $msg = $_SESSION["stuCWID"];
	echo "CWID: $msg<br>";
	$msg = $_SESSION["stuGender"];
	echo "Gender: $msg<br>";
	$msg = $_SESSION["stuClass"];
	echo "Class: $msg<br>";
/*
   //$msg=$_SESSION['stuName'];
   $msg=checkKind();
   echo "checkKind =$msg<br>";
   
   $username= $_SESSION["username"];
   /*
   $sql = "SELECT kind FROM users WHERE username ='".$username."'";
   echo "The query is: $sql<br>";
   $result = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
   $row = mysql_fetch_assoc($result);
   $kind = $row['kind'];
   echo "Kind: $kind<br>";
   */
// end Ricks little test

mysql_close($conn);
}


?>
<html>
	<title> Project 3 </title>
	<head>
		<p>
			<h1> Housing Recommendation Form </h1>
		</p>
	</head>
	<body>
	<div id="page1"> 
		<form action="page2-rb.php" method='post'>      
		<div>Residential Life Options List</div>
		<select name='residence'>

			
		<option value="None">None</option>
		<?php 
			foreach ($halls as $hall){
				if ($hall['slots']>0){
					echo "<option value=" .$hall['hall'] .">".$hall['hall']."</option>";
				}
				else
					echo "<option value=" .$hall['hall'] ." disabled>".$hall['hall']."</option>";
			}
		?>

		</select>
		<br><br>
			
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
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>