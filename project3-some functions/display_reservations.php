<html>
<title> Reservations</title>
<body>
</body>
</html>



<?php
// this code will display the "reservation" table

$servername="localhost";
$username="root";
$password="";
$dbname = "housing_selection";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }


// create the MySQL Query
// $sql = "SELECT slots, id FROM residence_areas WHERE hall='$resHallPreference'";
$sql = "SELECT * FROM reservation";

// Now query the dB

$result = mysqli_query($conn,$sql);
echo "<pre>";

print("id\tName\t\t\t       Gender\tClass\tResidence\t\t\t    Timestamp\n");

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
	// echo $row["id"]." ".$row["name"]." ".$row["cwid"]." ".$row["gender"]." ".$row["class"]." ".$row["ra"]." ".$row["timestamp"]."<br>";
	printf("%d\t",$row["id"]);
	printf("%-30s ",$row["name"]);
	printf("%-7s\t",$row["gender"]);
	printf("%s\t",$row["class"]);
	printf("%-35s ",$row["ra"] );
	printf("%s\n",$row["timestamp"]);
	
    }
} else {
    echo "Reservation table is empty";
}
mysqli_close($conn);
?>
