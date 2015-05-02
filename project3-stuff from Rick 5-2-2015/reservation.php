<!--
reservation.php

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



?>
<html>
	<title> Project 3 </title>
	<head>
		<p>
			<h1>Reservation Page</h1>
		</p>
	</head>
	<body>
		<h2>Reservation stuff starts on this page:</h2> <p></p>
	     
Upon login, users will be taken to the reservation page, where each user can CREATE a new reservation 
(if they don't have one before), or UPDATE / DELETE their existing reservation. <p></p>
DELETEing a reservation will remove the reservation record from the system, and increase number of available slots by one. <p></p>
Updating a reservation will DELETE an existing reservation and create a new one, adjusting available slots as necessary. <p></p>
CREATING a reservation will utilize the three-page sequence of Projects One and Two, except that the users will not have to 
enter their personal information (i.e., first name, last name, CWID, and so on) as these details will be coming from the user's profile.  <p></p>
In addition to the -regular- user pages, there will be a set of PHP pages for administrative access.  <p></p>
These admin pages will reject regular user accounts, and only function for admin users.  <p></p>
Admin users will be able to perform INSERT / UPDATE / DELETE operations on user and reservation tables, as well as the table for residence areas.  <p></p>
		
			
	<footer>
		<p>CMSC 221L  Spring 2015  *** Team #9 - Rebecca Murphy - Richard Brown***</p>
	</footer>
	</body>
</html>

