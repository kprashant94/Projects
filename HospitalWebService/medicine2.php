<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='medicine.php' style='float:right;color:green;decoration:none;'>Home</a>

<?php
	   session_start();

	if(!isset($_SESSION['docid']))
		{
			header('location: index.php');
  			// user is login, direct to the job page
		}

$name = $_POST['medicine_name'];
$quantity = $_POST['quantity'];
$cost = $_POST['cost'];

 $conn = mysql_connect('localhost', 'root', 'root');
    mysql_select_db('cs315_project', $conn);
	
 $query = "insert into pharmacy(medicine_name,stock,cost) values('$name',$quantity,$cost)";
 $result = mysql_query("$query");
 if(!$result)echo "Retry";
 
 echo "<a href='medicine.php' style='color:green;'> Check new stock </a>";

?>
