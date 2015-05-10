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
	$name = $_POST['name'];
	$CWID = $_POST['cwid'];
	$gender = $_POST['gender'];
	$class = $_POST['class'];
	if (strlen($username)<30 &&strlen($password)<30){
		$validUserName =checkifUserNameExists($username, $password);
		if (!$validUserName){
			$_SESSION["username"] = $username;
			createUser($username, $password, $name, $CWID, $gender, $class);
			// Rick added this
			// now set the SESSION Variables, since we just created a new user
			$_SESSION["stuName"] = $name;
			$_SESSION["stuCWID"] = $CWID;
			$_SESSION["stuGender"] = $gender;
			$_SESSION["stuClass"] = $class;
			
			// end of what Rick added
			header("Location: reservation.php");
		}
		else
			echo "<b>Username already taken.</b>";
	}
	else
		echo "<b> Usernames and passwords must be less than 30 characters.";
}
?>
<html>
	<title> Project 2 </title>
	<head>
		<p>
			<h1>Sign Up</h1>
		</p>
	</head>
	<body>
	<form action="signup.php" method='post'>
		<label for="username">UserName</label>
		<input type="text" required="required" name="username">
		<br>
		<br>
		<label for="password">Password</label>
		<input type="password" name="password"required="required">
		<br><br>
			<label for="name" >Name</label>
			<input type="text" required="required" name="name">
			<br>
			<br>
			<label for="cwid">CWID</label>
			<input type="text" name="cwid"required="required">
			<br>
			<br>
			<label for='gender'>Gender</label>
			<select name ='gender'>
				<option value="Female">Female</option>
				<option value="Male">Male</option>
				<option value="Other">Other</option>
			</select>
			<label for='class'>Class</label>
			<select name='class'>
				<option value="Senior">Senior</option>
				<option value='Junior'>Junior</option>
				<option value="Sophomore">Sophomore</option>
				<option value="Freshman">Freshman</option>
			</select>
		<input type="submit" value="Submit" name='submitForm'>
		
	</form>		
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>