<!DOCTYPE html>
<html>
<head>


<?php


/*
This is a PHP script that facilitates the insertion of a new 
Patient to the database
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$check=0;
if(isset($_POST['submit']))
{
$pat_name=$_POST['pat_name'];

$pat_age=$_POST['pat_age'];
$pat_email=$_POST['pat_email'];
$pat_blood=$_POST['pat_blood'];
//$pat_history=$_POST['pat_history'];
$fileHistoryName=$_FILES['pat_history']['name'];
$tmpHistoryName=$_FILES['pat_history']['tmp_name'];
$fileHistorySize=$_FILES['pat_history']['size'];
$fileHistoryType=$_FILES['pat_history']['type'];

$fp_history=fopen($tmpHistoryName,'r');
$content_history=fread($fp_history,filesize($tmpHistoryName));
fclose($fp_history);

if(!get_magic_quotes_gpc())
{
$fileHistoryName=addslashes($fileHistoryName);
}

$pat_phone=$_POST['pat_phone'];
$pat_add=$_POST['pat_add'];

$pat_type=$_POST['pat_type'];
$pat_room=$_POST['pat_room'];
$room_no=$_POST['room_number'];
$room_cost=$_POST['room_cost'];
$pat_admission=$_POST['pat_admission'];


if($pat_room!="NA")
$var1="insert into patient(p_name,age,Blood_Group,history,history_size,history_name,history_type,phno,address,type,room_no,a_date) values('$pat_name','$pat_age','$pat_blood','$content_history','$fileHistorySize','$fileHistoryName','$fileHistoryType','$pat_phone','$pat_add','$pat_type','$room_no','$pat_admission')";
else
$var1="insert into patient(p_name,age,Blood_Group,history,history_size,history_name,history_type,phno,address,type,a_date) values('$pat_name','$pat_age','$pat_blood','$content_history','$fileHistorySize','$fileHistoryName','$fileHistoryType','$pat_phone','$pat_add','$pat_type','$pat_admission')";
 
 if(mysql_query($var1))
 {	
	 $var0=mysql_query("select patient_id from patient where p_name='$pat_name' and age='$pat_age' and phno='$pat_phone'");	
	 while ($rownew = mysql_fetch_array($var0))
	  {
		$resultnew=$rownew['patient_id'];
	  }
	 if($pat_room!="NA")
	 {
	 $var5=mysql_query("insert into billing(patient_id,room_charge) values('$resultnew','$room_cost')");
	 
	 $var2=mysql_query("select total_occupied from  rooms where room_no='$room_no'");
	 while ($row0 = mysql_fetch_array($var2))
	  {
		$result0=$row0['total_occupied'];
	  }
	  $result0=$result0+1;
	 $var3=mysql_query("update rooms set total_occupied='$result0'where room_no='$room_no'");
	 }
	 else
	 $var5=mysql_query("insert into billing(patient_id,room_charge) values('$resultnew',0)");
	 
	 
	 mysql_query("insert into users(username,email) values('$pat_name','$pat_email')");
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

