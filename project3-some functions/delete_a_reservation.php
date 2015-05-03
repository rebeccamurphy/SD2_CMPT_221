<html>
<title> Delete a Reservation</title>
<body>
</body>
</html>



<?php
// this code will delete one entry from the "reservation" table
// the entry to delete is held in the variable "row2delete"

$servername="localhost";
$username="root";
$password="";
$dbname = "housing_selection";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }


// here is the row to delete
// hardcoded for the sake of testing
$row2delete = 999;



// first check if there is a match in the database for the row you want to delete
$sql = "SELECT * FROM reservation WHERE id=$row2delete";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {

$sql = "DELETE FROM reservation WHERE id=$row2delete";

   if (mysqli_query($conn, $sql)) {
       echo "Record deleted successfully";
   } 
   else {
       echo "Error deleting record: " . mysqli_error($conn);
   }
} 
else {
	echo "Row not found";
}
mysqli_close($conn);
?>
