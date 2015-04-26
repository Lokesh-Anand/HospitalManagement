<?php
	//session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	//$doctorid=5001;
	//$prescription_id=$_GET['prescription_id'];
	$condition1=$_GET['cond'];
	// when user selects search by name
	
	$post1="";
	if($condition1=="name")
	{
		$sql =mysql_query("select name from doctor");
		//$i=0;
		while ($row = mysql_fetch_array($sql)) 
		{
			$post1.=$row['name'];
			$post1.=",";
			//$post1[$i]=$row['name'];
			//$i++;
			/*$data=$row['prescription'];
			//$type=$row['prescription_type'];
			//header("Content-type: $type");
			$post[]=array('Data' =>$data);*/
		}
		echo $post1;
	
	
	
	}
	else
	{
		$sql =mysql_query("select department_name from department ");
		//$i=0;
		while ($row = mysql_fetch_array($sql)) 
		{
			$post1.=$row['department_name'];
			$post1.=",";
			/*$data=$row['prescription'];
			//$type=$row['prescription_type'];
			//h	ader("Content-type: $type");
			$post[]=array('Data' =>$data);*/
		}
		echo $post1;
	
	}
	
	mysql_close($con);
?>
