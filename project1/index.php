

 <?php

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

    if(isset($_POST['submitForm'])) {
    	//page 1 form submitted
		$name = $_POST["name"];
		$CWID = $_POST['cwid'];
		$gender = $_POST['gender'];
		$class = $_POST['class'];
		$laundry =  isset($_POST['laundry']) ? $_POST['laundry'] : '';
		$handicap =  isset($_POST['handicap']) ? $_POST['handicap'] : '';
		$housingKind = $_POST['housingKind'];

		hidePage1();
		displayPage2();
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
			<select name='housingKind'>
				<option value="apartment">Apartment</option>
				<option value="townhouse">Townhouse</option>
				<option value="dorm">Dormitory</option>
			</select>			
			<br>
			<br>
			<select>
				<option value="coed">Coed</option>
				<option value="noncoed">Non-Coed</option>
			</select>			

			<input type="submit" value="Submit" name='submitForm'>
		</form>
	</div>
	<div id='page2'>
			<!--Freshman Housing-->
			<select>
				<option value="volvo">Volvo</option>
				<option value="saab">Saab</option>
				<option value="mercedes">Mercedes</option>
				<option value="audi">Audi</option>
			</select>

			</div>
	</body>
</html>