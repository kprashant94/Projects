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
<h3>You didn't joined this group. To join group <a href = "group_input.php">Click here</a></h3>
<form  method="POST" action="card_data.php">
<td>Group</td><td> <input type="text" name="group"></td>
<br>
<td><input id="button" type="submit" name="play" value="play"></td>

</form>








</body>
</html>












