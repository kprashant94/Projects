<!DOCTYPE HTML>
<html>
<head>
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<?php
session_start();
?>
<?php
if(isset($_SESSION['userID'])) 
{
?>
<h2>Welcome <?php echo $_SESSION['fullname']; ?>. Click here to <a href="logout.php" tite="Logout">Logout.</a></h2>
<?php
}

else
{
	header("Location:login_check.html");
}

?>  


<form id = 'upload_form'  method="POST" action="upload.php">
<h3>Upload Book here:</h3>
<td>Book Name</td><td> <input type="text" name="bname"></td>
<td>Author</td><td> <input type="text" name="bookauthor"></td>
<td><input id="button" type="submit" name="submit" value="Upload Book"></td>

</form>

<br />

<form id = 'search_form'  method="POST" action="user_profile.php">
<h3>Search Book here :</h3>
<td> Book Name</td><td> <input type="text" name="search_bookname"></td>
<td>Author</td><td> <input type="text" name="search_author"></td>
<td><input id="button" type="submit" name="search_submit" value="Search"></td>


</form>
<br />


<h3>Upload files here(only pdf allowed):</h3>
   <form  " action="upload_file.php" method="post" enctype="multipart/form-data">
	<p>
		<label for="file">Select a file:</label> <input type="file" name="userfile" id="file"> <br />
		<button>Upload File</button>
	</p>

</form>

<br />


<h3>Files</h3>
<?php include 'list.php';?>
<h3>Books</h3>
<?php include 'showfiles.php';?>
<h4 id = 'search_o'>
<?php include 'search.php';?>
</h4>
</body>
</html>












