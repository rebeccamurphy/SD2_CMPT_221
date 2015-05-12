<?php 
/*
admin_delete_user_confirmation.php
Project3
*/
session_start();
require_once 'db.php';

$user_to_delete = $_POST['deletedUser'];


?>
<html>
	<title> Project 3 </title>
	<head>
		<p>
			<h1>Admin Delete User Confirmation</h1>
		</p>
	</head>
	<body>
		
	<p></p>
    <?php
    $success = deleteUser($user_to_delete);
    if($success){
	    echo "Successfully deleted user $user_to_delete.<br>";
    }
    else {
	     echo "Error deleting user $user_to_delete.<br>";
    } 

    ?>
	<p></p>
	<p></p>
	<a href="admin.php">Back to Admin Home</a>
	<p></p>
	<a href="logout.php">Log Out</a>
	
	
	
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>