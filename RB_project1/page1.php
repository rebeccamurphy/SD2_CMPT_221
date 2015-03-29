<?PHP
// Richard Brown
// Teammate: Rebecca Murphy
// CMPT221 Project 1

// Get the input via form

// Student info 

echo <<<_END
<HTML>
<HEAD> <title>Housing Input Form</title> </HEAD>

<BODY>
<h1>Welcome to the Marist Housing Preference Selector Page</h1>
<h2>Student Information</h2>


<form action="page2.php" method = "POST">
<fieldset>
<!-- Get the name -->
Name (First): <input type="text" name="firstName" size="25"/>
Name (Last): <input type="text" name="lastName" size="25"/>


<!-- get the gender  -->
<p>Gender: <br>
<input type="radio" name="gender" value="F">Female<br>
<input type="radio" name="gender" value="M">Male<br>
<p>

<!-- Get the CWID -->
<p>CWID: <input type="text" name="cwID" size="8"/></p>

<!-- get the student's class  -->
<p>Please enter your class: <br>
<input type="radio" name="studentClass" value="freshman">Freshman<br>
<input type="radio" name="studentClass" value="sophomore">Sophomore<br>
<input type="radio" name="studentClass" value="junior">Junior<br>
<input type="radio" name="studentClass" value="senior">Senior<br>
<p>
</fieldset>
<!-- now get the options   -->
<h2>Housing Options.  Please select the apppropriate choice. You must make
a selection for every question unless noted. </h2>

<!-- get the Living options  -->

<fieldset>
<!-- get the Residence hall preference  -->
<p>Residence Hall Preference(OPTIONAL): <select name="resHallPreference">
<option></option>
<option value="Leo Hall">Freshman: Leo Hall</option>
<option value="Champagnat Hall">Freshman: Champagnat Hall</option>
<option value="Marian Hall">Freshman: Marian Hall</option>
<option value="Sheahan Hall">Freshman: Sheahan Hall</option>
<option value="Midrise Hall">Sophomore: Midrise Hall</option>
<option value="Foy Townhouses">Sophomore: Foy Townhouses (A-C).</option>
<option value="Gartland Commons">Sophomore: Gartland Commons (D-G)</option>
<option value="New Townhouses">Sophomore: New Townhouses (H-M)</option>
<option value="Lower West Cedar St Townhouses">Junior/Senior: Lower West Cedar St Townhouses (N-S)</option>
<option value="Upper West Cedar St Townhouses">Junior/Senior: Upper West Cedar St Townhouses (T-Y) </option>
<option value="Fulton Street Townhouses">Junior/Senior: Fulton Street Townhouses</option>
<option value="Talmadge Court">Junior/Senior: Talmadge Court</option>
<option value="New Fulton Townhouses">Junior/Senior: New Fulton Townhouses</option>
</select></p>

<p>Please enter your preferred housing style: <br>
<input type="radio" name="housingStyle" value="traditional">Traditional dorm<br>
<input type="radio" name="housingStyle" value="suite">Suite<br>
<input type="radio" name="housingStyle" value="apartment">Apartment<br>
<input type="radio" name="housingStyle" value="townhouse">Townhouse<br>

<p>Do you require handicap-accessible housing? <br>
<input type="radio" name="handicap" value="yes">Yes<br>
<input type="radio" name="handicap" value="no">No<br>

<p>Do you require on-site Laundry? <br>
<input type="radio" name="laundry" value="yes">Yes<br>
<input type="radio" name="laundry" value="no">No<br>
<p>
</fieldset>
<!-- buttons are below   -->
<input type="submit" name="submit" value="Submit Button"/>
<p>
<input type="reset" value="Clear form"/>

</form>

</BODY>
</HEAD>
</HTML>
_END;


?>