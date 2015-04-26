<?php

/*
This is a PHP script that functions as Ajax response in resolving conflicts
that may arise during addition of new room types
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$room_type=$_GET['room_type'];

$query=mysql_query("select count(*) from rooms where room_type='$room_type'");
while ($row0 = mysql_fetch_array($query))
	  {
      $result0=$row0['count(*)'];
      }
	  

if($result0)
{
    echo "1";
}
else
{
	echo "0";
}
	
?>
