<?php 
$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

$fullname = $_POST['name'];
$username = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['pass'];

$query1 = mysqli_query($link,"SELECT * FROM users where username = '".$username."' ");
$query2 = mysqli_query($link,"SELECT * FROM users where email = '".$email."'");
$row1 = mysqli_fetch_array($query1);
//echo $row1['username'];
$row2 = mysqli_fetch_array($query2);
//echo $row1['email']
 
if( (!empty($fullname)) AND (!empty($username)) AND (!empty($email)) & (!empty($password)) )
{

	if($row1['username'] == $username)
	{
		echo "username aready Exists.." ;
		header("Location: sign-up_username.html");
		exit;
	}
	
	elseif($row2['email'] == $email )
	{
		echo "email aready Exists.." ;
		header("Location: sign-up_email.html");
		exit;
	}
	
	else
	{
		mysqli_query($link,"insert into users(fullname,username,email,password) values('".$fullname."','".$username."','".$email."','".$password."')") ;
		header("Location: signUp_confirm.html");
		//echo "Your registration is complete.." ;
	
	}
	
	
	//echo $username ;
 }
 
 else
{
header("Location: reg_field_check.html");
} 
?> 