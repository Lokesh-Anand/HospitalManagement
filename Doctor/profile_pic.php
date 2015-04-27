<?php

/*This php file renders the lab name and image of lab head and id from mysql database*/
//session_start();

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$head_id=$_SESSION['user']['id']; 
//$head_name = $_SESSION['user']['username'];
//$head_id = "2004";
//$head_name = "Kavya S";

	//retrieving images from database
	$head_image=mysql_query("select picture from doctor where doctor_id =$head_id ");
	while ($row = mysql_fetch_array($head_image)) 
	{
	   
	   $image=$row['picture'];
	   
	}
	
mysql_close($con);
?>