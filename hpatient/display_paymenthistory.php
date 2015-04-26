<?php
//session_start();
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$currentpid=$_SESSION['user']['id'];
//$currentpid=5001;			//50035
$sql1 =mysql_query("select count(*) from billing where patient_id='$currentpid';");

while ($row = mysql_fetch_array($sql1))
 {

   $count_appointment=$row['count(*)'];
  }




$sql2 =mysql_query("select billing_time, pharma_cost,lab_cost,consultation_fee,operation_cost,canteen,room_charge,tax,billing_id from billing where patient_id='$currentpid';");

$i=0;
if($sql2 === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
$time[0]="null";
$total_cost[0]=0;
$pharma_cost[0]=0;
$lab_cost[0]=0;
$consultation_fee[0]=0;
$operation_cost[0]=0;
$canteen[0]=0;
$room_charge[0]=0;
$tax[0]=0;
$billing_id[0]=0;
while($row = mysql_fetch_array($sql2))
{
	$time[$i]=$row['billing_time'];
	//$billing_time[$i]=$row['billing_time'];
    $pharma_cost[$i]=$row['pharma_cost'];
	$lab_cost[$i]=$row['lab_cost'];
	$consultation_fee[$i]=$row['consultation_fee'];
	$operation_cost[$i]=$row['operation_cost'];
	$canteen[$i]=$row['canteen'];
	$room_charge[$i]=$row['room_charge'];
	$tax[$i]=$row['tax'];
	$billing_id[$i]=$row['billing_id'];
	if($tax[$i]==0)
	{
		// calculating tax and appending it to database
		$t=$pharma_cost[$i]+$lab_cost[$i]+$consultation_fee[$i]+$operation_cost[$i]+$canteen[$i]+$room_charge[$i];
		$tax[$i]=($t*0.13);
		//echo ($tax[$i]);
		$sql3 =mysql_query("update billing set tax='$tax[$i]' where billing_id='$billing_id[$i]'");
		if($sql3 === FALSE) { 
			die(mysql_error()); // TODO: better error handling
			}
	
	}
	
	//echo ($pharma_cost[$i]+1);
	//$t=$pharma_cost[$i]+$lab_cost[$i]+$consultation_fee[$i]+$operation_cost[$i]+$canteen[$i]+$room_charge[$i];
	//$tax[$i]=($t*0.13);
	$total_cost[$i]=$pharma_cost[$i]+$lab_cost[$i]+$consultation_fee[$i]+$operation_cost[$i]+$canteen[$i]+$room_charge[$i]+$tax[$i];
	//echo ($total_cost[$i]);
	//echo ($pharma_cost[0].$lab_cost[0].$consultation_fee[0].$operation_cost[0]);
	
	//$remarks[$i]="good to see";					//remarks  = total cosr
	 //echo ($total_cost[$i]);
	 $i++;
	 
}
mysql_close($con);
?>