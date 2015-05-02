

<html>
<title> Project 3 </title>
<head> </head>
<body>

<h1>New User Registration</h1>
<form action="login_check.php" method="post">
<label>Username:</label><input id=name name=username placeholder=username type=text size=30>
<label>Password:</label><input id=password name=password placeholder=******* type=password>
<br><br>
<label>Name:</label><input name=name type=text>
<!-- <input name=submit type=submit value=newuser>   -->

<br>
<br>
<label for="cwid">CWID</label>
<input type="text" name="cwid"required="required">
<br>
<br>
<label for='gender'>Gender</label>
<select name ='gender'>
<option value="Female">Female</option>
<option value="Male">Male</option>
<option value="Other">Other</option>
</select>
<br><br>
			
<label for='class'>Class</label>
<select name='class'>
<option value="Senior">Senior</option>
<option value='Junior'>Junior</option>
<option value="Sophmore">Sophmore</option>
<option value="Freshman">Freshman</option>
</select>
<br><br>

<!-- <input type="submit" value="Submit" name='submitForm'>  -->
<input name=submit type=submit value=newuser>
</form>



</body>
</html>