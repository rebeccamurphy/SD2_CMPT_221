<?php

// Project 3
// login_check.php
// verifies the user's credentials
// by RB

session_start(); // Starting Session
require_once("db.php");

if (isset($_POST['submit'])  AND ($_POST['submit']=='login')) {

    print("Your provided username is $_POST[username] and password is $_POST[password]");
    // Define $username and $password
    $username=$_POST['username'];
    $password=$_POST['password'];

    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $connection = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
  
    // Selecting Database
    $db = mysqli_select_db($connection, $mysql_database);

    // SQL query to fetch information of registered users and finds user match.
    $query = mysqli_query($connection, "select * from login where password='$password' AND username='$username'");
    $rows = mysqli_num_rows($query);

    if ($rows == 1) {
      $_SESSION['login_user']=$username; // Initializing Session
      header("location: reservation.php"); // Redirecting To Other Page
      die;  //this was in Cenk's code, is it needed?
    } else {
      print "<br>Username or Password is invalid";
    }
    mysqli_close($connection); // Closing Connection - invalid user ID
 // }
 
} // end if

elseif (isset($_POST['submit'])  AND ($_POST['submit']=='newuser')) {
	
  $username=$_POST['username'];
  $password=$_POST['password'];
  $name=$_POST['name'];
//  $firstname=$_POST['firstname'];
//  $lastname=$_POST['lastname'];

  //echo "newby!!<br>";
//put the code in here to add a new user to the login table in the db
  $connection = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
  $db = mysqli_select_db($connection, $mysql_database);
//  $sql = "INSERT INTO login (username, password, firstName, lastName) VALUES ('".$username."','".$password."','".$firstname."','".$lastname."');";
  $sql = "INSERT INTO login (username, password, name) VALUES ('".$username."','".$password."','".$name."');";
  
  // echo "Query is: $sql<br>";  //for debugging

  if(mysqli_query($connection,$sql)){
	  // echo "added new user successfully!<br>"; // for debugging
	  $_SESSION['login_user']=$username;
	  header("location: reservation.php"); // new user created successfully, go to next page
	  }
  else { 
      echo "Error:" . $sql . "<br>" . mysqli_error($connection);
	  mysqli_close($connection);}
  
}//end elseif

 else {
  echo 'there is no $_POST[Submit]';
  die;
} // end else






?>	

<html>
<head> </head>
<body>
<a href="login.php">Go Back to Login page</a>
</body>
</html>