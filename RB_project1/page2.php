<?PHP
// Richard Brown
// we chose to do our own code for this project.
// Teammate: Rebecca Murphy
// CMPT221 Project 1

// get the input and check for anything missing.
// NOTE: ALL residence options have onsite Laundry so this was omitted


$missingInput=FALSE;

$firstName = $_POST['firstName'];
if($firstName==""){$missingInput=TRUE; echo "First name missing","<p>";}

$lastName = $_POST['lastName'];
if($lastName==""){$missingInput=TRUE; echo "Last name","<p>";}

$cwID = $_POST['cwID'];
if($cwID==""){$missingInput=TRUE; echo "cwID missing","<p>"; }

$resHallPreference = $_POST['resHallPreference'];

if(isset($_POST['gender'] )) { 	$gender = $_POST['gender']; } 
else {$missingInput=TRUE; echo "Gender missing","<p>"; }

if(isset($_POST['studentClass'] )) { $studentClass = $_POST['studentClass'];} 
else {$missingInput=TRUE; echo "class missing","<p>";}

if(isset($_POST['handicap'] )) { $handicap = $_POST['handicap'];} 
else {$missingInput=TRUE; echo "handicap missing","<p>";}

if(isset($_POST['housingStyle'] )) { $housingStyle = $_POST['housingStyle']; } 
else {$missingInput=TRUE; echo "Housing style missing","<p>";}

// If a Residence hall preference was provided, check it for validity
// This is also the path for missing Input
	
if($resHallPreference != "" OR $missingInput){
    $resHallValid=FALSE;
if(!$missingInput) {
    
    switch($resHallPreference)
    {
      case "Leo Hall":
	 if($studentClass == "freshman" AND ($housingStyle=="traditional")) $resHallValid=TRUE;
         break;
      case "Champagnat Hall":
         if($studentClass == "freshman" AND ($housingStyle=="traditional")) $resHallValid=TRUE;
         break;
      case "Marian Hall":
         if($studentClass == "freshman" AND ($housingStyle=="traditional")) $resHallValid=TRUE;
         break;
      case "Sheahan Hall":
         if($studentClass == "freshman" AND ($housingStyle=="traditional")) $resHallValid=TRUE;
         break;
      case "Midrise Hall":
         if($studentClass == "sophomore" AND ($housingStyle=="suite") AND ($handicap=="no")) $resHallValid=TRUE;
         break;
      case "Foy Townhouses":
         if($studentClass == "sophomore" AND $housingStyle=="townhouse") $resHallValid=TRUE;
         break;
      case "Gartland Commons":
         if($studentClass == "sophomore" AND $housingStyle=="apartment") $resHallValid=TRUE;
         break;
      case "New Townhouses":
         if($studentClass == "sophomore" AND $housingStyle=="apartment") $resHallValid=TRUE;
         break;
      case "Lower West Cedar St Townhouses":
         if(($studentClass =="junior" OR $studentClass =="senior") AND ($housingStyle=="townhouse") AND ($handicap=="no")) $resHallValid=TRUE;
         break;
      case "Upper West Cedar St Townhouses":
         if(($studentClass =="junior" OR $studentClass =="senior") AND $housingStyle=="townhouse") $resHallValid=TRUE;
         break;
      case "Fulton Street Townhouses":
         if(($studentClass =="junior" OR $studentClass =="senior") AND ($housingStyle=="townhouse") AND ($handicap=="no")) $resHallValid=TRUE;
         break;
      case "Talmadge Court":
         if(($studentClass =="junior" OR $studentClass =="senior") AND ($housingStyle=="apartment") AND ($handicap=="no")) $resHallValid=TRUE;
         break;
      case "New Fulton Townhouses":
         if(($studentClass =="junior" OR $studentClass =="senior") AND ($housingStyle=="townhouse") AND ($handicap=="no")) $resHallValid=TRUE;
         break;

    } //end switch for Residence Hall	
} 	
// print a message that either the Residence hall choice is valid or there is missing input
	
if(!$resHallValid OR $missingInput) {	
    if(!$resHallValid) {echo "Invalid Residence Hall choice. You must try again.","<p>";}
	if($missingInput)  {echo "Some of your information is missing.  You must provide all information requested.","<p>";}
            echo <<<_END
            <HTML>
            <HEAD>  </HEAD>
            <BODY>
            <form action="page1.php" method = "POST">
            <input type="submit" name="submit" value="Go Back"/>
            </form>
            </BODY>
            </HEAD>
            </HTML>
_END;
} // endif resHallValid
	
// If the residence hall choice is valid AND there is no missing input, print the info and proceed

if($resHallValid AND !$missingInput){
    echo "Here is your personal information and housing preferences.  Your selections are compatible with the Residence Hall chosen. Click Next to proceed.";
    print "<p>Name: $firstName $lastName<br>Gender: $gender</br>CW ID: $cwID</br>Student Class: $studentClass</p>";
    print "<p>Residence Hall Preference: $resHallPreference<br>Housing style: $housingStyle<br>Handicap Access: $handicap</p>";
    echo <<<_END
    <HTML>
    <HEAD></HEAD>
    <BODY>
    <form action="page3.php" method = "POST">
    <input type="hidden" name="firstName" value=$firstName>
    <input type="hidden" name="lastName" value=$lastName>
    <input type="hidden" name="cwID" value=$cwID>
    <input type="hidden" name="resHallPreference" value=$resHallPreference>
    <input type="hidden" name="gender" value=$gender>
    <input type="hidden" name="studentClass" value=$studentClass>
    <input type="hidden" name="handicap" value=$handicap>
    <input type="hidden" name="housingStyle" value=$housingStyle>
    <input type="submit" name="submit" value="Next"/>
    </form>
    </BODY>
    </HTML>
_END;
}

}//end if resHallPreference != ""

