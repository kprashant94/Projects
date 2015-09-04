<?php
	
      $allowed_filetypes = array('.pdf'); 			
      $max_filesize = 524288; 													
      $upload_path = 'files/'; 													
 
   $filename = $_FILES['userfile']['name']; 									
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); 		
   if(!in_array($ext,$allowed_filetypes))
	{
		header("Location: user_profile_error.php");
	}
	
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
	{
      header("Location: user_profile_error.php");
	} 
    if(!is_writable($upload_path))
    {
		header("Location: user_profile_error.php");
	}  
    if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
	{
		header("Location: user_profile.php");
	}
	else
    {
		header("Location: user_profile_error.php");
	}
 
?>