<!DOCTYPE html>
<html>
<head>

<?php
/*
This is a PHP script which is used to add a new room to
a certain selected room type
*/


$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$check=0;
if(isset($_POST['submit']))
{
$add_new_room=$_POST['add_new_room'];

$query=mysql_query("select count(*),room_cost,room_no,room_capacity from rooms where room_type='$add_new_room' ");
while ($row0 = mysql_fetch_array($query))		
	  {
		$result0=$row0['count(*)'];
		$result2=$row0['room_cost'];
		$result=$row0['room_no'];
		$result3=$row0['room_capacity'];
	  }
	  $i=0;
	  $result1="";
	  $length=strlen($result);
	  
for($i=0;$i<$length;$i++)
	{
	if(($result[$i]>='a' && $result[$i]<='z')||($result[$i]>='A' && $result[$i]<='Z'))
		{
			$result1.=$result[$i];
	
		}
		
	  
	}
$result0=$result0+1;
$room_manage_no=$result1.$result0;
$query1="insert into rooms(room_type,room_cost,room_no,room_capacity) values('$add_new_room','$result2','$room_manage_no','$result3')";
if(mysql_query($query1))
	 $check=1;
	 
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