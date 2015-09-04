<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='registration.php' style='float:right;color:green;decoration:none;'>Home</a>

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
?>

<html>
<head>
</head>
<body>
<p>................. ENTER THE DETAILS...................</p>
<form method="POST" action="registration1.php">
patname <br><input type="text" name="patname" min="2014-04-12"size="40"><br>
phone (landline)<br><input type="text" name="phone" min="2014-04-12" size="40"><br>
street <br><input type="text" name="street" size="40"><br>
city <br><input type="text" name="city" size="40"><br>

<input id="button" type="submit" name="submit" value="Log-In">
</form>
</body>
</html>

