<!--?php
session_start();
if(empty($_SESSION['user'])) 
{ 

header("Location: ../login.php"); 



die("Redirecting to login.php"); 
} 
?-->
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
	<link rel="shortcut icon" href="images/logo.png" type="imag/icon"/>
    
    <title>Laboratory</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="dashboard.css" rel="stylesheet">

    
    
    
	
	
	
	<!--This is to Enable Tabbing Action-->
		<link rel="stylesheet" href="dist/css/bootstrap-theme.min.css">
		<script src="jquery-1.11.2.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<style type="text/css">
			{
				.bs-example
				margin: 20px;
	     	}
		</style>	
	<!--Ends Tabbing Action-->

    <!--Additional CSS design to  style forms and buttons--> 
	<style type="text/css">
	#background
    {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-image: url('images/back_img.png');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100%;
		opacity: 0.8;
		filter:alpha(opacity=80);
	}
	#size
	{
	width:100px;
	height:150px;
	}
	
	.form-signin
	{
    max-width: 500px;
    padding: 10px;
    margin: 0 auto;
	
    }

	.form-signin .form-signin-heading
	{
     margin-bottom: 8px;
	 font-size: 16px;
	 font-weight : bold;
	// text-align : left;
    }
	.details
	{
		position :  absolute;
		left : 20px;
		top : 100px;
		
	
	}
  
   
   .form-signin .form-control 
   {
    position: relative;
    height: 36px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 10px;
    font-size: 16px;
   }
   
    
   
    .form-signin .result
	{
		width : 500px;
		height : 300px;
	}
   
   .form-signin .form-control:focus 
   {
    z-index: 1;
	height :36px;
   }
   /*date place holder*/
   input[type="date"]:before {
    content: attr(placeholder);
    color: #aaa;
  }

  input[type="date"]:focus:before, input[type="date"]:valid:before {
    content: "";
  }
  /*time place holder*/
  input[type="time"]:before {
    content: attr(placeholder);
    color: #aaa;
  }

  input[type="time"]:focus:before, input[type="time"]:valid:before {
    content: "";
  }
   
   
	</style>
	
	<script type="text/javascript">
	
	
	var global_lab_count=0;
	
	//function to display the name of the lab head along the lab name.
	
	function lab_page()
	{
		document.getElementById("result_lab").style.display = 'none';
		document.getElementById("list_lab").style.display = 'block';
		document.getElementById("welcome_div").style.display = 'block';
		document.getElementById("background").style.display = 'block';
		//Including PHP/Database Interaction for Department	
		<?php include ('lab_details.php');?>
		//creating header dynamicalyy
		
		div_id = document.getElementById("lab");
		header = document.getElementById("header");
		welcome = document.getElementById("welcome");
		
		if(header.childNodes.length == 0)
		{
					
			lab_name = String(<?php echo json_encode($lab_name);?>);
			text = document.createTextNode("LABORATORY - "+lab_name);     // Create a text node
			header.appendChild(text);    
			
			
		}
		if(welcome.childNodes.length == 0)
		{
						
			head_name = String(<?php echo json_encode($head_name);?>);
			text = document.createTextNode("LAB HEAD : "+head_name);     // Create a text node
			welcome.appendChild(text);    
			
			
		}
		
		
	}
	
	
	
	
	
	//function to swap the two div
	function swap()
	{
		document.getElementById("result_lab").style.display = 'block';
		document.getElementById("list_lab").style.display = 'none';
		document.getElementById("welcome_div").style.display = 'none';
		document.getElementById("background").style.display = 'none';
		date = document.getElementById("date");
		date.style.fontSize = "26px";
		var d = new Date();
		d = d.toDateString(); 
		//alert(d);
		date.innerHTML = d;

	}
	</script>

 </head>

  
  
  
  
  
  
  
  <body onload="lab_page()"  >
  <div id="background"></div>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="laboratory.php">LABORATORY</a>
        </div>
		
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            
            <li><a href="../logout.php">LogOut</a></li>
          </ul>
          
        </div>
      </div>
    </nav>
<!-- Top Nav Bar Ends here -->

<!-- Side Nav Bar Code starts here -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          
		  
		  <ul class="nav nav-sidebar">
            <!--li class="active"><img src="images/IMG_20140720_173513.png" height="150px" width="150px"></li-->
          	<li class="active" id="img">
          		<!--?php include('lab_details.php'); ?-->
          		<img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" />

          	</li>
          </ul>
          <ul class="nav nav-sidebar">
		  
			<ul class="nav nav-tabs nav-stacked">
				<li id="link1" class="active"><a data-toggle="tab" onclick="lab_page()" >LAB PAGE</a></li>
				<li id="link2" ><a data-toggle="tab" onclick="swap()" >LAB REPORT</a></li>
				
				
			</ul>
		  </ul>	
		  
		  
        </div>
		<!-- Side Nav Ends here -->
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
			<div class="tab-content">
				<div id="lab" class="tab-pane fade in active">
					<h1 class="page-header" id ="header" ></h1><br>
					<h2 class = "page-header" id ="welcome"></h2>
					<div id="welcome_div"><h2 class = "page-header" id ="welcome2">Welcome !!!</h2></div>
					
					<!-- Has 2 inactive links for FUTURE use -->
				
				</div>
		
      
	
				<div class="tab-content">
					<div id="list_lab" class="tab-pane fade in active">
					  
					  <!-- add here  in lab_page-->
						
						
					</div>
				</div>
	  
	  
				<div class="tab-content">
					<div id="result_lab" class="tab-pane fade in active">
					
						<form class="form-signin" method="POST"  action="store_result_lab.php">
							<!-- div for details -->
							<div class="details"  >
							<br><br><br><br>
							<h3 class="form-signin-heading">DETAILS :</h3>
							<!--input type="text"   name="lab_id" id="lab_id" class="form-control" placeholder="Enter the Lab ID" required-->
							<input type="text" name="patient_id" id="patient_id" class="form-control" placeholder="Enter the Patient ID" required>
							<br>
							<label class ="form-signin-heading">DATE : </label>
							<div id="date"  ></div>
							
					</div>
					
					 
					 <h2 class="form-signin-heading">RESULT OF THE TEST</h2>
					
					<textarea   name="result_test" class="result" id="result_test" cols="15" rows="20"  placeholder="Enter the Result of the Test" required></textarea>
					
					<br>
				   
					<input type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="DONE" ></input>
				</form>
			
			</div>
		</div>
	
	
	</div>  
  </div>
	
	
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery-1.11.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	
  </body>
</html>
			