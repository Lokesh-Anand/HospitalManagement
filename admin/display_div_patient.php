<?php


/*
This is a PHP script that facilitates the fetching of history from the Patient
table from database and help in displaying it at the Modal
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$patient_name=$_GET['patient_name'];
$one=mysql_query("select history from patient where p_name='$patient_name'");
while($row=mysql_fetch_array($one))
{
	$patient_history=$row['history'];
}

echo $patient_history;
?>