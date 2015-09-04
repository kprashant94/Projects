<?php

$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

$group = $_SESSION['group_playing'];
$username = $_SESSION['username'];

$player_1 = $_SESSION['player_1'];
$team_player_1 = $_SESSION['team_player_1'];

$player_2 = $_SESSION['player_2'];
$team_player_2 = $_SESSION['team_player_2'];

$player_3 = $_SESSION['player_3'];
$team_player_3 = $_SESSION['team_player_3'];

$player_4 = $_SESSION['player_4'];
$team_player_4 = $_SESSION['team_player_4'];

$player_5 = $_SESSION['player_5'];
$team_player_5 = $_SESSION['team_player_5'];

$player_6 = $_SESSION['player_6'];
$team_player_6 = $_SESSION['team_player_6'];



$query_1 = mysqli_query($link,"SELECT *FROM `player_card` WHERE player_ID = '".$group."' AND player = '".$username."' ");


while($my_card = mysqli_fetch_array($query_1))
{
		$_SESSION['card'] = $my_card['card'];
		$_SESSION['type'] = $my_card['type'];
		
		include 'card_image.php';
		
		
}


$query_player_1 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' AND player = '".$player_1."' ");
$query_player_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' AND player = '".$player_2."' ");
$query_player_3 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' AND player = '".$player_3."' ");
$query_player_4 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' AND player = '".$player_4."' ");
$query_player_5 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' AND player = '".$player_5."' ");
$query_player_6 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' AND player = '".$player_6."' ");


if($player_1 != $username)
{
	echo $player_1;
	echo $team_player_1;
	
	
		while($query_player_1_result = mysqli_fetch_array($query_player_1))
		{
				$_SESSION['card'] = $query_player_1_result['card'];
				$_SESSION['type'] = $query_player_1_result['type'];	
				include 'card_image.php';
			
		}
	
}

if($player_2 != $username)
{
	echo $player_2;
	echo $team_player_2;
	while($query_player_2_result = mysqli_fetch_array($query_player_2))
		{
				$_SESSION['card'] = $query_player_2_result['card'];
				$_SESSION['type'] = $query_player_2_result['type'];	
				include 'card_image.php';
			
		}
}



if($player_3 != $username)
{
	echo $player_3;
	echo $team_player_3;
	while($query_player_3_result = mysqli_fetch_array($query_player_3))
		{
				$_SESSION['card'] = $query_player_3_result['card'];
				$_SESSION['type'] = $query_player_3_result['type'];	
				include 'card_image.php';
			
		}
}


if($player_4 != $username)
{
	echo $player_4;
	echo $team_player_4;
	while($query_player_4_result = mysqli_fetch_array($query_player_4))
		{
				$_SESSION['card'] = $query_player_4_result['card'];
				$_SESSION['type'] = $query_player_4_result['type'];	
				include 'card_image.php';
			
		}
}


if($player_5 != $username)
{
	echo $player_5;
	echo $team_player_5;
	while($query_player_5_result = mysqli_fetch_array($query_player_5))
		{
				$_SESSION['card'] = $query_player_5_result['card'];
				$_SESSION['type'] = $query_player_5_result['type'];	
				include 'card_image.php';
			
		}	
}



if($player_6 != $username)
{
	echo $player_6;
	echo $team_player_6;
	while($query_player_6_result = mysqli_fetch_array($query_player_6))
		{
				$_SESSION['card'] = $query_player_6_result['card'];
				$_SESSION['type'] = $query_player_6_result['type'];	
				include 'card_image.php';
			
		}
}

?>