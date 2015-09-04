<?php

$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

$group = $_SESSION['group_playing'];
$username = $_SESSION['username'];

$query_1 = mysqli_query($link,"SELECT *FROM `group` WHERE group_ID = '".$group."'  ");
$query_2 = mysqli_query($link,"SELECT *FROM `group` WHERE group_ID = '".$group."' AND player = '".$username."'  ");
$my_team = mysqli_fetch_array($query_2);
$check = 1;
while($opponent_player = mysqli_fetch_array($query_1))
{
	if($my_team['team'] != $opponent_player['team'])
	{
		if($check == 1)
		{
			$_SESSION['player_1_dropdown'] = $opponent_player['player'];
		}
		if($check == 2)
		{
			$_SESSION['player_2_dropdown'] = $opponent_player['player'];
		}
		if($check == 3)
		{
			$_SESSION['player_3_dropdown'] = $opponent_player['player'];
		}
		
		$check = $check + 1;
		
	}
	
}
$check = 1;

?>