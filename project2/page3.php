<!--
Rebecca Murphy
2/25/15
SD2
Project 1
-->
<?php
	$residence = $_POST['options'];
	$_SESSION['residence'] = $residence;
?>
<html>
	<title>Project 1 </title>
	<head>
		<p>
			Housing Recommendation Form 
		</p>
	</head>
	<body>
	<div id='page3'>
		<?php
				print "<p>Confirmation Page</p>";
				print '<p>Residence Preference: '.  $_SESSION['residence'] .'</p>';
				print '<p>Name: ' .$_SESSION['name'].'</p>';
				print '<p>CWID: ' .$_SESSION['CWID'].'</p>';
				print '<p>Gender: ' .$_SESSION['gender'] .'</p>';
				print '<p>Class: ' .$_SESSION['class'] .'</p>';
				print '<p>Coed Option : ' .$_SESSION['Coed'] .'</p>';
					$laundryOption = ($_SESSION['laundry']=='laundry') ? 'Yes' : 'No';
				print '<p>Laundry on premises:'.$laundryOption .' </p>';
					$handicapOption = ($_SESSION['handicap']=='handicap') ? 'Yes' : 'No';
				print '<p>Handicap Accessible: '.$handicapOption .' </p>';
				print '<p>Kind of Housing: ' .$_SESSION['housingKind'] .'</p>';
			
		?>
	</div>
	</body>
</html>