<?php
// logout.php
// logout file
// Project 3
// CMPT 221L
// Rebecca Murphy
// Richard C. Brown

session_start();
session_unset();
session_destroy();
header("Location: index.php");

?>