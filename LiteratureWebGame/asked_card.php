<?php

$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

$group = $_SESSION['group_playing'];

$query = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ORDER BY gp_ID DESC");

while($result = mysqli_fetch_array($query))
{
	$_SESSION['card'] = $result['card'];
	$_SESSION['type'] = $result['type'];
	echo $result['player_asking'] , '&nbsp;&nbsp; asked to &nbsp;&nbsp; ' , $result['player_asked'], '&nbsp;&nbsp;&nbsp;&nbsp;', $result['status'],'&nbsp;&nbsp&nbsp;&nbsp;';
	include 'card_image.php';
	echo '<br /><br />';
}


?>