<?php

/*
This is a PHP script that facilitates the fetching of members belonging 
to a Department from database and help in displaying it at the Modal
*/


$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$dept_name=$_GET['dept_name'];
$one=mysql_query("select department_id from department where department_name='$dept_name'");
while($row=mysql_fetch_array($one))
{
	$dep_id=$row['department_id'];
}
$result_string="Department ".$dept_name;
$result_string.="~";
$two_inter=mysql_query("select count(*) from doctor where department_id='$dep_id'");

while($row=mysql_fetch_array($two_inter))
{
	$doc_count=$row['count(*)'];
}
if($doc_count>0)
{
$result_string.="DOCTORS";
$result_string.="~";
while($row=mysql_fetch_array($one))
{
	$dep_id=$row['department_id'];
}
$two=mysql_query("select name from doctor where department_id='$dep_id'");
$i=0;

while($row=mysql_fetch_array($two))
{
	$doc_name[$i]=$row['name'];
	$result_string.=$doc_name[$i];
	$result_string.="~";
	$i++;
	

}
}

$three_inter=mysql_query("select count(*) from laboratory where dept_id='$dep_id'");

while($row=mysql_fetch_array($three_inter))
{
	$lab_count=$row['count(*)'];
}
if($lab_count>0)
{
$result_string.="LABORATORY~";
$three=mysql_query("select lab_name from laboratory where dept_id='$dep_id'");
$i=0;
while($row=mysql_fetch_array($three))
{
	$lab_name[$i]=$row['lab_name'];
	$result_string.=$lab_name[$i];
	$result_string.="~";
	$i++;
	
	
}
}

$four_inter=mysql_query("select count(*) from nurse where dept_id='$dep_id'");

while($row=mysql_fetch_array($four_inter))
{
	$nurse_count=$row['count(*)'];
}
if($nurse_count>0)
{
$result_string.="NURSE~";
$four=mysql_query("select n_name from nurse where dept_id='$dep_id'");
$i=0;
while($row=mysql_fetch_array($four))
{
	$nurse_name[$i]=$row['n_name'];
	$result_string.=$nurse_name[$i];
	$result_string.="~";
	$i++;
	
	
}
}


$five_inter=mysql_query("select count(*) from staff where dept_id='$dep_id'");

while($row=mysql_fetch_array($five_inter))
{
	$staff_count=$row['count(*)'];
}
if($staff_count>0)
{
$result_string.="STAFF~";
$five=mysql_query("select s_name from staff where dept_id='$dep_id'");
$i=0;
while($row=mysql_fetch_array($five))
{
	$staff_name[$i]=$row['s_name'];
	$result_string.=$staff_name[$i];
	$result_string.="~";
	$i++;
	
	
}
}

echo $result_string;
?>