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
<form  method="POST" action="card_data.php">
<td>Group</td><td> <input type="text" name="group"></td>
<br>
<td><input id="button" type="submit" name="play" value="play"></td>

</form>

<h2>Your Groups:</h2>
<?php include 'my_group.php' ?>






</body>
</html>












