<?php


/*
This is a PHP script that facilitates the fetching of a all the 
Departments from the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$sql1 =mysql_query("select count(*) from department");

while ($row = mysql_fetch_array($sql1))
 {

   $count_depts=$row['count(*)'];
  }




$sql2 =mysql_query("select department_name, HOD, number from department");

$i=0;
while($row = mysql_fetch_array($sql2))
{
     $search_dept_name[$i]=$row['department_name'];
     $search_dept_hod[$i]=$row['HOD'];
     $search_number[$i]=$row['number'];
	 $i++;
}
mysql_close($con);
?>