<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='doctor.php' style='float:right;color:green;decoration:none;'>Home</a>
<?php
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	session_start();

	if(!isset($_SESSION['docid']))
		{
			header('location: index.php');
  			// user is login, direct to the job page
		}

 echo "welcome $_SESSION[docid] <br>";
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

$docid = $_SESSION['docid'];
$query = "SELECT * FROM appointment where docid = $docid and 
						app_date >= '$start_date' and app_date <= '$end_date'";
$result = mysql_query("$query");
if(mysql_num_rows($result))
{
   echo "You have appointments in that duration .. !!<br>";
   echo "<script>window.alert('You have appointments in that duration .. !!') 
   				window.location.href='doctor.php'</script>";
}
else
{
$result = mysql_query("insert into vacation values($docid,'$start_date','$end_date')");
if(!$result)echo "Retry";
echo "Application sent..!!";
}

?>



