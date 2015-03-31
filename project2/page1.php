<!--
Rebecca Murphy
2/25/15
SD2
Project 1
-->

<html>
	<title>Project 1 </title>
	<head>
		<p>
			Housing Recommendation Form 
		</p>
	</head>
	<body>
	<div id="page1"> 
		<form action="page2.php" method='post'>
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
	
	</body>
</html>