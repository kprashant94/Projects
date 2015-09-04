<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='appointment.php' style='float:right;color:green;decoration:none;'>Home</a>

<?php
	   session_start();

	if(!isset($_SESSION['docid']))
		{
			header('location: index.php');
  			// user is login, direct to the job page
		}

$patid = $_POST['patid'];
$docid = $_POST['docid'];
$slotno = $_POST['slotno'];
$deptid = $_POST['deptid'];
$date = $_POST['date'];
$type = $_POST['type'];



 $conn = mysql_connect('localhost', 'root', 'root');
    mysql_select_db('cs315_project', $conn);


// check if patient is registered
$query = "select * from patient where patid =$patid";
 $result = mysql_query("$query"); 
 if (!mysql_num_rows($result))
 	{
 		//echo "<script>alert('patient not present in table')</script>";
 		echo "<SCRIPT LANGUAGE='JavaScript'>
    	window.alert('patient not present in table')
    	window.location.href='appointment.php'
    	</SCRIPT>";
 	}

// check if doctor is present in dept
 $query = "select * from doctor where deptid=$deptid and docid=$docid";
 //echo $query;
 $result = mysql_query("$query");

 if (!mysql_num_rows($result))
 	{
 		echo "<script>
 			window.alert('doctor not present in department')
 			window.location.href='appointment.php'
 			</script>";
 		//header('location: index.php');
 	}

// check if doctor is on holiday
$query = "select * from doctor where deptid=$deptid and docid=$docid";

$result = mysql_query("$query");
$row = mysql_fetch_array($result);
$temp = mysql_query("select dayofweek('$date')");
$temp = mysql_fetch_array($temp);
if($row['holiday'] == $temp[0])
{
	echo "sgs";
	echo "<script>
			window.alert('Doctor on holiday')
			window.location.href='appointment.php'</script>";
	//header('location: index.php');
}

// check if doctor is on leave
$query = "select docid from leave where docid=$docid and 
			$date >= start_date and $date <= end_date";
$result = mysql_query("$query");
$row = mysql_fetch_array($result);
if(mysql_num_rows($result))
{
	echo "<script>window.alert('Doctor on leave')
			window.location.href='appointment.php'</script>";
	header('location: index.php');
}


// check if slot is empty
 $query = "select * from appointment where docid=$docid and app_date = '$date' 
 			and slotno = $slotno";
 $result = mysql_query("$query");
 if (mysql_num_rows($result)){
 	echo "<script>window.alert('Try some other slot')
 			window.location.href='appointment.php'</script>";}
 else	
{
// update the database	
 $query = "insert into appointment(slotno,docid,patid,app_date,app_type) 
 			values($slotno,$docid,$patid,'$date',$type)";				
 $result = mysql_query($query);
 if($result){
	 echo "Done<br>";
	 $query = "select * from appointment where slotno = $slotno and 
	 docid = $docid and patid = $patid and app_date = '$date'and app_type = $type";
	 $result = mysql_query("$query");
	 $row = mysql_fetch_array($result);				
	 //echo "$query";
	 $appointment_no = $row[0];
	 $slotno = $row[1];
	 $docid = $row[2];
	 $patid = $row[3];
	 $app_date = $row[4];
	 $app_type = $row[5];

	 echo "Your Appointment Details are :<br>
	 		 Appointment number : $appointment_no.<br> 
	 		 slot number : $slotno.<br> 
	 		 doctor id : $docid.<br> 
	 		 Date  : $app_date.<br> 
	 		 Type  : $app_type.<br> 
	 		 Go to the accounts section<br>";
	 $query = "insert into account
 			values($appointment_no,0)";
 	 $result =mysql_query("$query");
	 if(!$result)echo "Retry";
	 }
else{echo "Retry";}	 

}

?>
