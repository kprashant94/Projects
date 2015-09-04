<?php

session_start();
?>
<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<table border="0" cellpadding="10" cellspacing="1" width="700" align="center">
<tr class="tableheader">
<td align="center">User Dashboard</td>
</tr>
<tr class="tablerow">
<td>
<?php
if(isset($_SESSION['userID'])) 
{
?>
Welcome <?php echo $_SESSION['fullname']; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
<?php
}

else
{
	header("Location:login_check.html");
}

?>






</body>
</html>















