<!DOCTYPE html>
<html>
<head>
     <title>RECRUITMENT FORM</title>
	<link href="assets1/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets1/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets1/css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
	body {
    
    background-image: url("z.jpg");
    background-repeat: no-repeat;
	background-position: bottom left;
	background-position: 0px 140px;
    }
	
	
	</style>
</head>

<body>
   <div class="container">
        <div class="row text-center pad-top ">
            <div class="col-md-12">
                <h2>RECRUITMENT FORM</h2>
            </div>
        </div>
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  Please Give your Details </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" action="sendreg.php" method="post" enctype="multipart/form-data">
<br/>									

										
                                         <div class="form-group input-group">
                                             <span class="input-group-addon"><b>N</b></span>
                                            <input type="text" class="form-control" placeholder="Your Name" name="new_name" required/>
                                        </div>
										 
                                        <div class="form-group input-group">
								
										  <span class="input-group-addon"><b>G</b></span>
										<select id="drop" class="form-control" name="new_gender" required>
											<option>Gender</option>
											<option>Male</option>
											<option>Female</option>
										</select>
										</div>
										 
										 <div class="form-group input-group">
                                            <span class="input-group-addon"><b>A</b></span>
                                            <input type="number" class="form-control" placeholder="Your Age" name="new_age" required/>
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="file" class="form-control" name="new_pic" value="upload resume"required/>
                                        </div>
										 <div class="form-group input-group">
                                            <span class="input-group-addon"><b>A</b></span>
                                            <input type="text" class="form-control" placeholder="Your Address" name="new_address" required/>
                                        </div>
										 <div class="form-group input-group">
                                            <span class="input-group-addon"><b>@</b></span>
                                            <input type="text" class="form-control" placeholder="Your Email" name="new_mail" required/>
                                        </div>
										<div class="form-group input-group">
								
										  <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
										<select id="drop" class="form-control" name="new_role" required>
											<option>Role</option>
											<option>Doctor</option>
											<option>Nurse</option>
											<option>Pharmacist</option>
											<option>Laboratorist</option>
											
										</select>
										</div>
										 
										 <div class="form-group input-group">
                                            <span class="input-group-addon"><b>Q</b></span>
                                            <input type="text" class="form-control" placeholder="Your Qualification" name="new_qual" required/>
                                        </div>
										 <div class="form-group input-group">
                                            <span class="input-group-addon"><b>C</b></span>
                                            <input type="text" class="form-control" placeholder="Your Contact Number" name="new_con" required/>
                                        </div>
										 <input type="submit" class="btn btn-success " value="APPLY">
										
										
										
										
                                     
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
	
	
   
   
   
   