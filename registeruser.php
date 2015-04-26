<?php 

    
    require("common.php"); 
	//session_start();
    if(empty($_SESSION['user'])) 
    { 
        
        header("Location: ../login.php"); 
         
        
        
        die("Redirecting to login.php"); 
    } 
     if(!empty($_POST)) 
    { 
        // Ensure that the user has entered a non-empty username 
        if(empty($_POST['id'])) 
        { 
            die("Please enter id."); 
        } 
         
		if(empty($_POST['username'])) 
        { 
            die("Please enter a username."); 
        } 
         
        // Ensure that the user has entered a non-empty password
        if(empty($_POST['password'])) 
        { 
            die("Please enter a password."); 
        } 
		if(empty($_POST['password1'])) 
        { 
            die("Please retype password."); 
        } 
        if(strcmp($_POST['password'],$_POST['password1'])!=0) 
        { 
            die("Passwords dont match"); 
        }  
        // Make sure the user entered a valid E-Mail address 
        
       if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        //:username is a special token, we will substitute a real value in its place when 
        // we execute the query.This is done to prevent sql injection.
        
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                username = :username 
        "; 
         
        // It is possible to insert $_POST['username'] directly into 
        // your $query string; however doing so is very insecure and opens your 
        // code up to SQL injection exploits.  Using tokens prevents this. 
         $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        
        
        $row = $stmt->fetch(); 
        // If a row was returned, then we know a matching username was found in 
        // the database already and we should not allow the user to continue. 
        if($row) 
        { 
            die("This username is already in use"); 
        } 
        // Now we perform the same type of check for the email address, in order 
        // to ensure that it is unique. 
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                id = :id 
        "; 
         
        // It is possible to insert $_POST['username'] directly into 
        // your $query string; however doing so is very insecure and opens your 
        // code up to SQL injection exploits.  Using tokens prevents this. 
         $query_params = array( 
            ':id' => $_POST['id'] 
        ); 
         
        try 
        { 
            
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        
        
        $row = $stmt->fetch(); 
        // If a row was returned, then we know a matching username was found in 
        // the database already and we should not allow the user to continue. 
        if($row) 
        { 
            die("This id is already in use"); 
        }
		
		
		$query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        "; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This email address is already registered"); 
        } 
         
        // Again, we are using special tokens (technically called parameters) to 
        // protect against SQL injection attacks. 
        $query = " 
            INSERT INTO users ( 
                id,
				username,				
                password, 
                salt, 
                email,
				role		
            ) VALUES ( 
				:id,
                :username, 
                :password, 
                :salt, 
                :email,
				:role		
            ) 
        "; 
         
        
        
        // A salt is randomly generated here to protect against lookup tables
        // and rainbow table attacks.  The following statement generates a hex 
        // representation of an 8 byte salt. 
        
       $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
       
	   
	    // This hashes the password with the salt so that it can be stored securely 
        // in your database.  The output of this next statement is a 64 byte hex 
        // string representing the 32 byte sha256 hash of the password.  The original 
        // password cannot be recovered from the hash.
	   
	   $password = hash('sha256', $_POST['password'] . $salt); 
         
        // Next we hash the hash value 65536 more times.  The purpose of this is to 
        // protect against brute force attacks.  Now an attacker must compute the hash 65537 
        // times for each guess they make against a password, whereas if the password 
        // were hashed only once the attacker would have been able to make 65537 different  
        // guesses in the same amount of time instead of only one. 
       for($round = 0; $round < 65536; $round++) 
        { 
            $password = hash('sha256', $password . $salt); 
        } 
        

        // Here we prepare our tokens for insertion into the SQL query.  We do not 
        // store the original password; only the hashed version of it.		
        $query_params = array( 
			':id' => $_POST['id'],
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'],
			':role' => $_POST['menu']		
        ); 
         
        try 
        { 
            
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            
            
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // This redirects the user back to the login page after they register 
        header("Location: admin/Admin.php"); 
         
        
        
        
        die("Redirecting to login.php"); 
    } 
     
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Registration Page</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets1/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets1/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets1/css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center pad-top ">
            <div class="col-md-12">
                <h2>Registration Page</h2>
            </div>
        </div>
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Register Yourself </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" action="registeruser.php" method="post">
<br/>									

										<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="number" class="form-control" placeholder="ID" name="id" />
                                        </div>
                                        <div class="form-group input-group">
								
										  <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
										<select id="drop" class="form-control" name="menu">
								<option>Account Type</option>
								<option>admin</option>
								<option>doctor</option>
								<option>patient</option>
								<option>nurse</option>
								<option>pharmacist</option>
								<option>laboratorist</option>
								<option>accountant</option>
								</select>
								</div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Name" name="username" />
                                        </div>
                                     
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Your Email" name="email"/>
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Enter Password" name="password" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Retype Password" name="password1" />
                                        </div>
                                     
                                     <input type="submit" class="btn btn-success " value="Register">
                                    <hr />
                                   <!-- Already Registered ?  <a href="login.php" >Login here</a> -->
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets1/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets1/plugins/bootstrap.js"></script>
   
</body>
</html>
