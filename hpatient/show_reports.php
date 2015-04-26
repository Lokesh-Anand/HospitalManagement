<?php
	session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	//$doctorid=5001;
	$prescription_id=$_GET['slno'];
	$sql =mysql_query("select result from lab_patient where sl_no='$prescription_id' ");
	while ($row = mysql_fetch_array($sql)) 
	{
		$post=$row['result'];
		//$type=$row['prescription_type'];
		//header("Content-type: $type");
		//$post[]=array('Data' =>$data);
	}
	echo ($post);
	mysql_close($con);
?>
