<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='doctor.php' style='float:right;color:green;decoration:none;'>Home</a>

<?php
	$date = $_POST['date'];
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

echo "<br>....................My Appointments.................<br>";
$result = mysql_query("SELECT * FROM appointment where docid = $docid and 
										app_date='$date'");
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
   echo "Patient Id: ".$row{'patid'}."----- Slot: ".$row{'slotno'}."----- Appointment No. : ".$row[0]."<br>";
}



echo "<br>";
echo "My patients patients";
echo '<form method="POST" action="mypatients.php">
<input id="button" type="submit" name="submit" value="See patients">
</form>';



?>



