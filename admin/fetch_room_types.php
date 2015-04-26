<?php

/*
This is a PHP script that facilitates the fetching of all the
types of rooms that are present in the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);


$sql3 =mysql_query("select distinct room_type from rooms ");

$i=0;
while($row2 = mysql_fetch_array($sql3))
{
     $search_manage_rooms[$i]=$row2['room_type'];
$i++;
}

mysql_close($con);
?>