<!DOCTYPE html>
<html>
<head>
<?php
	//session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	//$doctorid=3;
	$currentpid=$_SESSION['user']['id'];
	//$currentpid=5001;
	$name=$_POST['profile_name'];
	$age=$_POST['profile_age'];
	$blood=$_POST['profile_bgroup'];
	$phone=$_POST['profile_phone'];
	$address=$_POST['profile_address'];
	$var="update patient set p_name='$name',age='$age',Blood_Group='$blood',phno='$phone',address='$address' where patient_id='$currentpid'";
	if(mysql_query($var))
			$check=1;
?>
</head>
<body>
<script type="text/javascript">
	var vi='<?php echo $check; ?>';
	if(vi==1)
	{
		document.location.href="patient.php";
	}
</script>
</body>
</html>