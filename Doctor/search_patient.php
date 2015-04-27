<?php 
	//Connect with the database
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$patient_name=$_POST["name"]
	//Query for the no of patient
	$sql1 =mysql_query("select count(*) from patient");
	//its for fetching all the patient in the list
	while ($row = mysql_fetch_array($sql1))
	{
		$count_patient=$row['count(*)'];
	}
	//Query to fetch details of patient.
	$sql2 =mysql_query("select p_name, age, phno, type,room_no from patient");
	
?>