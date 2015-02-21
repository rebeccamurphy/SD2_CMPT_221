

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
		$residence = $_POST['residence'];


		hidePage1();
		//TODO Write function to bring you to the confirmatin 2nd
		//and a separate function to bring you to the go back second page
		//and a third function to display the information details on both
		if (($residence=='champ' || $residence =='leo'||$residence=='sheahan' ||$residence=='marian') && $class==1){
			//Freshman
			//valid and proceed to next page

		}

		else if (($residence=='midrise' || $residence =='gartland'||$residence=='foy' ||$residence=='uppernew'||$residence=='lowernew') && $class==2){
			//Sophmore 
			//valid and proceed to next page
		}
		else if (($residence=='lowerfulton' || $residence =='lowerwest'||$residence=='midfulton' ||$residence=='upperwest'||$residence=='upperfulton') && ($class==3 || $class==4 )){
			if ($residence == 'upperfulton &&' $laundry =='laundry'){
				//upperfulton does not have laundry on premises so selection is invalid
				//go back to page one
			}
			//Junior Senior
			//valid and proceed to next page
		}
		else{
			//invalid selection
			//go back to page one
		}

		displayPage2();
    }
    elseif(isset($_POST['selectionMade'])){

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
	</div>
	</body>
</html>