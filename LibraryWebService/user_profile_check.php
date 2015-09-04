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
<h2>Welcome <?php echo $_SESSION['fullname']; ?>. Click here to <a href="logout.php" tite="Logout">Logout.</a></h2>
<?php
}

else
{
	header("Location:login_check.html");
}

?>  

<?php
echo "<br>";
?>
<?php include 'upload.html';?>
<?php
echo "<br>";
?>

<h3>This book already exits !!</h3>

<?php include 'showfiles.php';?>
</body>
</html>