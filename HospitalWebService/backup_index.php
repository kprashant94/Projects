<html>
<head>
<?php
$con=mysqli_connect("localhost","root","root","cs315_project");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

# AMBULANCE
$result = mysqli_query($con,"select * from ambulance where availability=1 limit 1");
$row = mysqli_fetch_array($result);
if (mysqli_error($result)){ printf('Some error occured while executing php query');}
$k = mysqli_query($con,"update ambulance set availability=0 where ambulance_id={$row['ambulance_id']}");
if (mysqli_error($k)){ printf('Some error occured while executing php query');}

#Medicine Purchase
$quantity = 1;
$medicine_id = 2;
$result = mysqli_query($con,"select cost from pharmacy where medicine_id={$medicine_id} and stock >={$quantity}");
$row = mysql_fetch_array($result);
$result = mysqli_query($con,"update pharmacy set stock=stock-{$quantity} where medicine_id={$medicine_id}");
#if stock available is less
$result = mysqli_query($con,"select stock from pharmacy where medicine_id={$medicine_id}");

#ROOM Booking
$result = mysqli_query($con,"select * from room_cost");
$room_type = 1;
$start_date = 2014-05-05;
$end_date = 2014-05-07;
$result = mysqli_query($con,"select * from room_cost where room_type = {$room_type}");
$result = mysqli_query($con,"select * from room,reservation where room.room_no = reservation.room_no and room.room_type={$room_type} and ({$end_date} < reservation.start_date or{$start_date} > reservation.end_date)");
if(mysqli_error($result)){ printf('Some error occured while executing php query');}
$row = mysql_fetch_array($result);
printf('test %d',$row->lengths);


mysqli_close($con);
?> 
</head>
<body>
<a href="sign-in.html">SIGN IN</a>
<h1>It works!</h1>
<p>This is the default web page for this server.</p>
<p>The web server software is running but no content has been added, yet.</p>
</body></html>

