<!DOCTYPE HTML>
<html>
<head>
<title>Profile</title>

</head>
<body>
<?php
session_start();
?>
<?php
if(isset($_SESSION['userID'])) 
{
?>
<h2>Welcome <?php echo $_SESSION['fullname']; ?>. Click here to <a href="logout.php" title="Logout">Logout.</a></h2>
<?php
}

else
{
	header("Location:login_check.html");
}

?>  

<a href="group_input.php">Play Literature</a>







</body>
</html>












