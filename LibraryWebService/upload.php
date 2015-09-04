<?php
$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());
session_start();
$bookname =$_POST['bname'];
$author = $_POST['bookauthor'];
$fullname = $_SESSION['fullname'];

$query = mysqli_query($link,"SELECT * FROM books where bookname = '".$bookname."' AND author = '".$author."' ");
$row = mysqli_fetch_array($query);

 if( (!empty($bookname)) AND (!empty($author)) )
 {

	if(($row['bookname'] == $bookname) AND ($row['author'] == $author))
	{
		echo "book aready Exists.." ;
		header("Location: user_profile_check.php");
		
	}
	
	else
	{
		mysqli_query($link,"insert into books(bookname,author,fullname) values('".$bookname."','".$author."','".$fullname."')") ;
		header("Location: user_profile.php");
		
	
	}
 }
   

   
 
 else
{
header("Location: user_profile.php");
} 



?>