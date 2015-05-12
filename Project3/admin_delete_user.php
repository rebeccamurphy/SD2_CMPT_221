
<html>
	<title> Project 3 </title>
	<head>
		<p>
			<h1>Admin Delete User</h1>
		</p>
	</head>
	<body>
	
	<?php 

	session_start();
	require_once 'db.php';
	
	// Show the list of users.  It is a simple list.
	echo "Here is the list of users in the table.<br><br>";
	foreach($users as $user){
		echo $user['username']."<br>";
	}
	
		
	?>
		
	<p></p>
	
	<form action="admin_delete_user_confirmation.php" method='post'>      
	<select name='deletedUser'>
	<option value="None">None</option>
	<?php 
		foreach($users as $user){
			if ($user['username']==='admin') {
				  "<option value=" .$user['username'] ." disabled>".$user['username']."</option>";
			}
			else {
				echo  "<option value=" .$user['username'] .">".$user['username']."</option>";
			}
		}
	?>
	</select>
	<input type="submit" value="Submit" name='SubmitForm'>
	</form>

	<a href="admin.php">Back to Admin Home</a>
	<p></p>
	<a href="logout.php">Log Out</a>
	
	
	
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>