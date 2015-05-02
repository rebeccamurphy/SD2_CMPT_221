<!--
Rebecca Murphy
Richard C Brown

Team Dayzd & Confuzd
5/2/2015
SD2
Project 3
-->
<?php
session_start();
require_once 'connect.php';
//TODO check if the login is valid here on submit
//If it is, forward the user to their profile
//else output an error

?>
<html>
	<title> Project 3 </title>
	<head>
		<p>
			<h1>Login</h1>
		</p>
	</head>
	<body>
	
<!--
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

-->
<!-- **********************************Rick added this stuff ***************************************** -->
<form action="login_check.php" method="post">
<label>Username:</label><input id=name name=username placeholder=username type=text>
<label>Password:</label><input id=password name=password placeholder=******* type=password>
<input name=submit type=submit value=login>
</form>
<!-- **********************************Rick added this stuff ***************************************** -->


	
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>

