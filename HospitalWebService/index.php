<!--<!DOCTYPE HTML>
<html>
<head>
<title>Sign-In</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="body-color">
<a href="registration.php" style="color:green">Patient Registration</a><br>
<a href="ambulance.php" style="">Ambulance Entries</a><br>
<a href="medicine.php" style="color:green;">Pharmacy</a><br>
<a href="doctor_login.php" style="">LogIn</a><br>
<a href="appointment.php" style="color:green;">Doctor Appointment</a><br>
<a href="room.php" style="">Room Reservation</a><br>
<a href="xray.php" style="color:green;">X-ray</a><br>
</body>
</html>
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="body-color">
<div id="Sign-In">
<fieldset style="width:30%"><legend>LOG-IN</legend>
<form method="POST" action="connectivity2.php">
Type <br><select type="text" name="type">
  <option value="doctor">doctor</option>
  <option value="account">account</option>
  <option value="appointment">appointment</option>
  <option value="ambulance">ambulance</option>
  <option value="ctscan">ctscan</option>
  <option value="dialysis">dialysis</option>
  <option value="medicine">medicine</option>
  <option value="registration">registration</option>
  <option value="room">room</option>
  <option value="xray">xray</option>
  <option value="patient_details">patient_details</option>
</select><br>
Employee Id <br><input type="text" name="docid" size="40"><br>
Password <br><input type="password" name="pass" size="40"><br>
<input id="button" type="submit" name="submit" value="Log-In">
</form>
</fieldset>
</div>
</body>
</html>


