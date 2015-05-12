<!--
admin.php

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


?>
<html>
	<title> Project 3 </title>
	<head>
		<p>
			<h1>Admin Home Page</h1>
		</p>
	</head>
	<body>
	<?php // echo"<h2>Hello, ".$_SESSION["username"]."</h2>"?>
	 
    <p></p>
	<a href="admin_add_user.php">INSERT Users</a>
	<p></p>
	<a href="admin_delete_user.php">DELETE Users</a>
	<p></p>
	<a href="admin_update_user.php">UPDATE Users</a>
	<p></p>
	<p></p>
	<a href="admin_reservations.php">INSERT/UPDATE/DELETE Reservations</a>
	<p></p>
	<a href="admin_res_halls.php">INSERT/UPDATE/DELETE Residence Halls</a>
	<p></p>
	<a href="logout.php">Log Out</a>
	<p></p>	 

			
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>

