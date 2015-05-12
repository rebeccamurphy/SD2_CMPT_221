<!--
admin_add_user.php
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


// Show the list of users.  It is a simple list.

echo "Here is the list of users in the table.<br><br>";
foreach($users as $user){
	echo $user['username']."<br>";
}
echo "<br>";

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
			$success = createUser($username, $password, $name, $CWID, $gender, $class);
			// header("Location: admin.php");
			if($success){echo "Successfully added user: $username<br>";}
			else {echo "Error adding user: $username<br>";}
		}
		else
			echo "<b>Username already taken.</b>";
	}
	else
		echo "<b> Usernames and passwords must be less than 30 characters.";
}
	
		
	?>


<html>
	<title> Project 3 </title>
	<head>
		<p>
			<h1>Admin Add User</h1>
		</p>
	</head>
	<body>
	
	<form action="admin_add_user.php" method='post'>
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
		    <input type="submit" value="Create New User" name='submitForm'>
		
	</form>		
	
	<p></p>
	<a href="admin.php">Back to Admin Home</a>
	<p></p>
	<a href="logout.php">Log Out</a>
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>