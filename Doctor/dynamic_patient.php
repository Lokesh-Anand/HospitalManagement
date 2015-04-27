<?php 
	//Connect with the database
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$patient_name=$_GET['patient_name'];
	
	
	$sql =mysql_query("select patient_id,address, age, phno, type,room_no from patient where p_name ='$patient_name'");

	while($row=mysql_fetch_assoc($sql))	
	{
		$patientid=$row['patient_id'];
		$address=$row['address'];
		$age=$row['age'];
		$phone_no=$row['phno'];
		$type=$row['type'];
		$room_no=$row['room_no'];
		$post[]=array('Address'=>$address,'Age'=>$age,'Phone_No'=>$phone_no,'Type'=>$type, 'Room_No'=>$room_no, 'PatientID'=>$patientid);
	}
	echo json_encode($post);
	mysql_close($con);
?>