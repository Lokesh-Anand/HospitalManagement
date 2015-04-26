<?php

$con = mysqli_connect('localhost','root','','hospital_management');

$search_value = $_GET['search_value'];

//echo $search_value;


//echo "hello world";
$conf = "%{$search_value}%";
//echo $conf;

$res = mysqli_query($con,"SELECT patient.p_name, patient.room_no,nurse_work.shift_start,  nurse_work.shift_end,nurse_work.food FROM patient INNER JOIN nurse_work on patient.p_name like '$conf'");
$e=[];
while($x = mysqli_fetch_array($res))
{
	$e[]=$x;
	/*
	$patient_name = $x['p_name'];
	$age = $x['age'];
	
	$b_grp = $x['Blood Group'];
	$r_no = $x['room_no'];
	$r_type = $x['type'];
	$Allot_date = $x['a_date'];
	$Dis_date = $x['dis_date'];

	$post[]=array('p_name'=>$medicine_name,'category'=>$category,'description'=>$description,'cost'=>$cost, 'date_manufacture'=>$date_manufacture, 'date_expiry'=>$date_expiry ,'manufacturing_company'=>$manufacturing_company, 'stock_available'=>$stock_available);
	*/
}
http_response_code(200);
echo json_encode($e);
?>