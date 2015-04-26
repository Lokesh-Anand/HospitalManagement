<!DOCTYPE html>
<html>
<head>


<?php


/*
This is a PHP script that facilitates the insertion of a new 
Doctor to the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$check=0;
if(isset($_POST['submit']))
{
$doc_name=$_POST['doc_name'];
$doc_age=$_POST['doc_age'];
$filePicName=$_FILES['doc_pic']['name'];
$tmpPicName=$_FILES['doc_pic']['tmp_name'];
$filePicSize=$_FILES['doc_pic']['size'];
$filePicType=$_FILES['doc_pic']['type'];

$fp_pic=fopen($tmpPicName,'r');
$content_pic=fread($fp_pic,filesize($tmpPicName));
fclose($fp_pic);

if(!get_magic_quotes_gpc())
{
$filePicName=addslashes($filePicName);
}


$fileQualName=$_FILES['doc_qual']['name'];
$tmpQualName=$_FILES['doc_qual']['tmp_name'];
$fileQualSize=$_FILES['doc_qual']['size'];
$fileQualType=$_FILES['doc_qual']['type'];

$fp_qual=fopen($tmpQualName,'r');
$content_qual=fread($fp_qual,filesize($tmpQualName));
fclose($fp_qual);

if(!get_magic_quotes_gpc())
{
$fileQualName=addslashes($fileQualName);
}

//$doc_qual=$_POST['doc_qual'];
//$doc_pic=$_POST['doc_pic'];
$doc_add=$_POST['doc_add'];	
$doc_phone=$_POST['doc_phone'];
$doc_sal=$_POST['doc_sal'];
$doc_doj=$_POST['doc_doj'];
$doc_dept=$_POST['doc_dept'];
$doc_vtype=$_POST['doc_vtype'];
$doc_st_time=$_POST['doc_start'];
$doc_sp_time=$_POST['doc_end'];
$doc_fees=$_POST['doc_fees'];
$doc_email=$_POST['doc_email'];

$var=mysql_query("select department_id from department where department_name='$doc_dept'");
while ($row = mysql_fetch_array($var)) {
   
   $result=$row['department_id'];
   
}
$role="doctor";
$var1="insert into doctor(name,picture,age,V_type,department_id,qualification,qualification_size,qualification_type,qualification_name,address,phno,salary,doj,shart_shift,end_shift,consultation_fees) values('$doc_name','$content_pic','$doc_age','$doc_vtype','$result','$content_qual','$fileQualSize','$fileQualType','$fileQualName','$doc_add','$doc_phone','$doc_sal','$doc_doj','$doc_st_time','$doc_sp_time','$doc_fees')";
 if(mysql_query($var1))
 {
	mysql_query("insert into users(role,username,email) values('$role','$doc_name','$doc_email')");
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

