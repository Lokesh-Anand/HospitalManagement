<!DOCTYPE html>
<html>
<head>


<?php


/*
This is a PHP script that facilitates the insertion of a new 
Laboratory to the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$check=0;
if(isset($_POST['submit']))
{
$lab_name=$_POST['lab_name'];
$lab_head=$_POST['lab_head'];
$lab_cost=$_POST['lab_cost'];
$lab_dept=$_POST['lab_dept'];


$var=mysql_query("select department_id from department where department_name='$lab_dept'");
while ($row = mysql_fetch_array($var)) {
	
   $result=$row['department_id'];
   
  
}

$var2=mysql_query("select s_id from staff where s_name='$lab_head'");
while ($row2 = mysql_fetch_array($var2)) {
	
   $result_in_charge=$row2['s_id'];
   
  
}

$var1="insert into laboratory(dept_id,lab_name,lab_in_charge,cost) values('$result','$lab_name','$result_in_charge','$lab_cost')";
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

