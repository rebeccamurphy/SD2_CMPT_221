<!--
Rebecca Murphy
Richard C Brown

Team Dayzd & Confuzd
2/25/15
SD2
Project 2
-->

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