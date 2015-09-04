<?php
session_start();
$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

	$group = $_SESSION['group_playing'];

	mysqli_query($link, "DELETE FROM `player_card` WHERE player_ID = '".$group."' ");
	mysqli_query($link, "DELETE FROM `game_progress` WHERE game_ID = '".$group."'");
	mysqli_query($link, "DELETE FROM `suite_declared` WHERE suite_ID = '".$group."'");
	mysqli_query($link, "DELETE FROM `score` WHERE score_ID = '".$group."'");
	

	header('Location:group_input.php');

?>