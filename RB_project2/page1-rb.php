<!--
Rebecca Murphy
Richard C Brown

Team Dayzd & Confuzd
2/25/15
SD2
Project 2
-->
<?php
session_start();
require_once 'connect.php';

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
mysql_close($conn);
}


?>
<html>
	<title> Project 2 </title>
	<head>
		<p>
			<h1> Housing Recommendation Form </h1>
		</p>
	</head>
	<body>
	<div id="page1"> 
		<form action="page2-rb.php" method='post'>
			<label for="name" >Name</label>
			<input type="text" required="required" name="name">
			<br>
			<br>
			<label for="cwid">CWID</label>
			<input type="text" name="cwid"required="required">
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

			
			<option value="None">None</option>
		<?php 
			foreach ($halls as $hall){
				if ($hall['slots']>=5){
					echo "<option value=" .$hall['hall'] .">".$hall['hall']."</option>";
				}
				else
					echo "<option value=" .$hall['hall'] ." disabled>".$hall['hall']."</option>";
			}
		?>

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
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>