// All Student ID provided, but no Residence Hall preference made

else {
    echo "No Residence Hall preference given.</p> Please make a selection.";
    no_res_hall_preference($firstName, $lastName, $cwID, $gender, $studentClass, $handicap, $housingStyle);
	
}

// function to display Residence Hall dropdown if no Residence Hall choice is made

function no_res_hall_preference($firstName, $lastName, $cwID, $gender, $studentClass, $handicap, $housingStyle) 
{
	
        switch ($studentClass)
    {
	  case "freshman":
	    echo <<<_END
            <HTML>
            <HEAD>  </HEAD>
            <BODY>
            <form action="page3.php" method = "POST">
            <p>Residence Options: <select name="resHallPreference">
            <option></option>
            <option value="Leo Hall">Leo Hall</option>
            <option value="Champagnat Hall">Champagnat Hall</option>
            <option value="Marian Hall">Marian Hall</option>
            <option value="Sheahan Hall">Sheahan Hall</option>
            </select></p>
            <input type="hidden" name="firstName" value=$firstName>
            <input type="hidden" name="lastName" value=$lastName>
            <input type="hidden" name="cwID" value=$cwID>
            <input type="hidden" name="gender" value=$gender>
            <input type="hidden" name="studentClass" value=$studentClass>
            <input type="hidden" name="handicap" value=$handicap>
	    <input type="hidden" name="housingStyle" value=$housingStyle>
            <input type="submit" name="submit" value="Submit"/>
            </form>
            </BODY>
            </HEAD>
            </HTML>
_END;
        break;
	  case "sophomore":
            if($handicap=="yes") {
                echo <<<_END
                <HTML>
                <HEAD>  </HEAD>
                <BODY>
                <form action="page3.php" method = "POST">
                <p>Residence Options: <select name="resHallPreference">
                <option></option>
                <option value="Foy Townhouses">Foy Townhouses (A-C).</option>
                <option value="Gartland Commons">Gartland Commons (D-G)</option>
                <option value="New Townhouses">New Townhouses (H-M)</option>
                </select></p>
                <input type="hidden" name="firstName" value=$firstName>
                <input type="hidden" name="lastName" value=$lastName>
                <input type="hidden" name="cwID" value=$cwID>
                <input type="hidden" name="gender" value=$gender>
                <input type="hidden" name="studentClass" value=$studentClass>
		<input type="hidden" name="handicap" value=$handicap>
	        <input type="hidden" name="housingStyle" value=$housingStyle>
                <input type="submit" name="submit" value="Submit"/>
                </form>
                </BODY>
                </HEAD>
                </HTML>
_END;
            }// end if handicap=yes
            else {
                if ($housingStyle=="suite"){ 
                    echo <<<_END
                    <HTML>
                    <HEAD>  </HEAD>
                    <BODY>
                    <form action="page3.php" method = "POST">
                    <p>Residence Options: <select name="resHallPreference">
                    <option></option>
                    <option value="Midrise Hall">Midrise Hall</option>
                    </select></p>
                    <input type="hidden" name="firstName" value=$firstName>
                    <input type="hidden" name="lastName" value=$lastName>
                    <input type="hidden" name="cwID" value=$cwID>
                    <input type="hidden" name="gender" value=$gender>
                    <input type="hidden" name="studentClass" value=$studentClass>
                    <input type="hidden" name="handicap" value=$handicap>
	            <input type="hidden" name="housingStyle" value=$housingStyle>
                    <input type="submit" name="submit" value="Submit"/>
                    </form>
                    </BODY>
                    </HEAD>
                    </HTML>
_END;
                } //end else if housingStyle=suite
			
                elseif ($housingStyle=="apartment"){ 
                    echo <<<_END
                    <HTML>
                    <HEAD> </HEAD>
                    <BODY>
                    <form action="page3.php" method = "POST">
                    <p>Residence Options: <select name="resHallPreference">
                    <option></option>
                    <option value="Gartland Commons">Gartland Commons (D-G)</option>
                    </select></p>
                    <input type="hidden" name="firstName" value=$firstName>
                    <input type="hidden" name="lastName" value=$lastName>
                    <input type="hidden" name="cwID" value=$cwID>
                    <input type="hidden" name="gender" value=$gender>
                    <input type="hidden" name="studentClass" value=$studentClass>
                    <input type="hidden" name="handicap" value=$handicap>
	            <input type="hidden" name="housingStyle" value=$housingStyle>
                    <input type="submit" name="submit" value="Submit"/>
                    </form>
                    </BODY>
                    </HEAD>
                    </HTML>
_END;
                } //end elseif housingStyle=apartment  

                elseif ($housingStyle=="townhouse") { 
                    echo <<<_END
                    <HTML>
                    <HEAD> </HEAD>
                    <BODY>
                    <form action="page3.php" method = "POST">
		    <p>Residence Options: <select name="resHallPreference">
                    <option></option>
                    <option value="Foy Townhouses">Foy Townhouses (A-C).</option>
                    <option value="New Townhouses">New Townhouses (H-M)</option>
                    </select></p>
                   <input type="hidden" name="firstName" value=$firstName>
                    <input type="hidden" name="lastName" value=$lastName>
                    <input type="hidden" name="cwID" value=$cwID>
                    <input type="hidden" name="gender" value=$gender>
                    <input type="hidden" name="studentClass" value=$studentClass>
		    <input type="hidden" name="handicap" value=$handicap>
	            <input type="hidden" name="housingStyle" value=$housingStyle>
                    <input type="submit" name="submit" value="Submit"/>
                    </form>
                    </BODY>
                    </HEAD>
                    </HTML>
_END;
                } // end else for housingStyle=townhouse

                else { 
                    echo <<<_END
                    <HTML>
                    <HEAD>  </HEAD>
                    <BODY>
                    <form action="page3.php" method = "POST">
                    <p>Residence Options: <select name="resHallPreference">
                    <option></option>
                    <option value="Midrise Hall">Midrise Hall</option>
                    <option value="Foy Townhouses">Foy Townhouses (A-C).</option>
                    <option value="Gartland Commons">Gartland Commons (D-G)</option>
                    <option value="New Townhouses">New Townhouses (H-M)</option>
                    </select></p>
                    <input type="hidden" name="firstName" value=$firstName>
                    <input type="hidden" name="lastName" value=$lastName>
                    <input type="hidden" name="cwID" value=$cwID>
                    <input type="hidden" name="gender" value=$gender>
                    <input type="hidden" name="studentClass" value=$studentClass>
                    <input type="hidden" name="handicap" value=$handicap>
	            <input type="hidden" name="housingStyle" value=$housingStyle>
                    <input type="submit" name="submit" value="Submit"/>
                    </form>
                    </BODY>
                    </HEAD>
                    </HTML>
_END;
		}
			
			  
	     }// end else
	     break;
            
	  default:
            if($handicap=="yes") {
	        echo <<<_END
                <HTML>
                <HEAD>  </HEAD>
                <BODY>
                <form action="page3.php" method = "POST">
        	<p>Residence Options: <select name="resHallPreference">
                <option></option>
                <option value="Upper West Cedar St Townhouses">Upper West Cedar St Townhouses (T-Y) </option>
                </select></p>
                <input type="hidden" name="firstName" value=$firstName>
                <input type="hidden" name="lastName" value=$lastName>
                <input type="hidden" name="cwID" value=$cwID>
                <input type="hidden" name="gender" value=$gender>
                <input type="hidden" name="studentClass" value=$studentClass>
                <input type="hidden" name="handicap" value=$handicap>
	        <input type="hidden" name="housingStyle" value=$housingStyle>
                <input type="submit" name="submit" value="Submit"/>
                </form>
                </BODY>
                </HEAD>
                </HTML>
_END;
            }// end if handicap=yes 
            else {
                if ($housingStyle=="apartment"){ 
                    echo <<<_END
                    <HTML>
                    <HEAD>  </HEAD>
                    <BODY>
                    <form action="page3.php" method = "POST">
                    <p>Residence Options: <select name="resHallPreference">
                    <option></option>
                    <option value="Talmadge Court">Talmadge Court</option>
                    </select></p>
                    <input type="hidden" name="firstName" value=$firstName>
                    <input type="hidden" name="lastName" value=$lastName>
                    <input type="hidden" name="cwID" value=$cwID>
                    <input type="hidden" name="gender" value=$gender>
                    <input type="hidden" name="studentClass" value=$studentClass>
                    <input type="hidden" name="handicap" value=$handicap>
	            <input type="hidden" name="housingStyle" value=$housingStyle>
                    <input type="submit" name="submit" value="Submit"/>
                    </form>
                    </BODY>
                    </HEAD>
                    </HTML>
_END;
                } //end else if housingStyle=apartment
			  
                elseif ($housingStyle=="townhouse"){ 
                    echo <<<_END
                    <HTML>
                    <BODY>
                    <form action="page3.php" method = "POST">
                    <p>Residence Options: <select name="resHallPreference">
                    <option></option>
                    <option value="Lower West Cedar St Townhouses">Lower West Cedar St Townhouses (N-S)</option>
                    <option value="Upper West Cedar St Townhouses">Upper West Cedar St Townhouses (T-Y) </option>
                    <option value="Fulton Street Townhouses">Fulton Street Townhouses</option>				
                    <option value="New Fulton Townhouses">New Fulton Townhouses</option>
                    </select></p>
                    <input type="hidden" name="firstName" value=$firstName>
                    <input type="hidden" name="lastName" value=$lastName>
                    <input type="hidden" name="cwID" value=$cwID>
                    <input type="hidden" name="gender" value=$gender>
                    <input type="hidden" name="studentClass" value=$studentClass>
                    <input type="hidden" name="handicap" value=$handicap>
	            <input type="hidden" name="housingStyle" value=$housingStyle>
                    <input type="submit" name="submit" value="Submit"/>
                    </form>
                    </BODY>
                    </HTML>
					
_END;
                }// end elseif townhouse
			  
                else { 
                    echo <<<_END
                    <HTML>
                    <BODY>
                    <form action="page3.php" method = "POST">
                    <p>Residence Options: <select name="resHallPreference">
                    <option></option>
                    <option value="Lower West Cedar St Townhouses">Lower West Cedar St Townhouses (N-S)</option>
                    <option value="Upper West Cedar St Townhouses">Upper West Cedar St Townhouses (T-Y) </option>
                    <option value="Fulton Street Townhouses">Fulton Street Townhouses</option>
                    <option value="Talmadge Court">Talmadge Court</option>
                    <option value="New Fulton Townhouses">New Fulton Townhouses</option>
                    </select></p>
                    <input type="hidden" name="firstName" value=$firstName>
                    <input type="hidden" name="lastName" value=$lastName>
                    <input type="hidden" name="cwID" value=$cwID>
                    <input type="hidden" name="gender" value=$gender>
                    <input type="hidden" name="studentClass" value=$studentClass>
                    <input type="hidden" name="handicap" value=$handicap>
	            <input type="hidden" name="housingStyle" value=$housingStyle>
                    <input type="submit" name="submit" value="Submit"/>
                    </BODY>
                    </HTML>
_END;

                } // end else junior/senior, handicapped is not yes, housingStyle=dont care
			  	  
		}// end else not handicapped
		
	    break;
    } //end switch

	

}  //end function

	

?>