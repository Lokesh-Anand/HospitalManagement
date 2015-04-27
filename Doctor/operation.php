<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$doctorid=$_SESSION['user']['id'];;
	
	$sql1 =mysql_query("select department_id from doctor where doctor_id ='$doctorid'");
	if($row1=mysql_fetch_assoc($sql1))
		$dept_id=$row1['department_id'];
	$sql2=mysql_query("select name from operation where dept_id ='$dept_id'");
	while($row2=mysql_fetch_assoc($sql2))
	{
		$operation_name=$row2['name'];
		$post[]=array('Operation'=>$operation_name);
	}
	echo json_encode($post);
	mysql_close($con);
?>