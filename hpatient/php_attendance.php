<?php
//session_start();
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$currentpid=$_SESSION['user']['id'];
//$currentpid=5001;				//5001	or 5006		if a patient has no been allocated date his roomnumber type will be NA 
$sql1 =mysql_query("select count(*) from nurse,nurse_work where nurse.nurse_id=nurse_work.nurse_id and nurse_work.patient_id='$currentpid';");
while ($row = mysql_fetch_array($sql1))
{
 $count_res=$row['count(*)'];
}
//echo ($count_res);
$sql2 =mysql_query("select shift_start,shift_end,n_name  from nurse,nurse_work where nurse.nurse_id=nurse_work.nurse_id and nurse_work.patient_id='$currentpid';");
$i=0;
$name[0]="";
$a[0]="";
$b[0]="";
while($row = mysql_fetch_array($sql2))
{
	//echo("entered while lopp");
	$name[$i]=$row['n_name'];
	$a[$i]=$row['shift_start'];
	$b[$i]=$row['shift_end'];
	$i++;
}
//echo ($count_res);
mysql_close($con);
?>