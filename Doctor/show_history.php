<?php
	session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$doctorid=$_SESSION['user']['id'];
	$patient_id=$_GET['patient_id'];
	$sql =mysql_query("select prescription,prescription_type from consultation where patient_id='$patient_id' and doctor_id='$doctorid'");
	while ($row = mysql_fetch_array($sql)) 
	{
		$data=$row['prescription'];
		$type=$row['prescription_type'];
		header("Content-type: $type");
		$post[]=array('Data' =>$data);
	}
	echo json_encode($post);
	mysql_close($con);
?>
