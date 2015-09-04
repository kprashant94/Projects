<?php 
$link = mysql_connect('localhost','root','');
$db=mysql_select_db(registration_data,$link) or die("Failed to connect to MySQL: " . mysql_error());

if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
echo 'Connection OK'; mysql_close($link); 
?> 