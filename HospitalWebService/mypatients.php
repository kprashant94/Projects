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

$docid = $_SESSION['docid'];

echo "<br>....................My Patients.................<br>";
$result = mysql_query("SELECT * FROM patient_visit where docid = $docid");
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
   echo "Patient Id:".$row{'patid'}."---".$row{'illness'}."----
   			-".$row{'next_appointment'}."<br>";
}
echo "<br>";
echo "........Check Appointments.........<br>";
echo '<form method="POST" action="myappointments.php">
Date :<input type="date" name="date" min="2014-04-12"size="40"><br>
<input id="button" type="submit" name="submit" value="Appointments">
</form>';
?>



