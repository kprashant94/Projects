<?php


$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());


	$group = $_SESSION['group_playing'];

$query_1 = mysqli_query($link,"SELECT *FROM `group` WHERE group_ID = '".$group."'  ");

$check = 1;



while($players = mysqli_fetch_array($query_1))
{
	if($check == 1)
	{
		$_SESSION['player_1'] = $players['player'];
		$_SESSION['team_player_1'] = $players['team'];
		echo $players['player'],'&nbsp;&nbsp;&nbsp;&nbsp;Team:&nbsp;&nbsp;',$players['team'];
		echo '<br />';
	}
	if($check == 2)
	{
		$_SESSION['player_2'] = $players['player'];
		$_SESSION['team_player_2'] = $players['team'];
		echo $players['player'],'&nbsp;&nbsp;&nbsp;&nbsp;Team:&nbsp;&nbsp;',$players['team'];
		echo '<br />';
	}
	if($check == 3)
	{
		$_SESSION['player_3'] = $players['player'];
		$_SESSION['team_player_3'] = $players['team'];
		echo $players['player'],'&nbsp;&nbsp;&nbsp;&nbsp;Team:&nbsp;&nbsp;',$players['team'];
		echo '<br />';
	}
	if($check == 4)
	{
		$_SESSION['player_4'] = $players['player'];
		$_SESSION['team_player_4'] = $players['team'];
		echo $players['player'],'&nbsp;&nbsp;&nbsp;&nbsp;Team:&nbsp;&nbsp;',$players['team'];
		echo '<br />';
	}
	if($check == 5)
	{
		$_SESSION['player_5'] = $players['player'];
		$_SESSION['team_player_5'] = $players['team'];
		echo $players['player'],'&nbsp;&nbsp;&nbsp;&nbsp;Team:&nbsp;&nbsp;',$players['team'];
		echo '<br />';
	}
	if($check == 6)
	{
		$_SESSION['player_6'] = $players['player'];
		$_SESSION['team_player_6'] = $players['team'];
		echo $players['player'],'&nbsp;&nbsp;&nbsp;&nbsp;Team:&nbsp;&nbsp;',$players['team'];
		echo '<br />';
	}
$check =$check+1;
}
$check = 1;

?>