<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='doctor.php' style='float:right;color:green;decoration:none;'>Home</a>
<?php

	session_start();

	if(!isset($_SESSION['docid']))
		{
			header('location: index.php');
  			// user is login, direct to the job page
		}

	$date = $_POST['visit_date'];
	$slots = $_POST['slots'];
	$ot_room = $_POST['ot_room'];
	$patid = $_POST['patid'];
	$docid = $_SESSION['docid'];

 
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

// check if patient is registered
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
// check if doctor is on holiday
$query = "select * from doctor where docid=$docid";

$result = mysql_query("$query");
$row = mysql_fetch_array($result);
$temp = mysql_query("select dayofweek('$date')");
$temp = mysql_fetch_array($temp);
if($row['holiday'] == $temp[0])
{
	echo "sgs";
	echo "<script>
			window.alert('Doctor on holiday')
			window.location.href='doctor.php'</script>";
	//header('location: index.php');
}

$start_slot = $row[5];
$end_slot = $row[6];

// check if doctor is on leave
$query = "select docid from leave where docid=$docid and 
			$date >= start_date and $date <= end_date";
$result = mysql_query("$query");
$row = mysql_fetch_array($result);
if(mysql_num_rows($result))
{
	echo "<script>window.alert('Doctor on leave')
			window.location.href='doctor.php'</script>";
	header('location: index.php');
}


for($i = $start_slot;$i<=$end_slot-$slots;$i=$i+1)
{
	$flag = 0;
	for($j = 0;$j<$slots;$j=$j+1)
	{
		$k = $i+$j;
		 $query = "select * from appointment where docid=$docid and app_date = '$date' 
 			and slotno = $k";
 		$result = mysql_query("$query")	;
 		if(mysql_num_rows($result))
 		{
 			$flag=1;
 			$i = $k+1;
 			break;
 		}
	}
	if($flag == 0)
	{
		for($j = 0;$j<$slots;$j=$j+1)
		{
			$i = $i+$j;
			 $query = "insert into appointment(slotno,docid,patid,app_date,app_type) 
 			values($i,$docid,$patid,'$date',10)";
	 		$result = mysql_query("$query")	;
	 		if(!$result)
	 		{
	 			echo "Please retry..!!";
	 			break;
	 		}

			 $query = "select * from appointment where slotno = $i and 
			 docid = $docid and patid = $patid and app_date = '$date'
			 				and app_type = 10";
			 $result = mysql_query("$query");
			 $row = mysql_fetch_array($result);
			 echo "Appointment no: ".$row[0]."<br>";

			 $query = "insert into account values($row[0],0)";
 	 		 $result=mysql_query("$query");
			if(!$result)echo "Retry";
 	 		 $query = "insert into ot values($row[0],'$date',$i,$ot_room)";
 	 		 $result=mysql_query("$query");
			 if(!$result)echo "Retry";
		}
		break;
	}
	

}

?>


