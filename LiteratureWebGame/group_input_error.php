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
<h3>something went wrong try again. Either you didn't entered all details or there is no vacancy in the group or the team you choosing in group may have all 3 members of that team or you already joined this group</h3>
<form  method="POST" action="group_data.php">
<h3>Join in:</h3>
<td>Group</td><td> <input type="text" name="group"></td>
&nbsp;
&nbsp;
<td>Team</td>
<select name="team">
<option value="null">select</option>
<option value="1">1</option>
<option value="2">2</option>

</select>


<br><br>
<td><input id="button" type="submit" name="proceed" value="Proceed"></td>

</form>

<br><br>
<a href="card_input.php">Play with already made groups</a>






</body>
</html>












