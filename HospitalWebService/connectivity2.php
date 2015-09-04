<?php
    $type = $_POST['type'];
    $docid = $_POST['docid'];
    $password = $_POST['pass'];
     
    $conn = mysql_connect('localhost', 'root', 'root');
    mysql_select_db('cs315_project', $conn);
 
    if($type == 'doctor')
    {
        $query = "SELECT *
        FROM doctor_login
        WHERE docid = $docid and pass = '$password'";
         
        $result = mysql_query("$query");
        echo "$query";
         
        if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
        {
        //header('Location: login.html');
    	echo "user not found";
        }
        else
        {
    	session_start();
    	$_SESSION['docid'] = $docid;
    	header("Location: $type.php");
    	echo "hello !!";
    	exit;
        } 
    }
    elseif($type == 'ambulance' or $type =='medicine' or $type == 'registration'
        or $type == 'appointment' or $type == 'room' or $type == 'xray'
        or $type == 'ctscan' or $type == 'dialysis' or $type == 'account'
        or $type == 'patient_details')
    {
        $query = "SELECT *
        FROM employee
        WHERE type = '$type' and id = $docid and password = '$password'";
         
        $result = mysql_query("$query");
        echo "$query";
         
        if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
        {
        //header('Location: login.html');
        echo "user not found";
        }
        else
        {
        session_start();
        $_SESSION['docid'] = $docid;
        header("Location: $type.php");
        echo "hello !!";
        exit;
        }    
    }
    else
    {
        echo "type of employee did not match";
    }    
?>
