
<?php 
	//Connect with the database
	session_start();
	$con=mysql_connect("localhost","root","");
	mysql_select_db("hospital_management",$con);
	//$patient_name=$_GET['patient_name'];
	$deptname=$_GET['dname'];
	//echo $doctor_name;
	
	//$sql =mysql_query("select a.name,a.doctor_id from doctor a, department b where a.department_id=b.department_id and b.department_name='$deptname'");
	$sql=mysql_query("select a.name,a.doctor_id from doctor a, department b where a.department_id=b.department_id and b.department_name='$deptname'");
	$doctorname[0]="a";
	$doctor_id[0]="b";
	//$post[0]="c";  if you add this then while values will be appended
	while($row=mysql_fetch_assoc($sql))	
	{
		$doctorname=$row['name'];
		$doctor_id=$row['doctor_id'];
		//$patientid=$row['patient_id'];
		//$address=$row['address'];
		//$age=$row['age'];
		//$phone_no=$row['phno'];
		//$type=$row['type'];
		//$room_no=$row['room_no'];
		//$post[]=array('Address'=>$address,'Age'=>$age,'Phone_No'=>$phone_no,'Type'=>$type, 'Room_No'=>$room_no, 'PatientID'=>$patientid);
		$post[]=array('docname'=>$doctorname,'did'=>$doctor_id);
	}
	echo json_encode($post);
	mysql_close($con);
?>
