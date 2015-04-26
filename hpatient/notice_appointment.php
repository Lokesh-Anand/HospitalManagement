<?php
//session_start();
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$currentpid=$_SESSION['user']['id'];
//$currentpid=5001;     //working for both 5001 and 5006
$sql1 =mysql_query("select count(*) from doctor a,consultation b where b.doctor_id=a.doctor_id and b.patient_id='$currentpid';");
while ($row = mysql_fetch_array($sql1))
 {

   $count_appointment3=$row['count(*)'];
  }
$sql2 =mysql_query("select a.name,b.con_time ,b.appointment_date from doctor a,consultation b where b.doctor_id=a.doctor_id and b.patient_id='$currentpid';");
$i=0;
$docname[0]="null";
$time[0]="null";
if($sql2 === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row = mysql_fetch_array($sql2))
{
	$docname[$i]=$row['name'];
	$time[$i]=$row['con_time'];
	$date[$i]=$row['appointment_date'];
	$i++;
}
//echo $count_appointment2;
//echo $docname[0];
mysql_close($con);
?>