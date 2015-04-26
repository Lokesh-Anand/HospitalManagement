<?php
	//session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$currentpid=$_SESSION['user']['id'];
	//$currentpid=5001;
	$sql=mysql_query("select p_name,age,Blood_Group,phno,address from patient where patient_id='$currentpid';");
	
	$i=0;
	while($row = mysql_fetch_array($sql))
	{
		$name=$row['p_name'];
		$age=$row['age'];
		$bgroup=$row['Blood_Group'];
		$phone=$row['phno'];
		$address=$row['address'];
		$i++;
		//echo ($row['p_name'].$row['age'].$row['phno']);
	}
	
	
?>
