<!DOCTYPE html>
<html>
<head>


<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	$check=0;
	if(isset($_POST['submit']))
	{
		$doctor_id=$_POST['doctor_id'];
		$patient_id=$_POST['patient_id'];
		$remark=$_POST['remark'];

		$var1="insert into consultation(doctor_id,patient_id,remarks,con_time) values('$doctor_id','$patient_id','$remark','00:00:00')";
		if(mysql_query($var1))
			$check=1;
	}

?>
</head>
<body>
<script type="text/javascript">
	var vi='<?php echo $check; ?>';
	if(vi==1)
	{

		document.location.href="Doctor.php";
	}

</script>
</body>
</html>

