<?php

$con = mysqli_connect('localhost','root','','hospital_management');

$search_value = $_GET['search_value'];

//echo $search_value;


//echo "hello world";
$conf = "%{$search_value}%";
//echo $conf;

$res = mysqli_query($con,"select * from pharmacy where medicine_name like '$conf' ");


while($x = mysqli_fetch_array($res))
{

	$medicine_name = $x['medicine_name'];
	$category = $x['category'];
	$description = $x['description'];
	$cost = $x['cost'];
	$date_manufacture = $x['date_manufacture'];
	$date_expiry = $x['date_expiry'];
	$manufacturing_company = $x['manufacturing_company'];
	$stock_available = $x['stock_available'];

	$post[]=array('medicine_name'=>$medicine_name,'category'=>$category,'description1'=>$description,'cost'=>$cost, 'date_manufacture'=>$date_manufacture, 'date_expiry'=>$date_expiry ,'manufacturing_company'=>$manufacturing_company, 'stock_available'=>$stock_available);
}

echo json_encode($post);
?>