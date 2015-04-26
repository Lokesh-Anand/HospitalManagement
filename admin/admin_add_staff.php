<!DOCTYPE html>
<html>
<head>


<?php


/*
This is a PHP script that facilitates the insertion of a new 
Staff to the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$check=0;
if(isset($_POST['submit']))
{
$staff_name=$_POST['staff_name'];
$staff_age=$_POST['staff_age'];
$staff_sal=$_POST['staff_sal'];
$staff_add=$_POST['staff_add'];	
$staff_job=$_POST['staff_job'];
$staff_qual=$_POST['staff_qual'];
$staff_dept=$_POST['staff_dept'];
$staff_doj=$_POST['staff_doj'];
$staff_email=$_POST['staff_email'];

$filePicName=$_FILES['staff_pic']['name'];
$tmpPicName=$_FILES['staff_pic']['tmp_name'];
$filePicSize=$_FILES['staff_pic']['size'];
$filePicType=$_FILES['staff_pic']['type'];

$fp_pic=fopen($tmpPicName,'r');
$content_pic=fread($fp_pic,filesize($tmpPicName));
fclose($fp_pic);

if(!get_magic_quotes_gpc())
{
$filePicName=addslashes($filePicName);
}

//$staff_pic=$_POST['staff_pic'];
$staff_start=$_POST['staff_start'];
$staff_end=$_POST['staff_end'];



$var=mysql_query("select department_id from department where department_name='$staff_dept'");
while ($row = mysql_fetch_array($var)) {
   
   $result=$row['department_id'];
   
}


$var1="insert into staff(s_name,age,s_salary,s_address,job,qualification,dept_id,doj,picture,shart_shift,end_shift) values('$staff_name','$staff_age','$staff_sal','$staff_add','$staff_job','$staff_qual','$result','$staff_doj','$content_pic','$staff_start','$staff_end')";
 if(mysql_query($var1))
 {
	mysql_query("insert into users(role,username,email) values('$staff_job','$staff_name','$staff_email')");
	 $check=1;
 }
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

