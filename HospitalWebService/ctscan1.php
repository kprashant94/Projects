<a href='logout.php' style='float:right;color:green;decoration:none;'>Logout</a><br>
<a href='ctscan.php' style='float:right;color:green;decoration:none;'>Home</a>

<?php
    $date = $_POST['date'];
       session_start();

    if(!isset($_SESSION['docid']))
        {
            header('location: index.php');
            // user is login, direct to the job page
        }

 echo "welcome $_SESSION[docid] <br>";
$username = "root";
$password = "root";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("cs315_project",$dbhandle)
  or die("Could not select examples");

$docid = $_SESSION['docid'];

echo "<br>....................My Appointments.................<br>";
$query = "SELECT * FROM appointment where app_date = '$date' 
                        and app_type = 8";
$result = mysql_query("$query");
//echo "$query";
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
   echo "Patient Id: ".$row{'patid'}." ----- Slot: ".$row{'slotno'}." ----- Appointment No.: ".$row{'appointment_no'}."<br>";
}

?>



