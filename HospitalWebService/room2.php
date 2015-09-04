<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='room.php' style='float:right;color:green;decoration:none;'>Home</a>
<?php
$start = $_POST['start_date'];
$end = $_POST['end_date'];
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


echo "...............Available Rooms................<br>";
$result = mysql_query("select * from room,room_cost where 
	room.room_type = room_cost.room_type and 
	room.room_no not in 
	(select room_no from reservation where 
		('$start' <= reservation.end_date and '$start' >= reservation.start_date) 
		or ('$end' <= end_date and '$end' >= start_date))");
while ($row = mysql_fetch_array($result)) {
   echo "type: ".$row{'room_type'}." ------------------------ room_no:".$row{'room_no'}."<br>";
}
echo "<br>";
?>

<html>
<head>
</head>
<body>
<form method="POST" action="room1.php">
room_no <br><input type="text" name="room_no" size="40"><br>
start_date <br><input type="date" name="start_date" min="2014-04-12"size="40"><br>
end_date <br><input type="date" name="end_date" min="2014-04-12" size="40"><br>
patid <br><input type="text" name="patid" size="40"><br>
<input id="button" type="submit" name="submit" value="submit">
</form>
</body>
</html>