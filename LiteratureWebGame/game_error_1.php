<!DOCTYPE HTML>
<html>
<head>
<title>Game</title>

</head>
<body>
<?php
session_start();
?>
<?php
if(isset($_SESSION['userID'])) 
{
?>
<h2>Welcome <?php echo $_SESSION['fullname']; ?>. Click here to <a href="logout.php" title="Logout">Logout.</a></h2>
<?php
}

else
{ 
	header("Location:login_check.html");
}
?>
<h3 align = "right"><a href = "new_game.php">Start New Game</a></h3>
 <h3>Players:</h3>
 <?php include 'players.php'; ?>
 <?php include 'score.php' ; ?>
 <h2>Score </h2>
 <h3>Team 1 : <?php echo $_SESSION['team_1'] ?></h3>
 <h3>Team 2 : <?php echo $_SESSION['team_2'] ?></h3>
 
<h3>you didn't asked properly.May be you didn't entered details properly.Ask again..</h3> 

<?php include 'turn_update.php' ?>

 <?php
if($_SESSION['username'] == $_SESSION['player_turn'])
{
?>
	
	<?php include 'ask.php'; ?>
	<?php include 'declare.html' ?>
	
 
 <?php
 }
 else 
 {
	echo 'Turn: &nbsp;', $_SESSION['player_turn'];
	
 }
 ?>
 <br>
 <h3><a href = "suite_declared.php">See decalred suites here</a></h3>
 <br><br>
 <h3>Your Cards</h3>
 
 <?php include 'display.php'; ?>
 <br>
 <h3> Asked cards : </h3> 
 <?php include 'asked_card.php' ?>

 










</body>
</html>












