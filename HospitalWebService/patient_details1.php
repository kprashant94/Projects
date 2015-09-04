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

$id = $_POST['patid'];
//echo "af<br>";
//echo "$id";

$query = "select * from patient where patid =$id";

//echo "$query";
 $result = mysql_query("$query"); 
 if (!mysql_num_rows($result))
 	{
 		//echo "<script>alert('patient not present in table')</script>";
 		echo "<SCRIPT LANGUAGE='JavaScript'>
    	window.alert('No such patient id exist')
    	window.location.href='patient_details.php'
    	</SCRIPT>";
 	}

//echo "$id<br>";
$query = "SELECT * FROM patient_visit where patid = $id";
//echo "$query  <br>";
$result = mysql_query("$query");
//echo count($result);
//fetch tha data from the database

	$i = 1;
	echo "<h1>---------- Visits for Patient ID $id ------------</h1><br><br>";
	while ($row = mysql_fetch_array($result)) {
	   echo "-------------- $i -------------- <br> ";
	   echo "Appointment Number :".$row[0]."<br>";
	   echo "Doctor Id : ".$row[3]."<br>";
	   echo "Illness : ".$row[2]."<br>";
	   $query1 = "SELECT * FROM prescription where appointment_no = $row[0]";
		//echo "$query  <br>";
		$result1 = mysql_query("$query1");
		$row1 = mysql_fetch_array($result1);
		echo "Prescription : ".$row1[1]."<br>";
	   $i = $i+1;
	   echo "<br>";
	}
	echo "<br>";

?>
