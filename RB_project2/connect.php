<?php
// connects to the database
$servername="localhost";
$username="root";
$password="";
$dbname = "housing_selection";



$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}
echo "Connected to HOUSING_SELECTION successfully.";

// mysqli_close($conn);

?>