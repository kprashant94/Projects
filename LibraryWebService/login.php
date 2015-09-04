<?php
session_start();
$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

$username = $_POST['user'];
$password = $_POST['pass'];

if((!empty($username)) AND (!empty($password)))
{
	$query = mysqli_query($link,"SELECT *from users where username = '".$username."'");
	$row = mysqli_fetch_array($query);
		
		//echo $row['username'] , $row['pass'];
	
	if(($row['username'] == $username) AND ($row['password'] == $password))
	{
		$_SESSION['userID'] = $row['userID'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['fullname'] = $row['fullname'];
	}
	
	else
	{
		header("Location: signIn_check.html");
		
	}
}

else
{
	header("Location: signIn_check.html");
}

if(isset($_SESSION['userID']))
{
	header("Location: user_profile.php");
}

?>