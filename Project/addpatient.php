<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// define variables and set to empty values
$nameErr = $ageErr = $phoneErr = $addressErr = "";
$name = $age = $phone = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["age"])) {
     $ageErr = "age is required";
   } else {
     $age = test_input($_POST["age"]);
     // check if e-mail address is well-formed
     if (!preg_match("/^[0-9]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
     }
   

   if (empty($_POST["phno"])) {
     $phoneErr = "Phone No is required";
   } else {
     $phone = test_input($_POST["phno"]);
   }

   if (empty($_POST["addr"])) {
     $addressErr = "Address is required";
   } else {
     $address = test_input($_POST["addr"]);
   }
}

$sql = "INSERT INTO patient (p_name, age, phno, address)
VALUES ($name, $age, $phone, $address)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


?>