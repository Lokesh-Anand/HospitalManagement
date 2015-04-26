<!DOCTYPE html>
<html>
<head>

<?php

/*
This is a PHP script that facilitates updating of the new details
of Admin into the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$check=0;
if(isset($_POST['submit']))
{

$user=$_POST['user'];
$email=$_POST['email'];
$role="admin";
$var="update users set username='$user',email='$email' where role='$role'";
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

