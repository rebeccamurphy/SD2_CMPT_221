<?PHP
// Richard Brown
// Teammate: Rebecca Murphy
// CMPT221 Project 1

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$cwID = $_POST['cwID'];
$resHallPreference = $_POST['resHallPreference'];
$gender = $_POST['gender'];
$studentClass = $_POST['studentClass'];
$housingStyle = $_POST['housingStyle'];
$handicap = $_POST['handicap'];

echo "Thank you for using the MARIST ROOM RESERVATION RECOMMENDER!!";
		
print "<p>Name: $firstName $lastName</br>CW ID: $cwID</br>Student Class: $studentClass</br>Gender: $gender</p>";
print "<p>Residence Hall Preference: $resHallPreference<br>Housing style: $housingStyle<br>Handicap Access: $handicap</p>";
    
?>