<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='registration.php' style='float:right;color:green;decoration:none;'>Home</a>

<?php
	   session_start();

	if(!isset($_SESSION['docid']))
		{
			header('location: index.php');
  			// user is login, direct to the job page
		}

$patname = $_POST['patname'];
$phone = $_POST['phone'];
$street = $_POST['street'];
$city = $_POST['city'];

 $conn = mysql_connect('localhost', 'root', 'root');
    mysql_select_db('cs315_project', $conn);


// check if patient is registered
$query = "select patid from patient where patname ='$patname' and phone = $phone";
 $result = mysql_query("$query"); 
 $row = mysql_fetch_array($result);
 if (mysql_num_rows($result))
 	{
 		echo "You are already registered.<br>Your 
 				registration ID is ".$row['patid']."<br>";
 	/*	echo "<SCRIPT LANGUAGE='JavaScript'>
    	window.alert('You already seem to have registered before')
    	window.location.href='index.php';
    	</SCRIPT>";
    */	
 	}
 else{
$query = "insert into patient(patname,phone,street,city) 
			values('$patname',$phone,'$street','$city')";			;
$result = mysql_query("$query")	;	
if(!$result)echo "Retry";
$query = "select * from patient where patname = '$patname' and phone = $phone";
 $result = mysql_query("$query"); 
 $row = mysql_fetch_array($result);
 $k = $row['patid'];
 if ($k > 0){
	echo "You are registered.<br>Your registration ID is $k<br>";}
else{
	echo "please retry..!!<br>";}
 }	
// check if slot is empty
?>

