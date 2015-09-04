<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='medicine.php' style='float:right;color:green;decoration:none;'>Home</a>

<?php
	   session_start();

	if(!isset($_SESSION['docid']))
		{
			header('location: index.php');
  			// user is login, direct to the job page
		}

$id = $_POST['medicine_id'];
$quantity = $_POST['quantity'];

 $conn = mysql_connect('localhost', 'root', 'root');
    mysql_select_db('cs315_project', $conn);
	
 $query = "update pharmacy set stock=stock-$quantity where medicine_id=$id";
 $result = mysql_query("$query");
 $query = "select cost from pharmacy where medicine_id=$id";
 $result = mysql_query("$query");
 $row = mysql_fetch_array($result);
 $money = $quantity*$row['cost'];
 echo "Collect Rs. $money<br>";
 
 echo "<a href='medicine.php' style='color:green;'> Check new stock </a>";

?>
