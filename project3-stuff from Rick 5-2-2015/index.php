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

// Rick added this
/*
 if (isset($_SESSION['login_user'])) {
     header("Location: profile.php"); // Take the user to their profile page
}
*/
// end of what Rick added
?>
<html>
	<title> Project 3 </title>
	<head>
		<p>
			<h1>Login or SignUp</h1>
		</p>
	</head>
	<body>
	<form action="login.php" method='post'>
		<input type="submit" value="Login" name='Login'>
	</form>	
	<form action="signup.php" method='post'>
		<input type="submit" value="Sign Up" name='SignUp'>
	</form>		
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>