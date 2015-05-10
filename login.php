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
require_once 'db.php';
//TODO check if the login is valid here on submit
//If it is, forward the user to their profile
//else output an error
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$validLogin =checkLogin($username, $password);
	if ($validLogin){
		$_SESSION["username"] = $username;
		if (checkKind()==="student") {
		//added by Rick
		// now get the student's name, class, cwid, gender from the users table
            $sql = "SELECT * FROM users WHERE username ='".$username."'";
            $result = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);			
			$row = mysql_fetch_assoc($result);
			$_SESSION["stuName"] = $row['name'];
			$_SESSION["stuCWID"] = $row['CWID'];
			$_SESSION["stuGender"] = $row['gender'];
			$_SESSION["stuClass"] = $row['class'];
		// end of Rick's add	
			header("Location: reservation.php");
		}
		else {
			header("Location: admin.php");
		}
	}
	else {
		echo "<b>Invalid Login.</b>";
	}
}
?>
<html>
	<title> Project 3 </title>
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