<?php
session_start();
$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

$group = $_SESSION['group_playing'];
echo '<h2 align = "right"><a href = "game.php">Go back to the game page</a></h2>';
$query = mysqli_query($link,"SELECT * FROM `suite_declared` WHERE suite_ID = '".$group."' ");
$count = 1;
echo '<h2>Declared Suites:</h3>';
while($suite_card = mysqli_fetch_array($query))
{
	$_SESSION['card'] = $suite_card['card'];
	$_SESSION['type'] = $suite_card['type'];
	include 'card_image.php';
	if($count == 6)
	{
		echo '<br /><br />';
		$count = 0;
	}
	$count = $count + 1;
}


?>