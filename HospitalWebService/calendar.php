<?php $myCalendar = new tc_calendar("date1", true); 
$myCalendar->setIcon("calendar/images/iconCalendar.gif"); 
$myCalendar->setDate(01, 03, 1960); 
$myCalendar->setPath("calendar/"); 
$myCalendar->setYearInterval(1960, 2015); 
$myCalendar->dateAllow('1960-01-01', '2015-03-01'); 
$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-13", "2011-04-25"), 0, 'month'); 
$myCalendar->setOnChange("myChanged('test')"); $myCalendar->writeScript(); 
?> 
<html>
<head>
<script language="javascript"> <
!-- function myChanged(v){ alert("Hello, value has been changed : "+document.getElementById("date1").value+"["+v+"]"); } //--> 
</script>
</head>
</html>