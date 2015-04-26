<?php
//session_start();
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$currentpid=$_SESSION['user']['id'];
$currentpid=5001;	//		5003456789;				//5001	or 5006		if a patient has no been allocated date his roomnumber type will be NA 
//$sql1 =mysql_query("select count(*) from rooms a,patient p where p.room_no=a.room_no and p.room_no != \"NA\" and p.patient_id='$currentpid';");
$sql1 =mysql_query("select count(*) from rooms a,patient p where p.room_no=a.room_no and p.patient_id='$currentpid';");

while ($row = mysql_fetch_array($sql1))
 {

   $count_appointment=$row['count(*)'];
  }




//$sql2 =mysql_query("select a.room_no,a.room_type,p.login_time, from rooms a,patient p where p.room_no=a.room_no and p.room_no != \"NA\" and p.patient_id='$currentpid' ;");
$sql2 =mysql_query("select a.room_no,a.room_type,p.login_time,p.a_date,p.dis_date from rooms a,patient p where p.room_no=a.room_no and p.patient_id='$currentpid' ;");
$i=0;
$roomno[0]="null";
$roomtype[0]="null";
$logintime[0]="null";
$adate[0]="null";
$ddate[0]="null";
while($row = mysql_fetch_array($sql2))
{
	$roomno[$i]=$row['room_no'];
	$roomtype[$i]=$row['room_type'];
	//$bedno[$i]="2355";				//$row[];
	$logintime[$i]=$row['login_time'];
	$adate[$i]=$row['a_date'];
	$ddate[$i]=$row['dis_date'];
	 $i++;
	 //echo ($row['pharma_cost'].$row['lab_cost']);
	
}
//echo ($roomno[0]);
mysql_close($con);
?>