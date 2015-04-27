<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	//echo "connected";
	$doctorid=$_SESSION['user']['id'];;
	$sql = mysql_query("select p_name,appointment_time, remarks, con_time from consultation as c, patient as p where c.doctor_id=$doctorid and c.patient_id=p.patient_id and c.con_time!='00:00:00';");
	while($row=mysql_fetch_assoc($sql))	
	{
		$patient_name=$row['p_name'];
		$appointment_time=$row['appointment_time'];
		$remark=$row['remarks'];
		$consulting_time=$row['con_time'];
		$post[]=array('Patient_Name'=>$patient_name,'Appointment_Time'=>$appointment_time,'Remark'=>$remark,'Consulting_Time'=>$consulting_time);
	}
	echo json_encode($post);
	mysql_close($con);
?>