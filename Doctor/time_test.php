<!DOCTYPE html>
<html>
<head>
<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$doctorid=3;
	if(isset($_POST['wait_hidden']))
	{	
		$patient_name=$_POST['wait_hidden'];
		$sql1=mysql_query("SELECT patient_id FROM patient WHERE p_name='$patient_name'");
		$row1 = mysql_fetch_array($sql1);
		$sql2=mysql_query("select shart_shift,end_shift from doctor where doctor_id='$doctorid'");
		$row2 = mysql_fetch_array($sql2);
		
		$patient_id=$row1['patient_id'];
		$con_time;
		$shart_shift=$row2['shart_shift'];
		$end_shift=$row2['end_shift'];
		$allot_time=$shart_shift;
		$result_time=0;
		$sql4=mysql_query("SELECT con_time FROM consultation WHERE doctor_id='$doctorid' and con_time!='00:00:00'");
		$i=0;
		while($row4 = mysql_fetch_array($sql4))
		{
			$con_time[$i]=$row4['con_time'];
			$i++;
		}
		
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
	
	}
	
	if(mysql_query("update consultation set con_time='$result_time' where doctor_id='$doctorid' and patient_id='$patient_id' and con_time='00:00:00'"))
		$check=1;
		
		
		
	}
	mysql_close($con);
?>
</head>
<body>
<script type="text/javascript">
	var vi='<?php echo $check; ?>';
	if(vi==1)
	{
		document.location.href="Doctor.php";
	}
	else
	{
		document.location.href="Doctor.php";
		alert("slot is full");
	}
</script>
</body>
</html>