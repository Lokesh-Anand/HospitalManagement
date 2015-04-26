
<?php
	// ###################### gives the data from file so that javascript can simply print them on modal
	session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$currentpid=$_SESSION['user']['id'];
	//$currentpid=5001;	//			5001;			
	//$patient_id=$_GET['patient_id'];
	//$sql =mysql_query("select history,history_type from patient where patient_id='$currentpid' ");
	$sql =mysql_query("select history from patient where patient_id='$currentpid' ");
	while ($row = mysql_fetch_array($sql)) 
	{
		$post1=$row['history'];
		//$data=$row['history'];
		//$type=$row['history_type'];
		//header("Content-type: '$type'");
		//$post[]=array('Data' =>$data);
		// echo ("hello"); printed just once that means .... while loop isrunning only for 1 time.
	}
	//$value=$post[0];
	//$value2=$value['Data'];
	//echo $value['Data'];
	//echo json_encode($post);
	echo ($post1);
	mysql_close($con);
?>
