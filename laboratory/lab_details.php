<?php

/*This php file renders the lab name and image of lab head and id from mysql database*/

session_start();
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

//getting session variables.
$head_id=$_SESSION['user']['id']; 
$head_name = $_SESSION['user']['username'];

//$head_id = "2004";
//$head_name = "Kavya S";
$lab_name_query=mysql_query("select lab_name from laboratory where lab_in_charge=$head_id ");
	while ($row = mysql_fetch_array($lab_name_query)) 
	{
	   
	   $lab_name=$row['lab_name'];
	   
	}
	//retrieving images from database
	$head_image=mysql_query("select picture from staff where s_id=$head_id ");
	while ($row = mysql_fetch_array($head_image)) 
	{
	   
	   $image=$row['picture'];
	   
	}
	
mysql_close($con);
?>