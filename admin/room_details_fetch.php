<?php

/*
This is a PHP script that functions as the response to a Ajax
request will send all the details of the room from the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$room_type=$_GET['room_type'];
if(strcmp($room_type,"NA")==0)
{
	echo "-----";
	echo ",";
	echo "-----";
}
else
{
$query=mysql_query("select count(*),room_cost,room_no from rooms where room_type='$room_type' and total_occupied<room_capacity");
while ($row0 = mysql_fetch_array($query))
	  {
      $result0=$row0['count(*)'];
      $result1=$row0['room_cost'];
      $result2=$row0['room_no'];
	  }
	  

if($result0)
{
    echo "$result1";
	echo ",";
	echo "$result2";
}
else
{
	echo "Meanwhile Check Other Rooms";
	echo ",";
	echo "We are full...Please Try later!!";
	echo ",";
	echo "false";
}
}	
?>
