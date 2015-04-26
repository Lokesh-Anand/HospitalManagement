<!DOCTYPE html>
<html>
<head>


<?php

/*
This is a PHP script that facilitates the insertion of a new 
Department to the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$check=0;
if(isset($_POST['submit']))
{
$dept_name=$_POST['dept_name'];
$dept_hod=$_POST['HOD'];
//$dept_emp=$_POST['employee'];


/*$var=mysql_query("select department_id from department");
while ($row = mysql_fetch_array($var)) {
   
   $result_old=$row['department_id'];
   
}
$result=$result_old+1;*/
$var1="insert into department(department_name,HOD) values('$dept_name','$dept_hod')";
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

