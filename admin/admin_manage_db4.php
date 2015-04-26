<?php


/*
This is a PHP script that facilitates the fetching of a all the 
Staff from the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$sql1 =mysql_query("select count(*) from staff");

while ($row = mysql_fetch_array($sql1))
 {

   $count_staff=$row['count(*)'];
  }




$sql2 =mysql_query("select s_name, age, s_salary,job,doj from staff");

$i=0;
while($row = mysql_fetch_array($sql2))
{
     $search_staff_name[$i]=$row['s_name'];
     $search_staff_age[$i]=$row['age'];
     $search_staff_salary[$i]=$row['s_salary'];
	 $search_staff_job[$i]=$row['job'];
	 $search_staff_doj[$i]=$row['doj'];
	 
	 
	 
	 $i++;
}

$sql3 =mysql_query("select department_name from department");

$i=0;
while($row2 = mysql_fetch_array($sql3))
{
     $search_depts[$i]=$row2['department_name'];
$i++;
}

mysql_close($con);
?>