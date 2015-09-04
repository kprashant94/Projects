<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='room.php' style='float:right;color:green;decoration:none;'>Home</a>
<?php
 session_start();

	if(!isset($_SESSION['docid']))
		{
			header('location: room.php');
  			// user is login, direct to the job page
		}
$room_no = $_POST['room_no'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$patid = $_POST['patid'];

 $conn = mysql_connect('localhost', 'root', 'root');
    mysql_select_db('cs315_project', $conn);


// check if patient is registered
$query = "select * from patient where patid =$patid";
 $result = mysql_query("$query"); 
 if (!mysql_num_rows($result))
 	{
 		//echo "<script>alert('patient not present in table')</script>";
 		echo "<SCRIPT LANGUAGE='JavaScript'>
    	window.alert('patient not registered.Please register first')
    	window.location.href='room.php';
    	</SCRIPT>";
 	}



// check if slot is empty
 $query = "select room_no from reservation where room_no=$room_no and 
 			('$start_date' >= start_date and '$start_date' <= end_date)
 			or ('$end_date' >= start_date and '$end_date' <= end_date)";
 $result = mysql_query("$query");
 if (!mysql_num_rows($result)){
 	echo "<script>window.alert('This room is not available during this period')
 			window.location.href='room.php'</script>";}
 else	
{
// update the database	
 $query = "insert into reservation values($room_no,'$start_date','$end_date',$patid)";	
 $result = mysql_query("$query");
 if(!$result){echo "Retry";}
 else{
 	$result = mysql_query("select room_cost.room_cost from room,room_cost where 
	room.room_type = room_cost.room_type and 
	room.room_no = $room_no");
	$row = mysql_fetch_array($result);
	$k = mysql_query("select DATEDIFF('$end_date','$start_date')");
	$t = mysql_fetch_array($k);
		echo "collect Rs. ".$row[0]*($t[0]+1)."<br>";
 }
}

?>
