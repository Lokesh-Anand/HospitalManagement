<?php
$con=mysqli_connect("localhost","root","","hospital_management");
$pid=$_SESSION['user']['id'];
$pic="SELECT picture from nurse where nurse_id=$pid";

$one=mysqli_query($con,$pic);
while($row=mysqli_fetch_array($one))
{
echo '<img src="data:image/png;base64,' . base64_encode($row['picture']) . '" height="150px" width="150px"/>';
} 
?>