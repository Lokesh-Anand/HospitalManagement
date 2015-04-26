<?php 

    
    require("common.php"); 
    
	if($_SERVER["HTTPS"]!="on")
	{
	header("Location:https://".
			$_SERVER["HTTP_HOST"].
			$_SERVER["REQUEST_URI"]);
			exit();
			}
	$submitted_username = ''; 
    if(!empty($_POST)) 
    { 
        // This query retreives the user's information from the database using 
        // their username. 
        $query = " 
            SELECT 
                id, 
                username, 
                password, 
                salt, 
                email,
				role	
            FROM users 
            WHERE 
                email = :email 
        "; 
         
        // The parameter values 
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $login_ok = false; 
         
        
        
        $row = $stmt->fetch(); 
        if($row) 
        { 
            // Using the password submitted by the user and the salt stored in the database, 
            // we now check to see whether the passwords match by hashing the submitted password 
            // and comparing it to the hashed version already stored in the database. 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['password']) 
            { 
                
                $login_ok = true; 
            } 
         if($_POST['captcha'] != $_SESSION['digit'] && $check_password === $row['password'] ) die("Sorry, the CAPTCHA code entered was incorrect!");
		
		} 
         
        
        
        if($login_ok) 
        { 
            // Here I am preparing to store the $row array into the $_SESSION by 
            // removing the salt and password values from it.  Although $_SESSION is 
            // stored on the server-side, there is no reason to store sensitive values 
            // in it unless you have to.  Thus, it is best practice to remove these 
            // sensitive values first. 
            unset($row['salt']); 
            unset($row['password']); 
             
            // This stores the user's data into the session at the index 'user'. 
            // We will check this index on the private members-only page to determine whether 
            // or not the user is logged in.  We can also use it to retrieve 
            // the user's details. 
            $_SESSION['user'] = $row; 
             
            // Redirect the user to the private members-only page. 
           

			if ($_POST['menu'] == 'Admin' && $row['role']=="admin")
		    header("Location: Admin/Admin.html"); 
             else if ($_POST['menu'] == 'Doctor' && $row['role']=="doctor")
			 header("Location: Doctor/Doctor.html");
			 else if ($_POST['menu'] == 'Patient' && $row['role']=="patient")
			 header("Location: private.php");
			 else if ($_POST['menu'] == 'Nurse' && $row['role']=="nurse")
			 header("Location: private.php");
			 else if ($_POST['menu'] == 'Pharmacist' && $row['role']=="pharmacist")
			 header("Location: private.php");
			 else if ($_POST['menu'] == 'Laboratorist' && $row['role']=="laboratorist")
			 header("Location: private.php");
			 else if ($_POST['menu'] == 'Accountant' && $row['role']=="accountant")
			 header("Location: private.php");
			
			else
			print("you are not authorised for that account type"); 
        } 
        else 
        { 
            // Tell the user they failed 
            print("Login Failed."); 
             
            // Show them their username again so all they have to do is enter a new 
            // password.  The use of htmlentities prevents XSS attacks.  You should 
            // always use htmlentities on user submitted values before displaying them 
            
            
            $submitted_username = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'); 
				
		
		} 
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
    <title>Login Page</title>
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
    <h6>You entered wrong password.Have a captcha test</h6>
	<div class="container">
        <div class="row text-center pad-top ">
            <div class="col-md-12">
                <h2>Login Page</h2>
            </div>
        </div>
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  Please Sign In </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" action="login1.php" method="post">
<br/>									

										
                                        <div class="form-group input-group">
								
										  <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
										<select id="drop" class="form-control" name="menu">
								<option>Account Type</option>
								<option>Admin</option>
								<option>Doctor</option>
								<option>Patient</option>
								<option>Nurse</option>
								<option>Pharmacist</option>
								<option>Laboratorist</option>
								<option>Accountant</option>
								</select>
								</div>
										
										
                                     
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Your Email" name="email"/>
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Enter Password" name="password" />
                                        </div>
                                     <div id= "c" class="form-group input-group">
									 
									 <img id="captcha"  src="/captcha.php" width="328" height="40" border="1" alt="CAPTCHA">
										<small><a href="#" onclick="
										  document.getElementById('captcha').src = '/captcha.php?' + Math.random();
										  document.getElementById('captcha_code').value = '';
										  return false;
										"></br>Refresh</a></small>
										</div>
									    <div id="d" class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input id="captcha_code" type="text" class="form-control" placeholder="Write the digits in image" name="captcha"  maxlength="5" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');"></p>

                                        </div>
									 
                                     <input type="submit" class="btn btn-success " value="SIGN IN">
                                    <hr />
                                    <a href="register.php" >Register here</a>&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp
									<a href="reset.html">Forgot Password</a>
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
