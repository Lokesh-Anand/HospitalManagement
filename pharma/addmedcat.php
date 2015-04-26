<?php

	$con = mysqli_connect('localhost','root','','hospital_management');

	$medicine_name = $_POST['medicine_name'];
	$medicine_category = $_POST['medicine_category'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$manufacturing_date = $_POST['manufacturing_date'];
	$expiry_date = $_POST['expiry_date'];
	$manufacturing_company = $_POST['manufacturing_company'];
	$status = $_POST['status'];

	//echo $medicine_name;

	$sql = mysqli_query($con,"INSERT INTO pharmacy (medicine_name,category,description,cost,date_manufacture,date_expiry,manufacturing_company,stock_available) VALUES ('$medicine_name','$medicine_category','$description','$price','$manufacturing_date','$expiry_date','$manufacturing_company','$status')") ;
	//var_dump($sql);
	if(!$sql)
	{
			echo "<script type='text/javascript'>alert('data not entered')";
			die("lid error" .mysqli_error($con));
	}                                                                                                              

		//echo "<script type='text/javascript'>alert('data entered') </script>";
		echo "<script type='text/javascript'>window.location.href = 'admin2.php' </script> ";

		mysqli_close($con);
	?>