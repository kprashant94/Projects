<?php
session_start();
$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

if(isset($_POST['card']))
	{
		$card =$_POST['card'];

	}

if(isset($_POST['card_type']))
	{
		$type =$_POST['card_type'];

	}
if(isset($_POST['player']))
	{
		$player =$_POST['player'];

	}
	$username = $_SESSION['username'];
	$group = $_SESSION['group_playing'];
	$_SESSION['asked_player'] = $player;
	$yes = 'Yes';
	$no = 'No';
	$card_avail_check = 0;
	$card_insert_check = 0;
	
	$query = mysqli_query($link,"SELECT *FROM `player_card` WHERE player_ID = '".$group."' AND player = '".$player."'  ");
	$check_player_no_card = mysqli_fetch_array($query);
	
if(empty($check_player_no_card))
{
	$_SESSION['player_having_no_card'] = $player ;
	header('Location:game_no_card_error.php');
}
else
{	
	
	$query_1 = mysqli_query($link,"SELECT *FROM `player_card` WHERE player_ID = '".$group."' AND player = '".$player."'  ");
	$my_team = mysqli_query($link,"SELECT *FROM `group` WHERE group_ID = '".$group."' AND player = '".$username."'  ");
	$my_team_result = mysqli_fetch_array($my_team);
	$opponent_team = mysqli_query($link,"SELECT *FROM `group` WHERE group_ID = '".$group."' AND player = '".$player."'  ");
	$opponent_team_result = mysqli_fetch_array($opponent_team);
	$query_2 = mysqli_query($link,"SELECT *FROM `player_card` WHERE player_ID = '".$group."' AND player = '".$username."'  ");
	
	
	while($my_card = mysqli_fetch_array($query_2))
	{
		if(($card == 'A' AND $type == 'heart') or ($card == '2' AND $type == 'heart') or ($card == '3' AND $type == 'heart') or ($card == '4' AND $type == 'heart') or ($card == '5' AND $type == 'heart') or ($card == '6' AND $type == 'heart'))
		{
			if(($my_card['card'] == 'A' AND $my_card['type'] == 'heart') or ($my_card['card'] == '2' AND $my_card['type'] == 'heart') or ($my_card['card'] == '3' AND $my_card['type'] == 'heart') or ($my_card['card'] == '4' AND $my_card['type'] == 'heart') or ($my_card['card'] == '5' AND $my_card['type'] == 'heart') or ($my_card['card'] == '6' AND $my_card['type'] == 'heart'))
			{
				$card_avail_check = 1;
			}
		}
		else if(($card == '8' AND $type == 'heart') or ($card == '9' AND $type == 'heart') or ($card == '10' AND $type == 'heart') or ($card == 'J' AND $type == 'heart') or ($card == 'Q' AND $type == 'heart') or ($card == 'K' AND $type == 'heart'))
		{
			if(($my_card['card'] == '8' AND $my_card['type'] == 'heart') or ($my_card['card'] == '9' AND $my_card['type'] == 'heart') or ($my_card['card'] == '10' AND $my_card['type'] == 'heart') or ($my_card['card'] == 'J' AND $my_card['type'] == 'heart') or ($my_card['card'] == 'Q' AND $my_card['type'] == 'heart') or ($my_card['card'] == 'K' AND $my_card['type'] == 'heart'))
			{
				$card_avail_check = 1;
			}
		}
		else if(($card == 'A' AND $type == 'club') or ($card == '2' AND $type == 'club') or ($card == '3' AND $type == 'club') or ($card == '4' AND $type == 'club') or ($card == '5' AND $type == 'club') or ($card == '6' AND $type == 'club'))
		{
			if(($my_card['card'] == 'A' AND $my_card['type'] == 'club') or ($my_card['card'] == '2' AND $my_card['type'] == 'club') or ($my_card['card'] == '3' AND $my_card['type'] == 'club') or ($my_card['card'] == '4' AND $my_card['type'] == 'club') or ($my_card['card'] == '5' AND $my_card['type'] == 'club') or ($my_card['card'] == '6' AND $my_card['type'] == 'club'))
			{
				$card_avail_check = 1;
			}
		}
		else if(($card == '8' AND $type == 'club') or ($card == '9' AND $type == 'club') or ($card == '10' AND $type == 'club') or ($card == 'J' AND $type == 'club') or ($card == 'Q' AND $type == 'club') or ($card == 'K' AND $type == 'club'))
		{
			if(($my_card['card'] == '8' AND $my_card['type'] == 'club') or ($my_card['card'] == '9' AND $my_card['type'] == 'club') or ($my_card['card'] == '10' AND $my_card['type'] == 'club') or ($my_card['card'] == 'J' AND $my_card['type'] == 'club') or ($my_card['card'] == 'Q' AND $my_card['type'] == 'club') or ($my_card['card'] == 'K' AND $my_card['type'] == 'club'))
			{
				$card_avail_check = 1;
			}
		}
		if(($card == 'A' AND $type == 'diamond') or ($card == '2' AND $type == 'diamond') or ($card == '3' AND $type == 'diamond') or ($card == '4' AND $type == 'diamond') or ($card == '5' AND $type == 'diamond') or ($card == '6' AND $type == 'diamond'))
		{
			if(($my_card['card'] == 'A' AND $my_card['type'] == 'diamond') or ($my_card['card'] == '2' AND $my_card['type'] == 'diamond') or ($my_card['card'] == '3' AND $my_card['type'] == 'diamond') or ($my_card['card'] == '4' AND $my_card['type'] == 'diamond') or ($my_card['card'] == '5' AND $my_card['type'] == 'diamond') or ($my_card['card'] == '6' AND $my_card['type'] == 'diamond'))
			{
				$card_avail_check = 1;
			}
		}
		else if(($card == '8' AND $type == 'diamond') or ($card == '9' AND $type == 'diamond') or ($card == '10' AND $type == 'diamond') or ($card == 'J' AND $type == 'diamond') or ($card == 'Q' AND $type == 'diamond') or ($card == 'K' AND $type == 'diamond'))
		{
			if(($my_card['card'] == '8' AND $my_card['type'] == 'diamond') or ($my_card['card'] == '9' AND $my_card['type'] == 'diamond') or ($my_card['card'] == '10' AND $my_card['type'] == 'diamond') or ($my_card['card'] == 'J' AND $my_card['type'] == 'diamond') or ($my_card['card'] == 'Q' AND $my_card['type'] == 'diamond') or ($my_card['card'] == 'K' AND $my_card['type'] == 'diamond'))
			{
				$card_avail_check = 1;
			}
		}
		else if(($card == 'A' AND $type == 'spade') or ($card == '2' AND $type == 'spade') or ($card == '3' AND $type == 'spade') or ($card == '4' AND $type == 'spade') or ($card == '5' AND $type == 'spade') or ($card == '6' AND $type == 'spade'))
		{
			if(($my_card['card'] == 'A' AND $my_card['type'] == 'spade') or ($my_card['card'] == '2' AND $my_card['type'] == 'spade') or ($my_card['card'] == '3' AND $my_card['type'] == 'spade') or ($my_card['card'] == '4' AND $my_card['type'] == 'spade') or ($my_card['card'] == '5' AND $my_card['type'] == 'spade') or ($my_card['card'] == '6' AND $my_card['type'] == 'spade'))
			{
				$card_avail_check = 1;
			}
		}
		else if(($card == '8' AND $type == 'spade') or ($card == '9' AND $type == 'spade') or ($card == '10' AND $type == 'spade') or ($card == 'J' AND $type == 'spade') or ($card == 'Q' AND $type == 'spade') or ($card == 'K' AND $type == 'spade'))
		{
			if(($my_card['card'] == '8' AND $my_card['type'] == 'spade') or ($my_card['card'] == '9' AND $my_card['type'] == 'spade') or ($my_card['card'] == '10' AND $my_card['type'] == 'spade') or ($my_card['card'] == 'J' AND $my_card['type'] == 'spade') or ($my_card['card'] == 'Q' AND $my_card['type'] == 'spade') or ($my_card['card'] == 'K' AND $my_card['type'] == 'spade'))
			{
				$card_avail_check = 1;
			}
		}
		
	}


	if($card_avail_check == 1)
	{	
		if($my_team_result['team'] == $opponent_team_result['team'])
		{
			header("Location:game_error.php");
		}


		else
		{	
			if( $card != 'null' AND $type != 'null' AND $player != 'null')
			{
				while($player_asked = mysqli_fetch_array($query_1))
				{
					if(($player_asked['card'] == $card) AND ($player_asked['type'] == $type) )
					{
						$card_insert_check = 1;
					}
				}
				if($card_insert_check == 1)
				{
					if($_SESSION['player_turn'] == $username)
					{
						mysqli_query($link,"insert into `player_card`(player_ID,player,card,type) values('".$group."','".$username."','".$card."','".$type."')") ;	
						mysqli_query($link, "DELETE FROM `player_card` WHERE player_ID = '".$group."' AND  player = '".$player."' AND card = '".$card."' AND type = '".$type."'");
						mysqli_query($link,"insert into `game_progress`(game_ID,card,type,player_asking,player_asked,status) values('".$group."','".$card."','".$type."','".$username."','".$player."','".$yes."')") ;
					}
					else
					{
						header('Location:game_turn_error.php');
					}
				}
				else
				{
					if($_SESSION['player_turn'] == $username)
					{
						mysqli_query($link,"insert into `game_progress`(game_ID,card,type,player_asking,player_asked,status) values('".$group."','".$card."','".$type."','".$username."','".$player."','".$no."')") ;
					}
					else
					{
						header('Location:game_turn_error.php');
					}
				}
			
				header('Location:game.php');
			}
	
			else
			{
				header('Location:game_error_1.php');
			}
	
		}
	}
	else
	{
	
		header('Location:game_error_suite.php');
	}

}
?>