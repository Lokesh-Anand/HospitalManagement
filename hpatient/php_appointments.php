<?php
//session_start();
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$currentpid=$_SESSION['user']['id'];
//$currentpid=5001;			//5038373;				5001;	
$sql1 =mysql_query("select count(*) from doctor a,consultation b where b.doctor_id=a.doctor_id and b.patient_id='$currentpid';");
while ($row = mysql_fetch_array($sql1))
 {

   $count_appointment4=$row['count(*)'];
  }
$sql2 =mysql_query("select b.prescription_id,b.appointment_date,b.con_time,a.name from doctor a,consultation b where b.doctor_id=a.doctor_id and b.patient_id='$currentpid';");
$i=0;
$presid[0]="null";			//awesome to handle case when row is zero therby flow do ot enter while loop 
$adate[0]="null";
$atime[0]="null";
$docname[0]="null";
if($sql2 === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row = mysql_fetch_array($sql2))
{
	$presid[$i]=$row['prescription_id'];
	$adate[$i]=$row['appointment_date'];
	$atime[$i]=$row['con_time'];
	$docname[$i]=$row['name'];
	//$slno[$i]=$row['sl_no'];
	//$labname[$i]=$row['lab_name'];
	//$prescription_id[$i]=$row['prescription_id'];
    //$doctor_name[$i]=$row['name'];
	$i++;
	 //echo ($row['pharma_cost'].$row['lab_cost']);
}
//echo $count_appointment4;
mysql_close($con);
?>