<?php 
	require("common.php");
    
	if(empty($_SESSION['user1'])) 
    { 
        
        header("Location: login.php"); 
         
        
        
        die("Redirecting to login.php"); 
    } 
     
    
    
     
    
    //include("reset.php" );
    
    
    if(!empty($_POST)){
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        
        
        
        if($_POST['email'] != $_SESSION['user1']['email']) 
        { 
            
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
                die("This E-Mail address is already in use"); 
            } 
        } 
         
        // If the user entered a new password, we need to hash it and generate a fresh salt 
        // for good measure. 
        if(!empty($_POST['password'])) 
        { 
            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
            $password = hash('sha256', $_POST['password'] . $salt); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $password = hash('sha256', $password . $salt); 
            } 
        } 
        else 
        { 
            // If the user did not enter a new password we will not update their old one. 
            $password = null; 
            $salt = null; 
        } 
         
        // Initial query parameter values 
        $query_params = array( 
            ':email' => $_POST['email'], 
            ':user_id' => $_SESSION['user1']['id'], 
        ); 
         
        // If the user is changing their password, then we need parameter values 
        // for the new password hash and salt too. 
        if($password !== null) 
        { 
            $query_params[':password'] = $password; 
            $query_params[':salt'] = $salt; 
        } 
         
        // Note how this is only first half of the necessary update query.  We will dynamically 
        // construct the rest of it depending on whether or not the user is changing 
        // their password. 
        $query = " 
            UPDATE users 
            SET 
                email = :email 
        "; 
         
        // If the user is changing their password, then we extend the SQL query 
        // to include the password and salt columns and parameter tokens too. 
        if($password !== null) 
        { 
            $query .= " 
                , password = :password 
                , salt = :salt 
            "; 
        } 
         
        // Finally we finish the update query by specifying that we only wish 
        // to update the one record with for the current user. 
        $query .= " 
            WHERE 
                id = :user_id 
        "; 
         
        try 
        { 
            // Execute the query 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            
            
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // Now that the user's E-Mail address has changed, the data stored in the $_SESSION 
        // array is stale; we need to update it so that it is accurate. 
        $_SESSION['user1']['email'] = $_POST['email']; 
        
		session_destroy();	
        
        header("Location: login.php"); 
         
        
        
        
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
    <title>Reset Link</title>
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
                <h2>Reset Account</h2>
            </div>
        </div>
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong> Reset Account </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" action="resetlink.php" method="post">
<br/>
                                        <div class="form-group input-group">
                                           
                                            Username:<br /> 
										<b><?php echo htmlentities($_SESSION['user1']['username'], ENT_QUOTES, 'UTF-8'); ?></b> 
										 
                                        </div>
                                     
                                         <div class="form-group input-group">
                                           <span class="input-group-addon">@</span> 
                                            
										<input type="text" name="email" class="form-control" value="<?php echo htmlentities($_SESSION['user1']['email'], ENT_QUOTES, 'UTF-8'); ?>" /> 
											
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                                <input type="password" name="password"  class="form-control" placeholder="Enter password" /><br /> 
    
											
                                        </div>
                                     
                                     <input type="submit" class="btn btn-success " value="Update Account">
                                    <hr />
                                    
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
