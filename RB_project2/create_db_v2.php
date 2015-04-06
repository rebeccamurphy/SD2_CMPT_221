<?php
// creates the database from scratch


$servername="localhost";
$username="root";
$password="";
//$dbname = "housing_selection";



$conn = mysqli_connect($servername,$username,$password);
if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}




$sql = "CREATE DATABASE housing_selection";
if (!mysqli_query($conn,$sql)) {echo "Error creating database: ".mysqli_error($conn);} 


$sql = "USE housing_selection_test";
if (!mysqli_query($conn,$sql)) {echo "Error switching to HOUSING_SELECTION_TEST db: ".mysqli_error($conn);} 


//----------------------------------------------------------------------------------------------------------
$sql = "CREATE TABLE residence_areas (hall VARCHAR(30),slots INT(1))";
if (!mysqli_query($conn,$sql)) {echo "Error creating RESIDENCE_AREAS table: ".mysqli_error($conn); } 

$halls = array ("INSERT INTO residence_areas VALUES ('Leo Hall',5)",
                "INSERT INTO residence_areas VALUES ('Champagnat Hall',5)",
                "INSERT INTO residence_areas VALUES ('Marian Hall',5)",
                "INSERT INTO residence_areas VALUES ('Sheahan Hall',5)",
                "INSERT INTO residence_areas VALUES ('Midrise Hall',5)",
                "INSERT INTO residence_areas VALUES ('Foy Townhouses',5)",
                "INSERT INTO residence_areas VALUES ('Gartland Commons',5)",
                "INSERT INTO residence_areas VALUES ('New Townhouses',5)",
                "INSERT INTO residence_areas VALUES ('Lower West Cedar St Townhouses',5)",
                "INSERT INTO residence_areas VALUES ('Upper West Cedar St Townhouses',5)",
                "INSERT INTO residence_areas VALUES ('Fulton St Townhouses',5)",
                "INSERT INTO residence_areas VALUES ('Talmadge Court',5)",
                "INSERT INTO residence_areas VALUES ('New Fulton Townhouses',5)" );

  
  for($i=0;$i<13;++$i)
  {
	 // echo "$i : $halls[$i]<br>";
	 $sql = $halls[$i];
	 // echo $halls[$i];
	 if (!mysqli_query($conn,$sql)) {echo "Error adding row: ".mysqli_error($conn);} 
  } // end for loop

$sql = "ALTER TABLE residence_areas ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY";
if (!mysqli_query($conn,$sql)) {echo "Error adding key to Table residence_areas: ".mysqli_error($conn);} 

//-----------------------------------------------------------------------------------------------------------


$sql = "CREATE TABLE reservation (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,firstname VARCHAR(30), lastname VARCHAR(30),
cwid CHAR(8), class CHAR(4), ra VARCHAR(30));";
if (!mysqli_query($conn,$sql)) {echo "Error creating RESERVATION table: ".mysqli_error($conn);} 


















mysqli_close($conn);

?>