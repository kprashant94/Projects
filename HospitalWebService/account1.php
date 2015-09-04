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

$appno =   $_POST['appointment_no'];

  $query = "update account set paid=1 where appointment_no = $appno";
  //echo "$query<br>";
 $result = mysql_query("$query");
 
 echo "<a href='account.php' style='color:green;'> Payment Updated </a>";

?>