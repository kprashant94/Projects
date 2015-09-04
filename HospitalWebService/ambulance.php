<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='ambulance.php' style='float:right;color:green;decoration:none;'>Home</a>

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

echo "<br>........AVAILABLE AMBULANCE.........<br><br>";
$result = mysql_query("SELECT * FROM ambulance where availability = 1");
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
   echo "ambulance_id:  ".$row{'ambulance_id'}."<br>";
}
echo "<br>";

echo "SET AVAILABILITY 0<br>";
echo '<form name="room" action="ambulance1.php" method="POST">
Ambulance ID : <input type="text" name="ambulance_id">
<input type="submit" value="Submit">
</form> ';


echo "SET AVAILABILITY 1<br>";
echo '<form name="room" action="ambulance2.php" method="POST">
Ambulance ID : <input type="text" name="ambulance_id">
<input type="submit" value="Submit">
</form> ';


?>
