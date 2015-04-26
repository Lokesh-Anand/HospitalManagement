<html>
<head>
<?php
	session_start();
	$con=mysql_connect("localhost","root","");
	$pres_id=$_GET['presid'];
	mysql_select_db("hospital_management",$con);
	$sql5=mysql_query("delete from consultation where prescription_id='$pres_id'");
	if($sql5 === FALSE)  
		die(mysql_error());
	
	

?>
</head>
<body>
<script type="text/javascript">
	document.location.href="patient.php";
	
</script
</body>
</html>
