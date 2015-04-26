<?php
	session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$doctorid=$_SESSION['user']['id'];
	$sql =mysql_query("select p_name, remarks, con_time from consultation as c, patient as p where c.doctor_id='$doctorid' and c.patient_id=p.patient_id and c.con_time!='00:00:00';");
	$row_count=5;
	$i=0;
	while(($row = mysql_fetch_assoc($sql)) && $row_count>0)
	{
		$patientname=$row['p_name'];
		$con_time=$row['con_time'];
		$row_count--;
		$post[]=array('Patient_Name'=>$patientname,'Con_time'=>$con_time);
		//echo ($row['p_name'].$row['con_time']);
	}
	echo json_encode($post);
	mysql_close($con);
?>