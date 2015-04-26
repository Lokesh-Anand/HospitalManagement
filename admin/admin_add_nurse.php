<!DOCTYPE html>
<html>
<head>


<?php


/*
This is a PHP script that facilitates the insertion of a new 
Nurse to the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$check=0;
if(isset($_POST['submit']))
{
$nur_name=$_POST['nur_name'];
$nur_age=$_POST['nur_age'];
$nur_qual=$_POST['nur_qual'];
$nur_dept=$_POST['nur_dept'];
$nur_doj=$_POST['nur_doj'];
$nur_sal=$_POST['nur_sal'];
$nur_email=$_POST['nur_email'];
//$nur_pic=$_POST['nur_pic'];
$filePicName=$_FILES['nur_pic']['name'];
$tmpPicName=$_FILES['nur_pic']['tmp_name'];
$filePicSize=$_FILES['nur_pic']['size'];
$filePicType=$_FILES['nur_pic']['type'];

$fp_pic=fopen($tmpPicName,'r');
$content_pic=fread($fp_pic,filesize($tmpPicName));
fclose($fp_pic);

if(!get_magic_quotes_gpc())
{
$filePicName=addslashes($filePicName);
}



$var=mysql_query("select department_id from department where department_name='$nur_dept'");
while ($row = mysql_fetch_array($var)) {
	
   $result=$row['department_id'];
  
}
$role="nurse";
$var1="insert into nurse(picture,n_name,n_age,n_qualification,dept_id,doj,salary) values('$content_pic','$nur_name','$nur_age','$nur_qual','$result','$nur_doj','$nur_sal')";
 if(mysql_query($var1))
 {
	mysql_query("insert into users(role,username,email) values('$role','$nur_name','$nur_email')");
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

