<?php
//session_start();
// This files is used to calculate lab reports that have come. I am passing all reports but in javascript function i am displaying only 4 
// top 4 on the basis of sl_no of lab_patient 
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$currentpid=$_SESSION['user']['id'];
//$currentpid=5001;

$sql1 =mysql_query("select count(*) from lab_patient a,laboratory b where a.lab_id=b.lab_id and a.patient_id='$currentpid';");
while ($row = mysql_fetch_array($sql1))
 {

   $count_appointment2=$row['count(*)'];
  }
$sql2 =mysql_query("select b.lab_name from lab_patient a,laboratory b where a.lab_id=b.lab_id and a.patient_id='$currentpid' order by a.sl_no;");
$i=0;
//$slno[0]="null";			//awesome to handle case when row is zero therby flow do ot enter while loop 
$labname[$i]="null";
if($sql2 === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row = mysql_fetch_array($sql2))
{
	//$slno[$i]=$row['sl_no'];
	$labname[$i]=$row['lab_name'];
	//$prescription_id[$i]=$row['prescription_id'];
    //$doctor_name[$i]=$row['name'];
	$i++;
	 //echo ($row['pharma_cost'].$row['lab_cost']);
}
//echo $count_appointment2;
mysql_close($con);
?>