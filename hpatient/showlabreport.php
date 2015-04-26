<?php
	//session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$currentpid=$_SESSION['user']['id'];
	//$currentpid=5001;
	//$patient_id=$_GET['patient_id'];
	$sql =mysql_query("select result from lab_patient where patient_id='$currentpid' ");
	while ($row = mysql_fetch_array($sql)) 
	{
		$data=$row['result'];
		//$type=$row['prescription_type'];
		//header("Content-type: $type");
		$post[]=array('Data' =>$data);
		// echo ("hello"); printed just once that means .... while loop isrunning only for 1 time.
	}
	//$value=$post[0];
	//$value2=$value['Data'];
	//echo $value['Data'];
	echo json_encode($post);
	mysql_close($con);
?>
