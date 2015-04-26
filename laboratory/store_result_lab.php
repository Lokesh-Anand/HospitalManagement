<!DOCTYPE html>
<html>
<lab_in_charge>


<?php
/*This page stores the result of the test in the database*/ 
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$status_ins=0;
$status_present =0;

//start session.
session_start();
 
$lab_in_charge_id=$_SESSION['user']['id']; 
$lab_in_charge_name = $_SESSION['user']['username'];



$date1=date("Y-m-d");
$date= "DATE :".$date1."\n";
$time1=date("h:i:sa");	
$time= "TIME :".$time1."\n\n";

if(isset($_POST['submit']))
{
	//$lab_id=$_POST['lab_id'];//session variable.
	$patient_id=$_POST['patient_id'];
	
	$lab_id_query=mysql_query("select lab_id from laboratory where lab_in_charge=$lab_in_charge_id ");
	while ($row = mysql_fetch_array($lab_id_query)) 
	{
	  
	   $lab_id=$row['lab_id'];
   
	}
	
	
	$p_name_query=mysql_query("select p_name from patient where patient_id=$patient_id ");
	if(!$p_name_query)
	{
		$status_ins = 0;
		echo " ";
	}
	while ($row = mysql_fetch_array($p_name_query)) 
	{
	   $status_ins = 1;
	   $p_name=$row['p_name'];
   
	}
	$lab_name_query=mysql_query("select lab_name from laboratory where lab_id=$lab_id ");
	while ($row = mysql_fetch_array($lab_name_query)) 
	{
	   
	   $lab_name=$row['lab_name'];
	   
	}

	if($status_ins == 1)
	{
	/* execute this part only if patient id is valid, that is, if he has an account*/

		$result_test1 = $_POST['result_test'];
		$result_test ="\t\t\t\t\t".$lab_name."\n"."\t\t\t\t"."LAB HEAD : ".$lab_in_charge_name."\n".$date.$time."PATIENT NAME : ".$p_name."\n\n"."RESULT OF THE TEST:\n\n".$result_test1;

		$filename = $lab_name.$date1.".txt";
		$myfile = fopen($filename, "w") or die("Unable to open file!");
		fwrite($myfile, $result_test);
		fclose($myfile);

		$filesize = filesize($filename);
		$fp      = fopen($filename, 'r');
		$content = fread($fp, filesize($filename));
		$content = addslashes($content);
		$filetype= filetype($filename);

		fclose($fp);

		$ins =mysql_query("insert into lab_patient(lab_id,patient_id,result,result_size,result_name,result_type) values ('$lab_id','$patient_id','$content','$filesize','$filename','$filetype')");
		$cost=mysql_query("select cost from laboratory where lab_id=$lab_id");
		while ($row = mysql_fetch_array($cost)) 
		{
		   
		   $get_cost=$row['cost'];
		   
		}
		$lab_cost_table = mysql_query("select lab_cost from billing where patient_id = '$patient_id' ");
		while ($cost = mysql_fetch_array($lab_cost_table)) 
		{
		   $status_present = 1;
		   $lab_cost_present =$cost['lab_cost'];
		   
		}
		if($status_present==1) 
		{
			
			$total_lab_cost = $get_cost + $lab_cost_present ;
			$update_cost=mysql_query("update billing set lab_cost='$total_lab_cost' where patient_id='$patient_id' ");
			if(!$update_cost)
			{
				echo " ";
			}
		}
		else
		{
			$ins_cost=mysql_query("insert into billing (patient_id,lab_cost) values('$patient_id','$get_cost')");
			if(!$ins_cost)
			{
				echo "";
			}
		}
		if(!$ins)
		{
			echo " ";
		}
		
	}
}

?>
<script type="text/javascript">

	function final_check()
	{
		
		var ins='<?php echo $status_ins; ?>'; // to get the value of the status variable set earlier.
		if(ins==1)
		{
			var h = document.createElement("H2")                // Create a <h1> element
			var t = document.createTextNode("RESULT SAVED !!!");     // Create a text node
			h.appendChild(t);      
			document.body.appendChild(h);
		}
		if(ins!=1)
		{
			var h = document.createElement("H2")                			// Create a <h1> element
			var t = document.createTextNode("INVALID PATIENT ID!!!TRY AGAIN WITH CORRECT ID.");     // Create a text node
			h.appendChild(t);      
			document.body.appendChild(h);

		}
	}
</script>
</lab_in_charge>
<body onload = "final_check()">
<!--h1> RESULT SAVED !!! </h1-->
<input type="button" value="BACK TO LAB PAGE" onclick="window.location.href='laboratory.php'">
<h1>RESULT STATUS</h1>

</body>
</html>

