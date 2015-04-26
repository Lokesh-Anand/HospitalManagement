<!DOCTYPE html>
<html>
<head>
<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	session_start();
	$doctorid=$_SESSION['user']['id'];
	$doctor_name=$_POST['profile_name'];
	$doctor_age=$_POST['profile_age'];
	$doctor_address=$_POST['profile_address'];
	$var="update doctor set name='$doctor_name',age='$doctor_age',address='$doctor_address' where doctor_id='$doctorid'";
	if(mysql_query($var))
			$check=1;
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