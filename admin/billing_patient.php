<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$sql0 =mysql_query("select count(*) from billing where bill_status='pending'");
while ($row = mysql_fetch_array($sql0))
 {
   $count_bill_patients=$row['count(*)'];
 }
 
echo $count_bill_patients;


$sql1 =mysql_query("select patient_id from billing where bill_status='pending'");
$patient_ids="";
while ($row = mysql_fetch_array($sql1))
 {
   //$count_bill_patients=$row['count(*)'];
   $patient_ids.=$row['patient_id'];
   $patient_ids.=",";
 }
  echo $patient_ids;
?>