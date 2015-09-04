<?php

$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

$group = $_SESSION['group_playing'];

$query = mysqli_query($link,"SELECT *FROM `score` WHERE score_ID = '".$group."' ");
$score = mysqli_fetch_array($query);

$_SESSION['team_1'] = $score['team_1'];
$_SESSION['team_2'] = $score['team_2']; 


?>