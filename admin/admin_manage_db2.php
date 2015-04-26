<?php


/*
This is a PHP script that facilitates the fetching of a all the 
Patients from the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$sql1 =mysql_query("select count(*) from patient");

while ($row = mysql_fetch_array($sql1))
 {

   $count_patient=$row['count(*)'];
  }




$sql2 =mysql_query("select p_name, age, phno, type,room_no from patient");

$i=0;
while($row = mysql_fetch_array($sql2))
{
     $search_patient_name[$i]=$row['p_name'];
     $search_patient_age[$i]=$row['age'];
     $search_patient_phno[$i]=$row['phno'];
	 $search_patient_type[$i]=$row['type'];
	 $search_patient_roomno[$i]=$row['room_no'];
	 $i++;
}

$sql3 =mysql_query("select distinct room_type from rooms ");

$i=0;
while($row2 = mysql_fetch_array($sql3))
{
     $search_rooms[$i]=$row2['room_type'];
$i++;
}

mysql_close($con);
?>