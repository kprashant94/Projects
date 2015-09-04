<?php
$link = mysqli_connect('localhost','root','');
$db=mysqli_select_db($link,'registration_data') or die("Failed to connect to MySQL: " . mysqli_error());

	if(isset($_POST['search_bookname']))
	{
		$bookname =$_POST['search_bookname'];

	}
	if(isset($_POST['search_author']))
	{
		$author = $_POST['search_author'];
	}
	if(isset($_POST['search_submit']))
	{
		$value =$_POST['search_submit'];

	}

	
if(!empty($value))
{

 if( (!empty($bookname)) AND (empty($author)) )
 {

	
		$query = mysqli_query($link , "SELECT * FROM books where bookname LIKE '%".$bookname."%' ");
		echo "<table>";
		echo "<tr><td>Book</td><td>Author </td> <td> Uploaded By </td></tr>";
		
		while($row = mysqli_fetch_array($query))
		{
	
			$bookname =  $row['bookname'];
			$author = $row['author'];
			$name = $row['fullname'];
	
			echo "<tr><td>".$bookname."</td><td> ".$author." </td><td> ".$name." </td></tr>";
			
		}
  }

	else if( (empty($bookname)) AND (!empty($author)) )
 {

	
		$query = mysqli_query($link , "SELECT * FROM books where author LIKE '%".$author."%' ");
		echo "<table>";
		echo "<tr><td>Book</td><td>Author </td> <td> Uploaded By </td></tr>";
		while($row = mysqli_fetch_array($query))
		{
	
			$bookname =  $row['bookname'];
			$author = $row['author'];
			$name = $row['fullname'];
	
			echo "<tr><td>".$bookname."</td><td> ".$author." </td><td> ".$name." </td></tr>";
			
		}
  }

	else if( (!empty($bookname)) AND (!empty($author)) )
 {

	
		$query = mysqli_query($link , "SELECT * FROM books where bookname LIKE '%".$bookname."%' AND author LIKE '%".$author."%' ");
		echo "<table>";
		echo "<tr><td>Book</td><td>Author </td> <td> Uploaded By </td></tr>";
		while($row = mysqli_fetch_array($query))
		{
	
			$bookname =  $row['bookname'];
			$author = $row['author'];
			$name = $row['fullname'];
	
			echo "<tr><td>".$bookname."</td><td> ".$author." </td><td> ".$name." </td></tr>";
			
		}
		
		
  }

}
else
{
exit;
}	
   
?>