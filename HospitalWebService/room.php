<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='room.php' style='float:right;color:green;decoration:none;'>Home</a>
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

echo "<br>......................TYPES.................<br>";
$result = mysql_query("SELECT * FROM room_cost");
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
   echo "type:".$row{'room_type'}." -------------------- Rs. ".$row{'room_cost'}."<br>";
}
echo "<br>";


?>

<html>
<head>
</head>
<body>
<form method="POST" action="room2.php">
start_date <br><input type="date" name="start_date" min="2014-04-12"size="40"><br>
end_date <br><input type="date" name="end_date" min="2014-04-12" size="40"><br>
<input id="button" type="submit" name="submit" value="submit">
</form>
</body>
</html>

