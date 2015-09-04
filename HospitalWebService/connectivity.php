<?php
    $username = $_POST['user'];
    $password = $_POST['pass'];
     
    $conn = mysql_connect('localhost', 'root', 'root');
    mysql_select_db('cs315_project', $conn);
 

    $query = "SELECT *
    FROM patient_login
    WHERE username = '$username' and pass = '$password'";
     
    $result = mysql_query("$query");
     
    if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
    {
    //header('Location: login.html');
	echo "user not found";
    }
    else
    {
	session_start();
	$_SESSION['username'] = $username;
	header("Location: patient.php");
	echo "hello !!";
	exit;
    } 
    /*$userData = mysql_fetch_array($result, MYSQL_ASSOC);
    $hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
     
    if($hash != $userData['password']) // Incorrect password. So, redirect to login_form again.
    {
    header('Location: login.html');
    }else{ // Redirect to home page after successful login.
    header('Location: home.html');
    }*/
?>
