<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='medicine.php' style='float:right;color:green;decoration:none;'>Home</a>

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

echo "<br>........AVAILABLE MEDICINES.........<br><br>";
$result = mysql_query("SELECT * FROM pharmacy where stock > 0");
//fetch tha data from the database
echo "Id----------name----------stock--------------cost<br><br>";
while ($row = mysql_fetch_array($result)) {
   echo "".$row{'medicine_id'}."----------".$row{'medicine_name'}."------------".$row{'stock'}."--------".$row{'cost'}."<br>";
}
echo "<br>";

$appointment_no = $_POST['appointment_no'];

$query = "select * from prescription where appointment_no = $appointment_no";
//echo "$query<br>";			
$result = mysql_query("$query");
echo "<h3>Medicines for Appointment $appointment_no</h3>";
$row = mysql_fetch_array($result);
echo "<h4>".$row[1]."</h4>";

echo "<br>Purchase Details <br>";
echo '<form name="room" action="medicine1.php" method="POST">
Medicine ID : <input type="text" name="medicine_id">
Quantity : <input type="text" name="quantity">
<input type="submit" value="Submit">
</form> ';

echo "<br>";
echo "Update New Stock Details <br>";
echo '<form name="room" action="medicine2.php" method="POST">
Medicine Name : <input type="text" name="medicine_name">
Quantity : <input type="text" name="quantity">
Cost : <input type="text" name="cost">
<input type="submit" value="Submit">
</form> ';

?>
