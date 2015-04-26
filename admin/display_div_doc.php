<?php

/*
This is a PHP script that facilitates the fetching of qualification from the Doctor
table from database and help in displaying it at the Modal
*/

$con=mysql_connect("localhost","root","");
mysql_select_db("hospital_management",$con);
$doc_name=$_GET['doc_name'];
$one=mysql_query("select qualification from doctor where name='$doc_name'");
while($row=mysql_fetch_array($one))
{
	$doc_qual=$row['qualification'];
}

echo $doc_qual;
?>