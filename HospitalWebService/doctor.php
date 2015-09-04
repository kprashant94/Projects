<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='doctor.php' style='float:right;color:green;decoration:none;'>Home</a>


<?php
	   session_start();

	if(!isset($_SESSION['docid']))
		{
			header('location: index.php');
  			// user is login, direct to the job page
		}



$username = "root";
$password = "root";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("cs315_project",$dbhandle)
  or die("Could not select examples");

$query = "select docname from doctor where docid=$_SESSION[docid]";	
$result = mysql_query("$query");
$row = mysql_fetch_array($result);

		echo "<h2 style='text-align:center';>welcome $row[0] </h2>";


echo "<h3>Visit Details</h3>";
echo '<form method="POST" action="visit.php">
Appointment Number :<br><input type="text" name="appointment_no" min="2014-04-12"><br>
Patient Id :<br><input type="text" name="patid" min="2014-04-12"><br>
Illness :<br><input type="text" name="illness" min="2014-04-12"><br>
Prescription :<br><input type="text" name="prescription" min="2014-04-12"><br>
<input id="button" type="submit" name="submit" value="Submit">
</form>';

echo "<br>";
echo '<form method="POST" action="mypatients.php">
<b>My patients <b><input id="button" type="submit" name="submit" value="See patients">
</form>';

echo "<h3>My Appointments</h3>";
echo '<form method="POST" action="myappointments.php">
Date <input type="date" name="date" min="2014-04-12"size="40"><br>
<input id="button" type="submit" name="submit" value="Appointments">
</form>';

echo "<h3>Apply for leave</h3>";
echo '<form method="POST" action="leaveapplication.php">
Start_date <input type="date" name="start_date" min="2014-04-12"><br>
End_date <input type="date" name="end_date" min="2014-04-12"><br>
<input id="button" type="submit" name="submit" value="Apply">
</form>';

echo "Book Operation Theatre";
echo '<form method="POST" action="bookot.php">
Visit_Date :<input type="date" name="visit_date" min="2014-04-12"><br>
Slots :<input type="int" name="slots" ><br>
Patid :<input type="int" name="patid" ><br>
OT_room :<input type="int" name="ot_room" ><br>
<input id="button" type="submit" name="submit" value="Book">
</form>';


?>




