<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='patient_details.php' style='float:right;color:green;decoration:none;'>Home</a>

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

?>
<form method="POST" action="patient_details1.php">
patid <br><input type="text" name="patid" size="40"><br>
<input id="button" type="submit" name="submit" value="Submit">
</form>