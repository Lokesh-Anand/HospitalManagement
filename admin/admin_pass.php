<?php
/*
This is a PHP script that facilitates the fetching of password of Admin
from Database and provide authentication for the password change.
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);

$role="admin";

$query=mysql_query("select password from users where role='$role'");
while ($row0 = mysql_fetch_array($query))
	  {
      $result1=$row0['password'];
	  }
	  

    
	
?>
