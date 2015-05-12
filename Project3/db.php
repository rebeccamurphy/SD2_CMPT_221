<?php
// modified 4/30/2015 by RB to work with our Project #2
require_once 'connect.php';
$mysql_host = "localhost";
$mysql_database = "housing_selection";
$mysql_user = "root";
$mysql_password = "";


if ($db_found){
	$sql = "SELECT * FROM users;";
	$result = mysql_query($sql);
}
$res = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);

global $users;
$users = array();

while($row = mysql_fetch_assoc($result)) {
    $users[$row["username"]] = $row;
}



function defineUsers(){
	$sql = "SELECT * FROM users;";
	$result = mysql_query($sql);
	
	$res = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);

	global $users;
	$users = array();

	while($row = mysql_fetch_assoc($result)) {
	    $users[$row["username"]] = $row;
	}
	return $users;
}

function checkifUserNameExists($username){
	$users = defineUsers();
	foreach ($users as $user) {
		if ($username === $user["username"])
			return true;
	}
	return false;
}

function checkLogin($username, $password){
	$users = defineUsers();
	foreach ($users as $user) {
		if ($username === $user["username"]){
			return $user["password"] ===$password;
		}
	}
}

function createUser($username, $password, $name, $CWID, $gender, $class){
	$sql = "INSERT INTO users (username, kind, password, name, CWID, gender, class) VALUES ('".$username."','student','".$password."','".$name."','".$CWID."','".$gender."','".$class."');";
	$result = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);	
	return (mysql_affected_rows()==1); //Rick added this
}

function deleteUser($user){
	$sql = "DELETE FROM users WHERE username ='".$user."'";
	$result = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
	return (mysql_affected_rows()>0);
}

function checkHasReservation(){
	$username= $_SESSION["username"];
	$sql = "SELECT * FROM reservations WHERE username ='".$username."'";
	$result = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
	return mysql_num_rows($result)>0;
}
function deleteReservation(){
	$username= $_SESSION["username"];
	$sql = "SELECT * FROM reservations WHERE username ='".$username."'";
	$result = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
	//incrementRA($result["ra"]);
	$row = mysql_fetch_assoc($result);  // Rick
	$ra = $row['ra']; // Rick
	incrementRA($ra);  // Rick
	$sql = "DELETE FROM reservations WHERE username ='".$username."'";  // fixed by Rick
	$result = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
}
function incrementRA($ra){
	$sql ="UPDATE residence_areas SET slots = slots + 1 WHERE hall ='".$ra."'";
	$result = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
}
function checkKind(){
	$username= $_SESSION["username"];
	$sql = "SELECT kind FROM users WHERE username ='".$username."'";
	$result = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
	// return $result;
	$row = mysql_fetch_assoc($result);
    $kind = $row['kind'];
	return $kind;
}
// added by Rick 5/9/2015
// BROKEN. IGNORES formatting in printf.  WTF!!
function displayUsers(){
	// Show the list of users. Stub
}

?>

