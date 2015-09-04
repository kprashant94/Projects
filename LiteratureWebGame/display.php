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

/*$card_check = 1 ;
$game_card_check = 0;
*/

$query_1 = mysqli_query($link,"SELECT *FROM `player_card` WHERE player_ID = '".$group."' AND player = '".$username."' ");

while($my_card = mysqli_fetch_array($query_1))
{

	$_SESSION['card'] = $my_card['card'];
	$_SESSION['type'] = $my_card['type'];

	include 'card_image.php';

	



}
echo '<br />';
echo '<br />';

/*

if($player_1 != $username)
{
	
	echo $player_1 ,'&nbsp;','&nbsp;', $team_player_1 , '&nbsp;';
	$deck = mysqli_query($link,"SELECT *FROM `deck`");
	while($deck_card = mysqli_fetch_array($deck))
	{
		$query_1 = mysqli_query($link,"SELECT *FROM `player_card` WHERE player_ID = '".$group."' AND player = '".$username."' ");
		
		while($my_card = mysqli_fetch_array($query_1))
		{
			
			if($deck_card['card'] == $my_card['card'] AND $deck_card['type'] == $my_card['type'])
			{
					$card_check = 0;
			}
		}	
		$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
		$game_progress_cards = mysqli_fetch_array($query_2);
		
		if($card_check == 1)
		{
			if(!empty($game_progress_cards))
			{
				$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
				while($game_card = mysqli_fetch_array($query_2))
				{
					if($deck_card['card'] == $game_card['card'] AND $deck_card['type'] == $game_card['type'] )
					{
						if($game_card['status'] == 'yes' AND $game_card['player_asking'] == $player_1 )
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
						if($game_card['status'] == 'no' AND $game_card['player_asking'] != $player_1 AND $game_card['player_asked'] != $player_1)
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
					}
					else
					{
						$game_card_check = 1;
					}
				}
				if($game_card_check == 1)
				{
					$_SESSION['card'] = $deck_card['card'];
					$_SESSION['type'] = $deck_card['type'];	
					include 'card_image.php';
					
				}
			}
			else
			{
			
				$_SESSION['card'] = $deck_card['card'];
				$_SESSION['type'] = $deck_card['type'];	
				include 'card_image.php';
			}
				
		}
		
		$card_check = 1;
		$game_card_check = 0;
		
	}
	echo '<br />';
	echo '<br />';
}




if($player_2 != $username)
{
	
	echo $player_2 ,'&nbsp;','&nbsp;', $team_player_2 , '&nbsp;';
	$deck = mysqli_query($link,"SELECT *FROM `deck`");
	while($deck_card = mysqli_fetch_array($deck))
	{
		$query_1 = mysqli_query($link,"SELECT *FROM `player_card` WHERE player_ID = '".$group."' AND player = '".$username."' ");
		
		while($my_card = mysqli_fetch_array($query_1))
		{
			
			if($deck_card['card'] == $my_card['card'] AND $deck_card['type'] == $my_card['type'])
			{
					$card_check = 0;
			}
		}	
		$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
		$game_progress_cards = mysqli_fetch_array($query_2);
		
		if($card_check == 1)
		{
			if(!empty($game_progress_cards))
			{
				$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
				while($game_card = mysqli_fetch_array($query_2))
				{
					if($deck_card['card'] == $game_card['card'] AND $deck_card['type'] == $game_card['type'] )
					{
						if($game_card['status'] == 'yes' AND $game_card['player_asking'] == $player_2 )
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
						if($game_card['status'] == 'no' AND $game_card['player_asking'] != $player_2 AND $game_card['player_asked'] != $player_2)
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
					}
					else
					{
						$game_card_check = 1;
					}
				}
				if($game_card_check == 1)
				{
					$_SESSION['card'] = $deck_card['card'];
					$_SESSION['type'] = $deck_card['type'];	
					include 'card_image.php';
					
				}
			}
			else
			{
			
				$_SESSION['card'] = $deck_card['card'];
				$_SESSION['type'] = $deck_card['type'];	
				include 'card_image.php';
			}
				
		}
		
		$card_check = 1;
		$game_card_check = 0;
		
	}
	echo '<br />';
	echo '<br />';
}



if($player_3 != $username)
{
	
	echo $player_3 ,'&nbsp;','&nbsp;', $team_player_3 , '&nbsp;';
	$deck = mysqli_query($link,"SELECT *FROM `deck`");
	while($deck_card = mysqli_fetch_array($deck))
	{
		$query_1 = mysqli_query($link,"SELECT *FROM `player_card` WHERE player_ID = '".$group."' AND player = '".$username."' ");
		
		while($my_card = mysqli_fetch_array($query_1))
		{
			
			if($deck_card['card'] == $my_card['card'] AND $deck_card['type'] == $my_card['type'])
			{
					$card_check = 0;
			}
		}	
		$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
		$game_progress_cards = mysqli_fetch_array($query_2);
		
		if($card_check == 1)
		{
			if(!empty($game_progress_cards))
			{
				$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
				while($game_card = mysqli_fetch_array($query_2))
				{
					if($deck_card['card'] == $game_card['card'] AND $deck_card['type'] == $game_card['type'] )
					{
						if($game_card['status'] == 'yes' AND $game_card['player_asking'] == $player_3 )
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
						if($game_card['status'] == 'no' AND $game_card['player_asking'] != $player_3 AND $game_card['player_asked'] != $player_3)
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
					}
					else
					{
						$game_card_check = 1;
					}
				}
				if($game_card_check == 1)
				{
					$_SESSION['card'] = $deck_card['card'];
					$_SESSION['type'] = $deck_card['type'];	
					include 'card_image.php';
					
				}
			}
			else
			{
			
				$_SESSION['card'] = $deck_card['card'];
				$_SESSION['type'] = $deck_card['type'];	
				include 'card_image.php';
			}
				
		}
		
		$card_check = 1;
		$game_card_check = 0;
		
	}
	echo '<br />';
	echo '<br />';
}



if($player_4 != $username)
{
	
	echo $player_4 ,'&nbsp;','&nbsp;', $team_player_4 , '&nbsp;';
	$deck = mysqli_query($link,"SELECT *FROM `deck`");
	while($deck_card = mysqli_fetch_array($deck))
	{
		$query_1 = mysqli_query($link,"SELECT *FROM `player_card` WHERE player_ID = '".$group."' AND player = '".$username."' ");
		
		while($my_card = mysqli_fetch_array($query_1))
		{
			
			if($deck_card['card'] == $my_card['card'] AND $deck_card['type'] == $my_card['type'])
			{
					$card_check = 0;
			}
		}	
		$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
		$game_progress_cards = mysqli_fetch_array($query_2);
		
		if($card_check == 1)
		{
			if(!empty($game_progress_cards))
			{
				$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
				while($game_card = mysqli_fetch_array($query_2))
				{
					if($deck_card['card'] == $game_card['card'] AND $deck_card['type'] == $game_card['type'] )
					{
						if($game_card['status'] == 'yes' AND $game_card['player_asking'] == $player_4 )
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
						if($game_card['status'] == 'no' AND $game_card['player_asking'] != $player_4 AND $game_card['player_asked'] != $player_4)
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
					}
					else
					{
						$game_card_check = 1;
					}
				}
				if($game_card_check == 1)
				{
					$_SESSION['card'] = $deck_card['card'];
					$_SESSION['type'] = $deck_card['type'];	
					include 'card_image.php';
					
				}
			}
			else
			{
			
				$_SESSION['card'] = $deck_card['card'];
				$_SESSION['type'] = $deck_card['type'];	
				include 'card_image.php';
			}
				
		}
		
		$card_check = 1;
		$game_card_check = 0;
		
	}
	echo '<br />';
	echo '<br />';
}



if($player_5 != $username)
{
	
	echo $player_5 ,'&nbsp;','&nbsp;', $team_player_5 , '&nbsp;';
	$deck = mysqli_query($link,"SELECT *FROM `deck`");
	while($deck_card = mysqli_fetch_array($deck))
	{
		$query_1 = mysqli_query($link,"SELECT *FROM `player_card` WHERE player_ID = '".$group."' AND player = '".$username."' ");
		
		while($my_card = mysqli_fetch_array($query_1))
		{
			
			if($deck_card['card'] == $my_card['card'] AND $deck_card['type'] == $my_card['type'])
			{
					$card_check = 0;
			}
		}	
		$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
		$game_progress_cards = mysqli_fetch_array($query_2);
		
		if($card_check == 1)
		{
			if(!empty($game_progress_cards))
			{
				$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
				while($game_card = mysqli_fetch_array($query_2))
				{
					if($deck_card['card'] == $game_card['card'] AND $deck_card['type'] == $game_card['type'] )
					{
						if($game_card['status'] == 'yes' AND $game_card['player_asking'] == $player_5 )
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
						if($game_card['status'] == 'no' AND $game_card['player_asking'] != $player_5 AND $game_card['player_asked'] != $player_5)
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
					}
					else
					{
						$game_card_check = 1;
					}
				}
				if($game_card_check == 1)
				{
					$_SESSION['card'] = $deck_card['card'];
					$_SESSION['type'] = $deck_card['type'];	
					include 'card_image.php';
					
				}
			}
			else
			{
			
				$_SESSION['card'] = $deck_card['card'];
				$_SESSION['type'] = $deck_card['type'];	
				include 'card_image.php';
			}
				
		}
		
		$card_check = 1;
		$game_card_check = 0;
		
	}
	echo '<br />';
	echo '<br />';
}




if($player_6 != $username)
{
	
	echo $player_6 ,'&nbsp;','&nbsp;', $team_player_6 , '&nbsp;';
	$deck = mysqli_query($link,"SELECT *FROM `deck`");
	while($deck_card = mysqli_fetch_array($deck))
	{
		$query_1 = mysqli_query($link,"SELECT *FROM `player_card` WHERE player_ID = '".$group."' AND player = '".$username."' ");
		
		while($my_card = mysqli_fetch_array($query_1))
		{
			
			if($deck_card['card'] == $my_card['card'] AND $deck_card['type'] == $my_card['type'])
			{
					$card_check = 0;
			}
		}	
		$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
		$game_progress_cards = mysqli_fetch_array($query_2);
		
		if($card_check == 1)
		{
			if(!empty($game_progress_cards))
			{
				$query_2 = mysqli_query($link,"SELECT *FROM `game_progress` WHERE game_ID = '".$group."' ");
				while($game_card = mysqli_fetch_array($query_2))
				{
					if($deck_card['card'] == $game_card['card'] AND $deck_card['type'] == $game_card['type'] )
					{
						if($game_card['status'] == 'yes' AND $game_card['player_asking'] == $player_6 )
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
						if($game_card['status'] == 'no' AND $game_card['player_asking'] != $player_6 AND $game_card['player_asked'] != $player_6)
						{
							$_SESSION['card'] = $deck_card['card'];
							$_SESSION['type'] = $deck_card['type'];	
							include 'card_image.php';
						}
					}
					else
					{
						$game_card_check = 1;
					}
				}
				if($game_card_check == 1)
				{
					$_SESSION['card'] = $deck_card['card'];
					$_SESSION['type'] = $deck_card['type'];	
					include 'card_image.php';
					
				}
			}
			else
			{
			
				$_SESSION['card'] = $deck_card['card'];
				$_SESSION['type'] = $deck_card['type'];	
				include 'card_image.php';
			}
				
		}
		
		$card_check = 1;
		$game_card_check = 0;
		
	}
	echo '<br />';
	echo '<br />';
}

*/

?>