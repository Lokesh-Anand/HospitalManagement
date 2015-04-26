<!DOCTYPE html>
<html>
<head>
<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	if(isset($_POST['app_hidden2']))
	{	
		$remove_hidden=$_POST['app_hidden2'];
		$var1="delete from consultation where con_time='$remove_hidden' and doctor_id=3";
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


