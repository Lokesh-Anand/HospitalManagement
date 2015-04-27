<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$doctorid=3;
	$current_date= "2015-04-12";//date("Y-m-d");
	$sql=mysql_query("select count(*) from consultation where appointment_date='$current_date' and con_time!='00:00:00'");
	while ($row = mysql_fetch_array($sql))
	{
		$count_appointment=$row['count(*)'];
	}
?>