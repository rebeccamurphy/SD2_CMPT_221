

<?php
// this code will take in a reference hall selection from another page
// via POST and will read the number of slots available in that hall
// and assign it to a variable called "slotss"

$resHallPreference = $_POST['resHallPreference'];
echo "The Residence Hall selected is: $resHallPreference<br>";

$servername="localhost";
$username="root";
$password="";
$dbname = "housing_selection";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }


// create the MySQL Query
$sql = "SELECT slots, id FROM residence_areas WHERE hall='$resHallPreference'";
// query MySQL dB
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // uses a While loop, but there should be only ONE row in the table with the hall name
    while($row = mysqli_fetch_assoc($result)) {
		echo "slots " . $row["slots"]. " - id " . $row["id"]. "<br>";
		$slotss = $row["slots"];
		echo "assigning the result to a variable: $slotss <br>";
    }
} else {
    echo "0 results";
}

?>
