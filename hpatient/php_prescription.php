<?php
//session_start();
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$currentpid=$_SESSION['user']['id'];
//$currentpid=5001;			//500567;				//5001;
$sql1 =mysql_query("select count(*) from consultation a,doctor b where a.doctor_id=b.doctor_id and a.patient_id='$currentpid';");
while ($row = mysql_fetch_array($sql1))
 {

   $count_appointment2=$row['count(*)'];
  }
$sql2 =mysql_query("select a.remarks, a.prescription_id,b.name from consultation a,doctor b where a.doctor_id=b.doctor_id and a.patient_id='$currentpid';");
$i=0;
$remarks[0]="null";
$prescription_id[0]="null";			//awesome to handle case when row is zero therby flow do ot enter while loop 
$doctor_name[$i]="null";
if($sql2 === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row = mysql_fetch_array($sql2))
{
	$remarks[$i]=$row['remarks'];
	$prescription_id[$i]=$row['prescription_id'];
    $doctor_name[$i]=$row['name'];
	$i++;
	 //echo ($row['pharma_cost'].$row['lab_cost']);
}
//echo $count_appointment;
mysql_close($con);
?>