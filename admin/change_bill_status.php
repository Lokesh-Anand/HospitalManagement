<!DOCTYPE html>
<html>
<head>



 <?php

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$check=0;
$billing_id=$_POST['hidden_bil'];
$var1 ="update billing set bill_status='paid' where billing_id='$billing_id'";
if(mysql_query($var1))
	 $check=1;

?>

</head>
<body>
<script type="text/javascript">
var vi='<?php echo $check; ?>';
if(vi==1)
{

document.location.href="Admin.php";
}

</script>
</body>
</html>

