<html>
<title> Delete a Reservation, Increment Residence Hall Slot</title>
<body>
</body>
</html>



<?php
// this code will delete one entry from the "reservation" table
// the entry to delete is held in the variable "row2delete"
// then increment the slot in the corresponding hall in the "residence_areas" table

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
$row2delete = 50;



// first check if there is a match in the reservation table for the row you want to delete
$sql = "SELECT * FROM reservation WHERE id=$row2delete";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	
// Save the hall (ra entry) from the reservation Before Deleting the reservation
   $hall = mysqli_fetch_assoc($result)['ra'];

// now delete the row from the reservation table
   $sql = "DELETE FROM reservation WHERE id=$row2delete";
   if (mysqli_query($conn, $sql)) {
       echo "Reservation deleted successfully<br>";
	   
	   // now we can increment the slot in residence_area table
	   
	   $sql2 = "SELECT * FROM residence_areas WHERE hall='$hall'";
	   $result2 = mysqli_query($conn,$sql2);
	   if (mysqli_num_rows($result2) > 0) {
          $numslots=mysqli_fetch_assoc($result2)['slots'];
		  $numslots++;		  
	      $sql3="UPDATE residence_areas SET slots='$numslots' WHERE hall='$hall';";
		  $result3=mysqli_query($conn,$sql3);
		  if(mysqli_query($conn,$sql3)){ 
		     echo "Residence Hall slot incremented successfully<br>";
		  }
		  else {
			 echo "Error incrementing Residence Hall slot: " . mysqli_error($conn); 
		  }
	   }
	   else {
		 echo "Error finding hall: " . mysqli_error($conn);  
	   }
   } 
   else {
      echo "Error deleting reservation: " . mysqli_error($conn);
   }
} 
else {
	echo "Row not found";
}
mysqli_close($conn);
?>
