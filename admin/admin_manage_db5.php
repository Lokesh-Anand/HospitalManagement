<?php


/*
This is a PHP script that facilitates the fetching of a all the 
Laboratories from the database
*/


$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$sql1 =mysql_query("select count(*) from laboratory");

while ($row = mysql_fetch_array($sql1))
 {

   $count_lab=$row['count(*)'];
  }


$sql2 =mysql_query("select lab_name, lab_in_charge, cost from laboratory");

$i=0;
while($row = mysql_fetch_array($sql2))
{
     $search_lab_name[$i]=$row['lab_name'];
	 $temp=$row['lab_in_charge'];
	 $sqlnew =mysql_query("select s_name from staff where s_id='$temp'");
	 while($rownew = mysql_fetch_array($sqlnew))
	{
		$search_lab_head[$i]=$rownew['s_name'];	
		
	}
		
     $search_lab_cost[$i]=$row['cost'];
	 $i++;
}

$sql3 =mysql_query("select department_name from department");

$i=0;
while($row2 = mysql_fetch_array($sql3))
{
     $search_depts[$i]=$row2['department_name'];
$i++;
}

$var=mysql_query("select s_name from staff where job='laboratorist'");
$i=0;
while($row3=mysql_fetch_array($var))
{
$incharge[$i]=$row3['s_name'];
$i++;
}



mysql_close($con);
?>