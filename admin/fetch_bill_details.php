<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$patient_id=$_GET['patient_id'];
$sql1 =mysql_query("select * from billing where patient_id='$patient_id'");
$billing_details="";
$total=0;
while ($row = mysql_fetch_array($sql1))
 {
   
   $billing_details.=$row['pharma_cost'];
   $total+=$row['pharma_cost'];
   $billing_details.=",";
   $billing_details.=$row['lab_cost'];
   $total+=$row['lab_cost'];
   $billing_details.=",";
   $billing_details.=$row['consultation_fee'];
   $total+=$row['consultation_fee'];
   $billing_details.=",";
   $billing_details.=$row['operation_cost'];
   $total+=$row['operation_cost'];
   $billing_details.=",";
   $billing_details.=$row['canteen'];
   $total+=$row['canteen'];
   $billing_details.=",";
   $billing_details.=$row['room_charge'];
   $total+=$row['room_charge'];
   $billing_details.=",";
   $billing_details.=$row['tax'];
   $total+=$row['tax'];
   $billing_details.=",";
   $billing_details.=$total;
   $billing_details.=",";
   $billing_details.=$row['billing_id'];
 }
 
  echo $billing_details;
?>