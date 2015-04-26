
<?php
	session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$currentpid=$_SESSION['user']['id'];
	//$current_pid=5001;
	$doctor_id=$_GET['docid'];
	
	//############################### constructor #######################################################
	$today= date("Y-m-d")."<br />";
	//echo $today;
	
	$sql2=mysql_query("select shart_shift,end_shift from doctor where doctor_id='$doctor_id'");
	$row2 = mysql_fetch_array($sql2);
	$shart_shift=$row2['shart_shift'];
	$end_shift=$row2['end_shift'];
	$allot_time=$shart_shift;
	$result_time=0;
	
	############################# to find the slots occupied by this doctor #################################
	$con_time[0]=0;
	$i=0;
	$sql4=mysql_query("SELECT con_time FROM consultation WHERE doctor_id='$doctor_id'");
	//echo "list of allocated slots <br />";
	while($row4 = mysql_fetch_array($sql4))
		{
			$con_time[$i]=$row4['con_time'];
			//echo $con_time[$i]."<br />";
			$i++;
		}
	
	
	############################# $con_time[] has the slots occpied by doctor ##################################
	$k=0;
	while($allot_time<$end_shift)
	{
	$k++;
	if($k==5)
	 break;
	if(in_array($allot_time,$con_time))
		{
			$selectedTime = $allot_time;
			$endTime = strtotime("+15 minutes", strtotime($selectedTime));
			//echo date('h:i:s', $endTime);
			$allot_time=date('H:i:s', $endTime);
			//echo ("new allottime=".$allot_time);
		}
	else
		{
			$result_time=$allot_time;
			break;
		}
	
	} //end of while
	//if(in_array("11:15:00",$con_time))
		//echo "there";
	
	//if($count_book >0)
	//{
		//echo ("HE has".$count_book."appointments <br />");
	//} //end of if
	//else
	//{
		//echo ("HE has 0 appointments <br />");
		//echo gettype($con_time);	
	$sql5=mysql_query("insert into consultation(doctor_id,patient_id,con_time,appointment_date) values ('$doctor_id','$currentpid','$result_time','$today')");
		//if($sql5 === FALSE)  
			//die(mysql_error());
		//echo ("values inserted");
	//} //end of else
    //echo ("toime free=".$result_time);	
	mysql_close($con);
	exit()
?>


