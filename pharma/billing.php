<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$patient=$_POST['pid'];
$medicine=$_POST['medicine'];
$quantity=$_POST['quantity'];
$i=0;
$cost=0;

foreach($medicine as $b)
{
$q=mysql_query("select stock_available,medicine_name from pharmacy where medicine_name='$b';");
$r=mysql_fetch_array($q);
if($r['stock_available'] > $quantity[$i]){
$query=mysql_query("update pharmacy set stock_available=stock_available-$quantity[$i] where medicine_name='$b';");
$query1=mysql_query("select cost from pharmacy where medicine_name='$b';");
while ($row = mysql_fetch_array($query1))
 {
   
   $cost=$cost+$row['cost']*$quantity[$i];
  
 }
$i++;


$query=mysql_query("update billing set pharma_cost=pharma_cost+$cost where patient_id=$patient;");
}
else{
$m=$r['medicine_name'];
die("Stock not available for $m medicine");
}
}

mysql_close($con);
//header("Location : https://www.hospital.dev/pharma/pharmacist.php");
?>
<html>
<head>
<script type="text/javascript">
	
   
   
   window.location=" https://www.hospital.dev/pharma/pharmacist.php";
   alert("Bill Updated");
</script>
</head>
</html>















