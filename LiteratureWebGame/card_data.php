<?php
session_start();
$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

	if(isset($_POST['group']))
	{
		$group =$_POST['group'];

	}

	
	$username = $_SESSION['username'];
	$_SESSION['group_playing'] = $group;
	
	$score = mysqli_query($link,"SELECT *FROM `score` WHERE score_ID = '".$group."'  ");
	$score_set = mysqli_fetch_array($score);
	
	if(empty($score_set))
	{
		mysqli_query($link,"insert into `score`(score_ID,team_1,team_2) values('".$group."',0,0)") ;
	}
	
	$no_of_players = mysqli_query($link,"SELECT COUNT(g_ID) AS total_players FROM `group` WHERE group_ID = '".$group."' ");
	$no_of_players_results = mysqli_fetch_array($no_of_players);
	
if($no_of_players_results['total_players'] ==6)
{	
	
	
	$query = mysqli_query($link,"SELECT *FROM `group` WHERE player = '".$username."' AND group_ID = '".$group."'");
	$row = mysqli_fetch_array($query);
	$group_ID = $row['group_ID'];
	
	include 'players.php';



	$query_1 = mysqli_query($link,"SELECT COUNT(p_ID) AS total_cards FROM `player_card` WHERE player_ID = '".$group."' ");
	$cards_dist_check = mysqli_fetch_array($query_1);

	if($group != $group_ID)
	{
		header("Location: card_input_error.php");
	}
	else
	{
		if($cards_dist_check['total_cards'] != 0)
		{
			header('Location:game.php');
		}
		else
		{

			

	
			$query_2 = mysqli_query($link,"SELECT * FROM `deck` ORDER BY RAND()");
			$count = 1;
	
			while($card_distribute = mysqli_fetch_array($query_2))
			{
				if($count <= 8)
				{
					mysqli_query($link,"insert into `player_card`(player_ID,player,card,type) values('".$group."','".$_SESSION['player_1']."','".$card_distribute['card']."','".$card_distribute['type']."')") ;	

				}
				else if($count >= 9 AND $count <= 16)
				{
					mysqli_query($link,"insert into `player_card`(player_ID,player,card,type) values('".$group."','".$_SESSION['player_2']."','".$card_distribute['card']."','".$card_distribute['type']."')") ;	

				}
				else if($count >= 17 AND $count <= 24)
				{
					mysqli_query($link,"insert into `player_card`(player_ID,player,card,type) values('".$group."','".$_SESSION['player_3']."','".$card_distribute['card']."','".$card_distribute['type']."')") ;	

				}
				else if($count >= 25 AND $count <= 32)
				{
					mysqli_query($link,"insert into `player_card`(player_ID,player,card,type) values('".$group."','".$_SESSION['player_4']."','".$card_distribute['card']."','".$card_distribute['type']."')") ;	

				}
				else if($count >= 33 AND $count <= 40)
				{
					mysqli_query($link,"insert into `player_card`(player_ID,player,card,type) values('".$group."','".$_SESSION['player_5']."','".$card_distribute['card']."','".$card_distribute['type']."')") ;	

				}
				else if($count >= 41 AND $count <= 48)
				{
					mysqli_query($link,"insert into `player_card`(player_ID,player,card,type) values('".$group."','".$_SESSION['player_6']."','".$card_distribute['card']."','".$card_distribute['type']."')") ;	

				}
				$count = $count + 1;
			}
			$count = 1;
			header('Location:game.php');
		}
	}



}

else
{
	header('Location:less_player_error.html');
}





?>