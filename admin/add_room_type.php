<!DOCTYPE html>
<html>
<head>

<?php

/*
This is a PHP script which aids to add a completely new room type to 
the database 
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
//echo "vinay";
$check=0;
if(isset($_POST['submit']))
{
//echo "vinay1";
$manage_new_type=$_POST['manage_new_type'];
//echo $manage_new_type;
$manage_new_type_cost=$_POST['manage_new_type_cost'];
//echo $manage_new_type_cost;
$manage_new_type_capacity=$_POST['manage_new_type_capacity'];
//echo $manage_new_type_capacity;
$manage_new_type_room_no="";
$length=strlen($manage_new_type);
$result_inter1=strtoupper($manage_new_type[0]);
$result_inter2=strtoupper($manage_new_type[$length-1]);
$manage_new_type_room_no=$result_inter1.$result_inter2."1";
//echo $manage_new_type_room_no;
$query1="insert into rooms(room_type,room_cost,room_no,room_capacity) values('$manage_new_type','$manage_new_type_cost','$manage_new_type_room_no','$manage_new_type_capacity')";
if(mysql_query($query1))
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