<!DOCTYPE html>
<html>
<head>
<?php

/*
This is a PHP script that facilitates the deletion of a
selected row from the Patient table of the Database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
if(isset($_POST['patient_hidden']))
{	
	$remove_hidden=$_POST['patient_hidden'];
	//echo $remove_hidden;
	$var1="delete from patient where p_name='$remove_hidden'";
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

document.location.href="Admin.php";
}

</script>
</body>
</html>

