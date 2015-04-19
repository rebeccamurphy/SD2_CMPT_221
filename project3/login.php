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
//TODO check if the login is valid here on submit
//If it is, forward the user to their profile
//else output an error
?>
<html>
	<title> Project 2 </title>
	<head>
		<p>
			<h1>Login</h1>
		</p>
	</head>
	<body>
	<form action="login.php" method='post'>
		<label for="username">UserName</label>
		<input type="text" required="required" name="username">
		<br>
		<br>
		<label for="password">Password</label>
		<input type="password" name="password"required="required">
		<br><br>
		<input type="submit" value="Submit" name='submitForm'>
	</form>		
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>