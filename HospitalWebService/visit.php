<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='doctor.php' style='float:right;color:green;decoration:none;'>Home</a>

<?php
	   session_start();

	if(!isset($_SESSION['docid']))
		{
			header('location: index.php');
  			// user is login, direct to the job page
		}

	$appointment_no = $_POST['appointment_no'];
	$illness = $_POST['illness'];
	$prescription	 = $_POST['prescription'];
	$patid = $_POST['patid'];
	$docid = $_SESSION['docid']	;

 
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

$query = "select * from patient where patid =$patid";
 $result = mysql_query("$query"); 
 if (!mysql_num_rows($result))
 	{
 		//echo "<script>alert('patient not present in table')</script>";
 		echo "<SCRIPT LANGUAGE='JavaScript'>
    	window.alert('patient not present in table')
    	window.location.href='doctor.php'
    	</SCRIPT>";
 	}

$query = "insert into patient_visit(appointment_no,patid,illness,docid) 
			values($appointment_no,$patid,'$illness',$docid)";
//echo "$query<br>";			
$result = mysql_query("$query");
if ($result){
   echo "Done.<br>";
}
else{echo "Something went wrong. Please Retry !!<br>";}

$query = "insert into prescription(appointment_no,medicines) 
			values($appointment_no,'$prescription')";
//echo "$query<br>";			
$result = mysql_query("$query");
if ($result){
   echo "Medicines updated in pharmacy<br>";
}
else{echo "Something went wrong. Please Retry !!";}

?>



