<?php

$con = mysqli_connect('localhost','root','','hospital_management');

$medicine_name = $_GET['medicine_name'];

//echo $medicine_name;

$sql = mysqli_query($con,"DELETE FROM pharmacy WHERE medicine_name = '$medicine_name' ");

if(!$sql)
{
	echo "server problem please try later";
}

?>
