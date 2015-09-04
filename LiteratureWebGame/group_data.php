<?php
session_start();
$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

if(isset($_POST['group']))
	{
		$group =$_POST['group'];

	}
if(isset($_POST['team']))
	{
		$team =$_POST['team'];

	}
	
	$username = $_SESSION['username'];
	
	$query_1 = mysqli_query($link,"SELECT COUNT(g_ID) AS total_group_member FROM `group` WHERE group_ID = '".$group."' ");
	$number_of_group_member = mysqli_fetch_array($query_1);
	$query_2 = mysqli_query($link,"SELECT COUNT(g_ID) AS total_team_member FROM `group` WHERE team='".$team."' AND group_ID = '".$group."' ");
	$number_of_team_member = mysqli_fetch_array($query_2);
	$query_3 = mysqli_query($link,"SELECT player FROM `group` WHERE group_ID = '".$group."' AND player = '".$username."' ");
	$player = mysqli_fetch_array($query_3);
	
if((!empty($group)) AND $team != "null")
{
	if($number_of_group_member['total_group_member'] < 6 AND (empty($player)))
	{
		if($number_of_team_member['total_team_member'] < 3)
		{
			mysqli_query($link,"insert into `group`(group_ID,player,team) values('".$group."','".$username."','".$team."')") ;
			header("Location: card_input.php");
		}
		else
		{
			echo "You are choosing wrong team!";
			header("Location: group_input_error.php");
		}
	}
	else
	{
		echo "This group has no vacancy!";
		header("Location: group_input_error.php");
	}
}
else
{
	
	echo "please fill all the details";
	header("Location: group_input_error.php");
}	


?>