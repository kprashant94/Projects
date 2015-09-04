<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='appointment.php' style='float:right;color:green;decoration:none;'>Home</a>

<?php
     session_start();

  if(!isset($_SESSION['docid']))
    {
      header('location: index.php');
        // user is login, direct to the job page
    }

$day = array(1 => 'sunday',2 => 'monday',3 => 'tuesday',4 => 'wednesday',5 => 'thursday',6 => 'friday',7 => 'saturday');

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
echo "<br>........DOCTORS.........<br><br>";
$result = mysql_query("SELECT * FROM department ");
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) 
{
   echo "Dept ".$row{'deptid'}." : ".$row{'deptname'}."<br>";
   echo "------------------------<br>";
   $d = $row{'deptid'};
   $temp = mysql_query("SELECT * FROM doctor where deptid=$d ");
   while ($k = mysql_fetch_array($temp)) 
   	{
      $s1 = $k{'start_slot'};
      $s2 = $k{'end_slot'};
      $temp1 = mysql_query("SELECT timestart FROM slot where slotno=$s1 ");
      $k1 = mysql_fetch_array($temp1);
      $temp2 = mysql_query("SELECT timeend FROM slot where slotno=$s2 ");
      $k2 = mysql_fetch_array($temp2);
   		echo "Doct. ".$k{'docid'}." : ".$k{'docname'}."----------$k1[0] (".$k{'start_slot'}.")----------$k2[0] (".$k{'end_slot'}.")----------".$day[$k{'holiday'}]."<br>";

	}
	echo "<br>";
}
echo "<br>";

?>
<html>
<head>
</head>
<body>
<form method="POST" action="appointment2.php">
patid <br><input type="text" name="patid" size="40"><br>
docid <br><input type="text" name="docid" size="40"><br>
deptid <br><input type="text" name="deptid" size="40"><br>
slotno <br><input type="text" name="slotno" size="40"><br>
date <br><input type="date" name="date" size="40"><br>
Type <br><select type="text" name="type">
  <option value="1">doctor</option>
  <option value="8">ctscan</option>
  <option value="9">dialysis</option>
  <option value="7">xray</option>
</select><br>
<input id="button" type="submit" name="submit" value="Log-In">
</form>
</body>
</html>