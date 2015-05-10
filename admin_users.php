<!--
admin_users.php
Rebecca Murphy
Richard C Brown

Team Dayzd & Confuzd
5/13/15
SD2
Project 3
-->
<?php
session_start();
require_once 'connect.php';
require_once 'db.php';


?>
<html>
	<title> Project 3 </title>
	<head>
		<p>
			<h1>Users Administration Page</h1>
		</p>
	</head>
	<body>
	<?php
	
	displayUsers();  // Broken. Ignores printf completely.  WTF!!
		
	?>
	<p></p>
	<a href="logout.php">Log Out</a>
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>