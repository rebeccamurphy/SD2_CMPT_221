

<?php

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

?>