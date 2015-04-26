<!DOCTYPE html>
<html>
<head>


<?php
	$doctorid=$_SESSION['user']['id'];
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$check=0;
	if(isset($_POST['submit']))
	{
		$patient_id=$_POST['prescription_patient_id'];
		$app_time=$_POST['prescription_app_time'];
		$prescription_text=$_POST['prescription_text'];	
		$app_time1= "APPOINTMENT TIME :".$app_time."\n\n";

		$p_name_query=mysql_query("select p_name from patient where patient_id=$patient_id ");
		while ($row = mysql_fetch_array($p_name_query)) 
		{
			$p_name=$row['p_name'];
		}
		$doctor_name_query=mysql_query("select name from doctor where doctor_id=$doctorid ");
		while ($row = mysql_fetch_array($doctor_name_query))
		{
			$doctor_name=$row['name'];
		}

		$result_test ="\t\t\t\t\tDOCTOR NAME:".$doctor_name."\n".$app_time1."PATIENT NAME : ".$p_name."\n\n"."Prescription:\n\n".$prescription_text;

		$filename = $p_name."_".$doctor_name.".txt";
		$myfile = fopen($filename, "w") or die("Unable to open file!");
		fwrite($myfile, $result_test);
		fclose($myfile);

		$filesize = filesize($filename);
		$fp      = fopen($filename, 'r');
		$content = fread($fp, filesize($filename));
		$content = addslashes($content);
		$filetype= filetype($filename);

		fclose($fp);
		$remark=$_POST['remark_prescription'];
		$ins =mysql_query("update consultation set remarks='$remark', prescription='$content',prescription_size='$filesize',prescription_name='$filename',prescription_type='$filetype' where doctor_id='$doctorid' and patient_id='$patient_id' and con_time='$app_time'");
		if(!$ins)
		{
			echo mysql_error();
		}
		$cost=mysql_query("select consultation_fees from doctor where doctor_id='$doctorid'");
		while ($row = mysql_fetch_array($cost))
		{
			$get_consultation_fee=$row['consultation_fees'];
		}
		$operation_name=$_POST['operation'];
		if($operation_name!="Not Required")
		{
			$operation=mysql_query("select cost from operation where name='$operation_name'");
			if($row = mysql_fetch_array($operation))
			{
				$operation_cost=$row['cost'];
			}
			$ins_cost=mysql_query("insert into billing (patient_id,consultation_fee,operation_cost) values('$patient_id','$get_consultation_fee','$operation_cost')");
		
			if(!$ins_cost)
			{
				echo mysql_error();
			}
		}
		else
		{
			$ins_cost=mysql_query("insert into billing (patient_id,consultation_fee) values('$patient_id','$get_consultation_fee')");
		
			if(!$ins_cost)
			{
				echo mysql_error();
			}
		}
	}

?>
</head>
<body>
<script type="text/javascript">
	document.location.href="Doctor.php";
</script>
<!--<form action="check.php" method="POST" id="form">
<h2>HEY</h2>
<input type="submit" value="submit">
</form>-->
</body>
</html>

