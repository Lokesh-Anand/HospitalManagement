<?php
	//session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$doctorid=$_SESSION['user']['id'];
	$sql=mysql_query("select name,age,address from doctor where doctor_id='$doctorid'");
	
	$i=0;
	while($row = mysql_fetch_array($sql))
	{
		$doctor_name=$row['name'];
		$age=$row['age'];
		$address=$row['address'];
		//$i++;
		//echo ($row['name'].$row['age'].$row['address']);
	}
	
?>
