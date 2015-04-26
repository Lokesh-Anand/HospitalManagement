<?php
	session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	//$doctorid=5001;
	$prescription_id=$_GET['prescription_id'];
	$sql =mysql_query("select prescription from consultation where prescription_id='$prescription_id' ");
	while ($row = mysql_fetch_array($sql)) 
	{
		$post1=$row['prescription'];
		/*$data=$row['prescription'];
		//$type=$row['prescription_type'];
		//header("Content-type: $type");
		$post[]=array('Data' =>$data);*/
	}
	echo $post1;
	mysql_close($con);
?>
