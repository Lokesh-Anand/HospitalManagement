<?php

/*
This is a PHP script that facilitates the fetching of room cost
for the given room type which later will be used to modify the same
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$room_type=$_GET['room_type'];

$query=mysql_query("select room_cost from rooms where room_type='$room_type'");
while ($row0 = mysql_fetch_array($query))
	  {
      $result1=$row0['room_cost'];
	  }
	  

    echo "$result1";
	
?>
