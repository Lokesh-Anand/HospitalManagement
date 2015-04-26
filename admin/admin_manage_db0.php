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


echo $count_depts;

$sql2 =mysql_query("select department_name, HOD, number from department");

$i=0;
while($row = mysql_fetch_array($sql2))
{
     $search_dept_name[$i]=$row['department_name'];
     $search_dept_hod[$i]=$row['HOD'];
     $search_number[$i]=$row['number'];
	 $i++;
}



$sql3 =mysql_query("select count(*) from doctor");

while ($row = mysql_fetch_array($sql3))
 {

   $count_docs=$row['count(*)'];
  }


echo $count_docs;

$sql4 =mysql_query("select name, age, V_type,department_id,qualification from doctor");

$i=0;
while($row = mysql_fetch_array($sql4))
{
     $search_doc_name[$i]=$row['name'];
     $search_doc_age[$i]=$row['age'];
     $search_v_type[$i]=$row['V_type'];
	 $search_dept_id=$row['department_id'];
	 
	 $sql5 = mysql_query("select department_name from department where department_id='$search_dept_id'");
	 while($row1 = mysql_fetch_array($sql5))
	{
	$search_dept_name1[$i]=$row1['department_name'];
	}
	 
     
     $search_doc_qualification[$i]=$row['qualification'];
	 $i++;
}



$sql6 =mysql_query("select count(*) from patient");

while ($row = mysql_fetch_array($sql6))
 {

   $count_patient=$row['count(*)'];
  }

echo $count_patient;


$sql7 =mysql_query("select p_name, age, phno, type,room_no from patient");

$i=0;
while($row = mysql_fetch_array($sql7))
{
     $search_patient_name[$i]=$row['p_name'];
     $search_patient_age[$i]=$row['age'];
     $search_patient_phno[$i]=$row['phno'];
	 $search_patient_type[$i]=$row['type'];
	 $search_patient_roomno[$i]=$row['room_no'];
	 $i++;
}




$sql8 =mysql_query("select count(*) from nurse");

while ($row = mysql_fetch_array($sql8))
 {

   $count_nurse=$row['count(*)'];
  }

echo $count_nurse;


$sql9 =mysql_query("select n_name, n_age, n_qualification,doj,salary from nurse");

$i=0;
while($row = mysql_fetch_array($sql9))
{
     $search_nurse_name[$i]=$row['n_name'];
     $search_nurse_age[$i]=$row['n_age'];
     $search_nurse_qualification[$i]=$row['n_qualification'];
	 $search_nurse_doj[$i]=$row['doj'];
	 $search_nurse_salary[$i]=$row['salary'];
	 $i++;
}


$sql10 =mysql_query("select count(*) from staff");

while ($row = mysql_fetch_array($sql10))
 {

   $count_staff=$row['count(*)'];
  }


echo $count_staff;

$sql11 =mysql_query("select s_name, age, s_salary,job,doj from staff");

$i=0;
while($row = mysql_fetch_array($sql11))
{
     $search_staff_name[$i]=$row['s_name'];
     $search_staff_age[$i]=$row['age'];
     $search_staff_salary[$i]=$row['s_salary'];
	 $search_staff_job[$i]=$row['job'];
	 $search_staff_doj[$i]=$row['doj'];
	 
	 
	 
	 $i++;
}


mysql_close($con);
?>