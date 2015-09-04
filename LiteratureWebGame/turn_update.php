<?php
$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

$group = $_SESSION['group_playing'];

	$game_turn = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ORDER BY gp_ID DESC  ");
	$game_turn_data = mysqli_fetch_array($game_turn);
	
	if(!(empty($game_turn_data)))
	{
		if($game_turn_data['status'] == 'Yes')
		{
			$_SESSION['player_turn'] = $game_turn_data['player_asking'];
		}
		else
		{
			$_SESSION['player_turn'] = $game_turn_data['player_asked'];
		}
		
	}
	else
	{
		$_SESSION['player_turn'] = $_SESSION['player_1'];
	}

?>