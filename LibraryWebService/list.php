<?php

if ($handle = opendir('files/')) {

    while (false !== ($entry = readdir($handle))) 
	{

        if ($entry != "." && $entry != "..") 
		{
            echo "$entry\n";
			
			echo "<br>";
        }
    }

    closedir($handle);
}
?>