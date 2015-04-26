<!DOCTYPE html>
<html>
<head>


<?php

/*
This is a PHP script that facilitates updating the 
modified room cost in the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$check=0;
if(isset($_POST['submit']))
{
$manage_room_type=$_POST['manage_room_type'];
$manage_current_cost=$_POST['manage_current_cost'];
$manage_new_cost=$_POST['manage_new_cost'];


$var1="update rooms set room_cost='$manage_new_cost' where room_type='$manage_room_type'";
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

