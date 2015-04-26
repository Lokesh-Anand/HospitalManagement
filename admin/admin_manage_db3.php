<?php


/*
This is a PHP script that facilitates the fetching of a all the 
Nurse from the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$sql1 =mysql_query("select count(*) from nurse");

while ($row = mysql_fetch_array($sql1))
 {

   $count_nurse=$row['count(*)'];
  }




$sql2 =mysql_query("select n_name, n_age, n_qualification,doj,salary from nurse");

$i=0;
while($row = mysql_fetch_array($sql2))
{
     $search_nurse_name[$i]=$row['n_name'];
     $search_nurse_age[$i]=$row['n_age'];
     $search_nurse_qualification[$i]=$row['n_qualification'];
	 $search_nurse_doj[$i]=$row['doj'];
	 $search_nurse_salary[$i]=$row['salary'];
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