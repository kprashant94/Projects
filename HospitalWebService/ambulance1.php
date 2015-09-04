<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='ambulance.php' style='float:right;color:green;decoration:none;'>Home</a>

<?php
	   session_start();

	if(!isset($_SESSION['docid']))
		{
			header('location: index.php');
  			// user is login, direct to the job page
		}

$id = $_POST['ambulance_id'];
 $conn = mysql_connect('localhost', 'root', 'root');
    mysql_select_db('cs315_project', $conn);
	
 $query = "select availability from ambulance where ambulance_id = $id";
 $result = mysql_query("$query");
 $row = mysql_fetch_array($result);
 if ($row['availability'] == 1)
 {
    $query = "update ambulance set availability=0 where ambulance_id = $id";
    $result = mysql_query("$query");
    echo "Ambulance id ".$id." is booked<br>";
 }
 else
 {
	echo "Sorry try some other ambulance<br> Click on the link :";
 }
echo "<a href='ambulance.php' style='color:green;'> Check Ambulance details </a>";
?>
