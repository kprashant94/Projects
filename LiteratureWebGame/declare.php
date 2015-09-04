<?php
session_start();
$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

$card = $_POST['card'];
$type = $_POST['card_type'];
$username = $_SESSION['username'];
$group = $_SESSION['group_playing'];
$check = 1;

$query_1 = mysqli_query($link,"SELECT * FROM `group` WHERE group_ID = '".$group."' AND player = '".$username."' ");
$team = mysqli_fetch_array($query_1);

$my_team = $team['team'];

$query_2 = mysqli_query($link,"SELECT * FROM `group` WHERE group_ID = '".$group."' AND team = '".$my_team."' ");

while($team_member = mysqli_fetch_array($query_2))
{
	if($check == 1)
	{
		$team_member_1 = $team_member['player'];
	}
	if($check == 2)
	{
		$team_member_2 = $team_member['player'];
	}
	if($check == 3)
	{
		$team_member_3 = $team_member['player'];
	}
	
	$check = $check+1;
}
$check = 1;


if($_SESSION['player_turn'] == $username)
{
	if((!empty($card)) AND (!empty($type)))
	{
		if(($card == 'A' AND $type == 'heart') or ($card == '2' AND $type == 'heart') or ($card == '3' AND $type == 'heart') or ($card == '4' AND $type == 'heart') or ($card == '5' AND $type == 'heart') or ($card == '6' AND $type == 'heart'))
		{
			$type = 'heart';
			$card_1 = 'A';
			$card_2 = '2';
			$card_3 = '3';
			$card_4 = '4';
			$card_5 = '5';
			$card_6 = '6';
			
			
			
			$query_3 = mysqli_query($link,"SELECT * FROM `player_card` WHERE (player_ID = '".$group."') AND (player = '".$team_member_1."' OR player = '".$team_member_2."' OR player = '".$team_member_3."') AND 
			((card = 'A' AND type = 'heart') OR (card = '2' AND type = 'heart') OR (card = '3' AND type = 'heart') OR (card = '4' AND type = 'heart') OR (card = '5' AND type = 'heart') OR (card = '6' AND type = 'heart')) ");
		
			$count = 0;
			while($suite = mysqli_fetch_array($query_3))
			{
				$count = $count+1;
			}
			
			if($count == 6)
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1+1 WHERE score_ID = '".$group."' ");
					
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2+1 WHERE score_ID = '".$group."' ");
				}
				
			}
			else
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1-1 WHERE score_ID = '".$group."' ");
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2-1 WHERE score_ID = '".$group."' ");
				}
			}
			
			header('Location:game.php');
		
		}
		
		
		
		else if(($card == '8' AND $type == 'heart') or ($card == '9' AND $type == 'heart') or ($card == '10' AND $type == 'heart') or ($card == 'J' AND $type == 'heart') or ($card == 'Q' AND $type == 'heart') or ($card == 'K' AND $type == 'heart'))
		{
			$type = 'heart';
			$card_1 = '8';
			$card_2 = '9';
			$card_3 = '10';
			$card_4 = 'J';
			$card_5 = 'Q';
			$card_6 = 'K';
		
			$query_3 = mysqli_query($link,"SELECT * FROM `player_card` WHERE (player_ID = '".$group."') AND (player = '".$team_member_1."' OR player = '".$team_member_2."' OR player = '".$team_member_3."') AND 
			((card = '8' AND type = 'heart') OR (card = '9' AND type = 'heart') OR (card = '10' AND type = 'heart') OR (card = 'J' AND type = 'heart') OR (card = 'Q' AND type = 'heart') OR (card = 'K' AND type = 'heart')) ");
		
			$count = 0;
			while($suite = mysqli_fetch_array($query_3))
			{
				$count = $count+1;
			}
			
			if($count == 6)
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1+1 WHERE score_ID = '".$group."' ");
					
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2+1 WHERE score_ID = '".$group."' ");
				}
				
			}
			else
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1-1 WHERE score_ID = '".$group."' ");
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2-1 WHERE score_ID = '".$group."' ");
				}
			}
			
			header('Location:game.php');
		
		}
		
		
		
		
		else if(($card == 'A' AND $type == 'club') or ($card == '2' AND $type == 'club') or ($card == '3' AND $type == 'club') or ($card == '4' AND $type == 'club') or ($card == '5' AND $type == 'club') or ($card == '6' AND $type == 'club'))
		{
			$type = 'club';
			$card_1 = 'A';
			$card_2 = '2';
			$card_3 = '3';
			$card_4 = '4';
			$card_5 = '5';
			$card_6 = '6';
		
			$query_3 = mysqli_query($link,"SELECT * FROM `player_card` WHERE (player_ID = '".$group."') AND (player = '".$team_member_1."' OR player = '".$team_member_2."' OR player = '".$team_member_3."') AND 
			((card = 'A' AND type = 'club') OR (card = '2' AND type = 'club') OR (card = '3' AND type = 'club') OR (card = '4' AND type = 'club') OR (card = '5' AND type = 'club') OR (card = '6' AND type = 'club')) ");
		
			$count = 0;
			while($suite = mysqli_fetch_array($query_3))
			{
				$count = $count+1;
			}
			
			if($count == 6)
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1+1 WHERE score_ID = '".$group."' ");
					
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2+1 WHERE score_ID = '".$group."' ");
				}
				
			}
			else
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1-1 WHERE score_ID = '".$group."' ");
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2-1 WHERE score_ID = '".$group."' ");
				}
			}
			
			header('Location:game.php');
		
		}
		
		
		
		else if(($card == '8' AND $type == 'club') or ($card == '9' AND $type == 'club') or ($card == '10' AND $type == 'club') or ($card == 'J' AND $type == 'club') or ($card == 'Q' AND $type == 'club') or ($card == 'K' AND $type == 'club'))
		{
			$type = 'club';
			$card_1 = '8';
			$card_2 = '9';
			$card_3 = '10';
			$card_4 = 'J';
			$card_5 = 'Q';
			$card_6 = 'K';
		
			$query_3 = mysqli_query($link,"SELECT * FROM `player_card` WHERE (player_ID = '".$group."') AND (player = '".$team_member_1."' OR player = '".$team_member_2."' OR player = '".$team_member_3."') AND 
			((card = '8' AND type = 'club') OR (card = '9' AND type = 'club') OR (card = '10' AND type = 'club') OR (card = 'J' AND type = 'club') OR (card = 'Q' AND type = 'club') OR (card = 'K' AND type = 'club')) ");
		
			$count = 0;
			while($suite = mysqli_fetch_array($query_3))
			{
				$count = $count+1;
			}
			
			if($count == 6)
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1+1 WHERE score_ID = '".$group."' ");
					
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2+1 WHERE score_ID = '".$group."' ");
				}
				
			}
			else
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1-1 WHERE score_ID = '".$group."' ");
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2-1 WHERE score_ID = '".$group."' ");
				}
			}
			
			header('Location:game.php');
		
		}
		
		
		
		
		else if(($card == 'A' AND $type == 'diamond') or ($card == '2' AND $type == 'diamond') or ($card == '3' AND $type == 'diamond') or ($card == '4' AND $type == 'diamond') or ($card == '5' AND $type == 'diamond') or ($card == '6' AND $type == 'diamond'))
		{
			$type = 'diamond';
			$card_1 = 'A';
			$card_2 = '2';
			$card_3 = '3';
			$card_4 = '4';
			$card_5 = '5';
			$card_6 = '6';
		
			$query_3 = mysqli_query($link,"SELECT * FROM `player_card` WHERE (player_ID = '".$group."') AND (player = '".$team_member_1."' OR player = '".$team_member_2."' OR player = '".$team_member_3."') AND 
			((card = 'A' AND type = 'diamond') OR (card = '2' AND type = 'diamond') OR (card = '3' AND type = 'diamond') OR (card = '4' AND type = 'diamond') OR (card = '5' AND type = 'diamond') OR (card = '6' AND type = 'diamond')) ");
		
			$count = 0;
			while($suite = mysqli_fetch_array($query_3))
			{
				$count = $count+1;
			}
			
			if($count == 6)
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1+1 WHERE score_ID = '".$group."' ");
					
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2+1 WHERE score_ID = '".$group."' ");
				}
				
			}
			else
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1-1 WHERE score_ID = '".$group."' ");
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2-1 WHERE score_ID = '".$group."' ");
				}
			}
			
			header('Location:game.php');
		
		}
		
		
		
		else if(($card == '8' AND $type == 'diamond') or ($card == '9' AND $type == 'diamond') or ($card == '10' AND $type == 'diamond') or ($card == 'J' AND $type == 'diamond') or ($card == 'Q' AND $type == 'diamond') or ($card == 'K' AND $type == 'diamond'))
		{
			$type = 'diamond';
			$card_1 = '8';
			$card_2 = '9';
			$card_3 = '10';
			$card_4 = 'J';
			$card_5 = 'Q';
			$card_6 = 'K';
		
			$query_3 = mysqli_query($link,"SELECT * FROM `player_card` WHERE (player_ID = '".$group."') AND (player = '".$team_member_1."' OR player = '".$team_member_2."' OR player = '".$team_member_3."') AND 
			((card = '8' AND type = 'diamond') OR (card = '9' AND type = 'diamond') OR (card = '10' AND type = 'diamond') OR (card = 'J' AND type = 'diamond') OR (card = 'Q' AND type = 'diamond') OR (card = 'K' AND type = 'diamond')) ");
		
			$count = 0;
			while($suite = mysqli_fetch_array($query_3))
			{
				$count = $count+1;
			}
			
			if($count == 6)
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1+1 WHERE score_ID = '".$group."' ");
					
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2+1 WHERE score_ID = '".$group."' ");
				}
				
			}
			else
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1-1 WHERE score_ID = '".$group."' ");
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2-1 WHERE score_ID = '".$group."' ");
				}
			}
			
			header('Location:game.php');
		
		}
		
		
		
		else if(($card == 'A' AND $type == 'spade') or ($card == '2' AND $type == 'spade') or ($card == '3' AND $type == 'spade') or ($card == '4' AND $type == 'spade') or ($card == '5' AND $type == 'spade') or ($card == '6' AND $type == 'spade'))
		{
			$type = 'spade';
			$card_1 = 'A';
			$card_2 = '2';
			$card_3 = '3';
			$card_4 = '4';
			$card_5 = '5';
			$card_6 = '6';
		
			$query_3 = mysqli_query($link,"SELECT * FROM `player_card` WHERE (player_ID = '".$group."') AND (player = '".$team_member_1."' OR player = '".$team_member_2."' OR player = '".$team_member_3."') AND 
			((card = 'A' AND type = 'spade') OR (card = '2' AND type = 'spade') OR (card = '3' AND type = 'spade') OR (card = '4' AND type = 'spade') OR (card = '5' AND type = 'spade') OR (card = '6' AND type = 'spade')) ");
		
			$count = 0;
			while($suite = mysqli_fetch_array($query_3))
			{
				$count = $count+1;
			}
			
			if($count == 6)
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1+1 WHERE score_ID = '".$group."' ");
					
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2+1 WHERE score_ID = '".$group."' ");
				}
				
			}
			else
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1-1 WHERE score_ID = '".$group."' ");
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2-1 WHERE score_ID = '".$group."' ");
				}
			}
			
			header('Location:game.php');
		
		}
		
		
		
		else if(($card == '8' AND $type == 'spade') or ($card == '9' AND $type == 'spade') or ($card == '10' AND $type == 'spade') or ($card == 'J' AND $type == 'spade') or ($card == 'Q' AND $type == 'spade') or ($card == 'K' AND $type == 'spade'))
		{
			$type = 'spade';
			$card_1 = '8';
			$card_2 = '9';
			$card_3 = '10';
			$card_4 = 'J';
			$card_5 = 'Q';
			$card_6 = 'K';
		
			$query_3 = mysqli_query($link,"SELECT * FROM `player_card` WHERE (player_ID = '".$group."') AND (player = '".$team_member_1."' OR player = '".$team_member_2."' OR player = '".$team_member_3."') AND 
			((card = '8' AND type = 'spade') OR (card = '9' AND type = 'spade') OR (card = '10' AND type = 'spade') OR (card = 'J' AND type = 'spade') OR (card = 'Q' AND type = 'spade') OR (card = 'K' AND type = 'spade')) ");

			
			$count = 0;
			while($suite = mysqli_fetch_array($query_3))
			{
				$count = $count+1;
			}
			
			if($count == 6)
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1+1 WHERE score_ID = '".$group."' ");
					
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2+1 WHERE score_ID = '".$group."' ");
				}
				
			}
			else
			{
				if($my_team == 1)
				{
					mysqli_query($link,"UPDATE `score` SET team_1 = team_1-1 WHERE score_ID = '".$group."' ");
				}
				if($my_team == 2)
				{
					mysqli_query($link,"UPDATE `score` SET team_2 = team_2-1 WHERE score_ID = '".$group."' ");
				}
			}
			
			header('Location:game.php');
		}
		
		else
		{
			echo 'Invalid card';
		}
		
		mysqli_query($link,"insert into `suite_declared`(suite_ID,card,type) values('".$group."','".$card_1."','".$type."')") ;
		mysqli_query($link,"insert into `suite_declared`(suite_ID,card,type) values('".$group."','".$card_2."','".$type."')") ;
		mysqli_query($link,"insert into `suite_declared`(suite_ID,card,type) values('".$group."','".$card_3."','".$type."')") ;
		mysqli_query($link,"insert into `suite_declared`(suite_ID,card,type) values('".$group."','".$card_4."','".$type."')") ;
		mysqli_query($link,"insert into `suite_declared`(suite_ID,card,type) values('".$group."','".$card_5."','".$type."')") ;
		mysqli_query($link,"insert into `suite_declared`(suite_ID,card,type) values('".$group."','".$card_6."','".$type."')") ;

	
		mysqli_query($link, "DELETE FROM `player_card` WHERE (player_ID = '".$group."') AND (card = '".$card_1."' OR card = '".$card_2."' OR card = '".$card_3."' OR card = '".$card_4."' OR card = '".$card_5."' OR card = '".$card_6."') AND (type = '".$type."') ");
	}
	
	else
	{
		header('Location:game_declare_error.php');
	}

}
else
{
	header('Location:game_turn_error.php');
}










?>