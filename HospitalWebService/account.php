<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='account.php' style='float:right;color:green;decoration:none;'>Home</a>

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

echo "----------Unpaid Appointment_No's--------------<br><br>";
$result = mysql_query("SELECT appointment_no FROM account where paid = 0");
//fetch tha data from the database
echo "S No. ............... Appoinment No. ............. Cost<br>";
$i = 1;

while ($row = mysql_fetch_array($result)) {
   $result1 = mysql_query("SELECT app_type FROM appointment where appointment_no = $row[0]");
   $row1 = mysql_fetch_array($result1);
   $result2 = mysql_query("SELECT cost FROM type where app_type = $row1[0]");
   $row2 = mysql_fetch_array($result2);
   echo "$i -----------------------: ".$row[0]."----------------------: ".$row2[0]."<br>";
   $i = $i+1;
}
echo "<br>";



echo "<br>";
echo "Update Payments <br>";
echo '<form name="payment" action="account1.php" method="POST">
Appointment_No : <input type="int" name="appointment_no">
<input type="submit" value="Submit">
</form> ';

?>
