<?php


/*
This is a PHP script that facilitates the fetching of a all the 
Doctors from the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$sql1 =mysql_query("select count(*) from doctor");

while ($row = mysql_fetch_array($sql1))
 {

   $count_docs=$row['count(*)'];
  }




$sql2 =mysql_query("select name, age, V_type,department_id,address from doctor");

$i=0;
while($row = mysql_fetch_array($sql2))
{
     $search_doc_name[$i]=$row['name'];
     $search_doc_age[$i]=$row['age'];
     $search_v_type[$i]=$row['V_type'];
	 $search_dept_id=$row['department_id'];
	 
	 $sql3 = mysql_query("select department_name from department where department_id='$search_dept_id'");
	 while($row1 = mysql_fetch_array($sql3))
	{
	$search_dept_name1[$i]=$row1['department_name'];
	}
	 
     
     $search_doc_address[$i]=$row['address'].'$~';
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