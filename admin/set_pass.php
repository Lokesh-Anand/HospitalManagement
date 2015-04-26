 <!DOCTYPE html>
<html>
<head>

<?php

/*
This is a PHP script that facilitates updating of the new 
Admin password in the database
*/


$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$check=0;
if(isset($_POST['submit']))
{

$newpass=$_POST['newpass'];
$role="admin";
$var="update users set password='$newpass' where role='$role'";
 if(mysql_query($var))
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

