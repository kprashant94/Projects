<?php

$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link , 'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

$query = mysqli_query($link , "SELECT * FROM books ");
echo "<table>";
echo "<tr><td>Book</td><td>Author </td> <td> Uploaded By </td></tr>";
while($row = mysqli_fetch_array($query))
{
	
	$bookname =  $row['bookname'];
	$author = $row['author'];
	$name = $row['fullname'];
	
	echo "<tr><td>".$bookname."</td><td> ".$author." </td><td> ".$name." </td></tr>";
	
}






?>