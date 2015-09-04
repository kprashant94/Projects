<?php
	   session_start();

	if(!isset($_SESSION['username']))
		{
			header('location: index.php');
  			// user is login, direct to the job page
		}

        echo "welcome $_SESSION[username]";
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
   echo "type:".$row{'room_type'}." cost:".$row{'room_cost'}."<br>";
}
echo "<br>";

$start = '2014-04-05';
$end = '2014-04-07';
echo "<br>";
$result = mysql_query("select * from room,room_cost where room.room_type = room_cost.room_type and room.room_no not in (select room_no from reservation where ('$start' <= reservation.end_date and '$start' >= reservation.start_date) or ('$end' <= end_date and '$end' >= start_date))");
while ($row = mysql_fetch_array($result)) {
   echo "type:".$row{'room_type'}." room_no:".$row{'room_no'}." cost:".$row{'room_cost'}."<br>";
}
echo "<br>";

echo "<a href='logout.php' style='float:top;'>Logout</a>";



?>



