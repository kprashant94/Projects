<?php


$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

	$username = $_SESSION['username'];

	$query = mysqli_query($link,"SELECT * FROM `group` WHERE player = '".$username."' ");
	
	while($group = mysqli_fetch_array($query))
	{
		echo '<br />';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$group['group_ID'];
	
	}


?>