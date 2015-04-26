<?php 

    
   
     if(empty($_SESSION['user']))
    { 
        
        header("Location: ../login.php"); 
         
        
        
        die("Redirecting to login.php"); 
    } 
 
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
	<link rel="shortcut icon" href="images/logo.png" type="imag/icon"/>
    
    <title>ADMIN Dashboard for HM</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="dashboard.css" rel="stylesheet">

    
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    
	
	
	
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


	<style type="text/css">
	#size
	{
	width:100px;
	height:150px;
	}
	
	.form-signin
	{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
    }

	.form-signin .form-signin-heading,
    .form-signin .checkbox 
	{
     margin-bottom: 10px;
    }
  
   .form-signin .checkbox
   {
    font-weight: normal;
   }
   
   .form-signin .form-control 
   {
    position: relative;
    height: auto;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 10px;
    font-size: 16px;
   }
   
   .form-signin .form-control:focus 
   {
    z-index: 2;
   }
   
   
	</style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ADMIN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="Admin.html">Admin Panel</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="logout.php">LogOut</a></li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          
		  
		  <ul class="nav nav-sidebar">
            <li class="active"><img src="images/IMG_20140720_173513.png" height="150px" width="150px"></li>
          </ul>
          
		  
		  <ul class="nav nav-sidebar">
		  
			<ul class="nav nav-tabs nav-stacked">
				<li id="link1" class="active"><a data-toggle="tab" href="#Admin">Dashboard</a></li>
				<li id="link2" ><a data-toggle="tab" href="#AddDept">Department</a></li>
				<li id="link3"><a data-toggle="tab" href="#AddDoc">Doctor</a></li>
				<li id="link4"><a data-toggle="tab" href="#AddPatient">Patient</a></li>
				<li id="link5"><a data-toggle="tab" href="#AddNurse">Nurse</a></li>
				<li id="link6"><a data-toggle="tab" href="#AddPharmacist">Pharmacist</a></li>
				<li id="link7"><a data-toggle="tab" href="#">Accountant</a></li>
				<li id="link8"><a data-toggle="tab" href="#">Settings</a></li>
				<li id="link9"><a data-toggle="tab" href="#">Profile</a></li>
			</ul>
		  </ul>	
        </div>
		
		
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
		<div class="tab-content">
        <div id="Admin" class="tab-pane fade in active">
            <h1 class="page-header">Admin Dashboard</h1>
			<div class="table-responsive">
				<ul class="nav nav-pills" role="tablist" >
			  <a onclick="nav_set(2)" data-toggle="tab" href="#AddDept"><img src="images/Department.jpeg" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			  <a onclick="nav_set(3)" data-toggle="tab" href="#AddDoc"><img src="images/Doctor1.jpeg" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
			  <a onclick="nav_set(4)" data-toggle="tab" href="#AddPatient"><img src="images/Patient.jpeg" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			  <a onclick="nav_set(5)" data-toggle="tab" href="#AddNurse"><img src="images/Nurse.png" height="200px"></img></a>
			  <br><br>
				</ul>  
			</div>
			
		    <!-- Has 3 inactive links for FUTURE use -->
          <div class="table-responsive">
            <ul class="nav nav-pills" role="tablist" >
          <a onclick="nav_set(6)" data-toggle="tab" href="#AddPharmacist"><img src="images/Pharmacy.jpeg" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
		  <a  data-toggle="tab" href="#"><img src="images/Accountant.jpeg" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
		  <a  data-toggle="tab" href="#"><img src="images/Bolt.png" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
		  <a  data-toggle="tab" href="#"><img src="images/Profile.jpeg" height="150px"></img></a>
    		</ul>   
          </div>
		  
        </div>
		<div id="AddDept" class="tab-pane fade">
            <h1 class="sub-header" >Manage Department</h1><br>
		  
		 <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_dept"><span class="glyphicon glyphicon-th-list"></span> Department List</a></li>
        <li><a data-toggle="tab" href="#add_dept"><span class="glyphicon glyphicon-plus"></span> Add Department</a></li>
        
    </ul>
	<div class="tab-content">
        <div id="list_dept" class="tab-pane fade in active">
           
		<label>Search: <input type="search" class="form-control"></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Department Name</th>
                  <th>Description</th>
                  
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Cardiology</td>
                  <td>This Dept provides medical care to patients who have<br> problems with their heart or circulation</td>
                  
                </tr>
				
				<tr>
                  <td>2</td>
                  <td>Neurology</td>
                  <td>This Dept deals with the disorders of the Nervous System<br> including the brain and spinal cord</td>
                  
                </tr>
				
				<tr>
                  <td>3</td>
                  <td>Pharmacy</td>
                  <td>This Dept is responsible for the drub based services<br> including purchase, supply and distribution of medicine</td>
                  
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
        <div id="add_dept" class="tab-pane fade">
           <form class="form-signin" method="POST"  action="Admin.html">
        <h2 class="form-signin-heading">Add Department</h2>
		
		
        <input type="text"  class="form-control" placeholder="Department Name" >
        <input type="textarea"  class="form-control" placeholder="Department Description" >
        
        <br>
		<input type="submit" class="btn btn-lg btn-primary btn-block" value="Add Department" ></input>
      </form>
        </div>
        
    </div>
			
		  
        </div>
		<div id="AddDoc" class="tab-pane fade">
            <h1 class="sub-header" >Manage Doctor</h1><br>
		  
		  <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_doc"><span class="glyphicon glyphicon-th-list"></span>  Doctor List</a></li>
        <li><a data-toggle="tab" href="#add_doc"><span class="glyphicon glyphicon-plus"></span>  Add Doctor</a></li>
        
    </ul>
	<div class="tab-content">
        <div id="list_doc" class="tab-pane fade in active">
           
		<label>Search: <input type="search" class="form-control"></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Doctor Name</th>
                  <th>Department</th>
                  <th>Consultation Type</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Doctor 1</td>
                  <td>Cardiology</td>
                  <td>Part Time</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Doctor 2</td>
                  <td>Neurology</td>
                  <td>Part Time</td>
                  
                </tr>
                <tr>
                  <td>3</td>
                  <td>Doctor 3</td>
                  <td>Cardiology</td>
                  <td>Full Time</td>
                
                </tr>
                <tr>
                  <td>4</td>
                  <td>Doctor 4</td>
                  <td>Pharmacy</td>
                  <td>Full Time</td>
                
                </tr>
                <tr>
                  <td>5</td>
                  <td>Doctor 5</td>
                  <td>Neurology</td>
                  <td>Full Time</td>
                
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
        <div id="add_doc" class="tab-pane fade">
           <form class="form-signin" method="POST"  action="Admin.html">
        <h2 class="form-signin-heading">Add Doctor</h2>
		
		
        <input type="text"  class="form-control" placeholder="Name" >
        <input type="email"  class="form-control" placeholder="Email" >
        <input type="text"  class="form-control" placeholder="Address" >
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" >
        <input type="text"  class="form-control" placeholder="Phone" >
        <select id="drop1" class="form-control">
			<option>Name Of Department</option>
			<option>Cardiology</option>
			<option>Neurology</option>
			<option>Pharmacy</option>
			
		</select>
        <select id="drop2" class="form-control">
			<option>Consultation Type</option>
			<option>Full Time</option>
			<option>Part Time</option>
					
		</select>
		<br>
		<input type="submit" class="btn btn-lg btn-primary btn-block" value="Add Doctor" ></input>
      </form>
        </div>
        
    </div>
        </div>
		<div id="AddPatient" class="tab-pane fade">
            <h1 class="sub-header" >Manage Patient</h1><br>
		  
		  <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_patient"><span class="glyphicon glyphicon-th-list"></span>  Patient List</a></li>
        <li><a data-toggle="tab" href="#add_patient"><span class="glyphicon glyphicon-plus"></span>  Add Patient</a></li>
        
    </ul>
	<div class="tab-content">
        <div id="list_patient" class="tab-pane fade in active">
           
		<label>Search: <input type="search" class="form-control"></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Patient Name</th>
                  <th>Age</th>
                  <th>Sex</th>
                  <th>Blood Group</th>
                  <th>Birth Date</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Lincoln Burrows</td>
                  <td>lincoln@hospitalmanagement.com</td>
                  <td>Male </td>
                  <td>998745213 </td>
                  <td>23-09-1994 </td>
                </tr>
				<tr>
                  <td>2</td>
                  <td>Alex Mahone</td>
                  <td>alex@hospitalmanagement.com</td>
                  <td>Male</td>
                  <td>998745213 </td>
                  <td>23-09-1994 </td>
                </tr>
                
              </tbody>
            </table>
          </div>

        </div>
        <div id="add_patient" class="tab-pane fade">
           <form class="form-signin" method="POST"  action="Admin.html">
        <h2 class="form-signin-heading">Add Patient</h2>
		
		
        <input type="text"  class="form-control" placeholder="Patient Name" >
        <input type="email"  class="form-control" placeholder="Email" >
        <input type="password"  class="form-control" placeholder="Password" >
        <input type="text"  class="form-control" placeholder="Address" >
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" >
        <input type="text"  class="form-control" placeholder="Phone" >
        <select id="drop1" class="form-control">
			<option>Sex</option>
			<option>Male</option>
			<option>Female</option>
		</select>
		<input type="date"  class="form-control" placeholder="Birth Date" >
		<input type="text"  class="form-control" placeholder="Age" >
		<select id="drop2" class="form-control">
			<option>Blood Type</option>
			<option>A+</option>
			<option>A-</option>
			<option>B+</option>
			<option>B-</option>
			<option>AB+</option>
			<option>AB-</option>
			<option>O+</option>
			<option>O-</option>
		</select>
		<br>
		<input type="submit" class="btn btn-lg btn-primary btn-block" value="Add Patient" ></input>
      </form>
        </div>
        
    </div>
		
        </div>
		<div id="AddNurse" class="tab-pane fade">
            <h1 class="sub-header" >Manage Nurse</h1><br>
		  <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_nurse"><span class="glyphicon glyphicon-th-list"></span>  Nurse List</a></li>
        <li><a data-toggle="tab" href="#add_nurse"><span class="glyphicon glyphicon-plus"></span>  Add Nurse</a></li>
        
    </ul>
	<div class="tab-content">
        <div id="list_nurse" class="tab-pane fade in active">
		  <label>Search: <input type="search" class="form-control"></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nurse Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Alley Divine</td>
                  <td>alley@hospitalmanagement.com</td>
                  <td>6th floor, Baker Field, Stockholmes </td>
                  <td>865231479 </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
        <div id="add_nurse" class="tab-pane fade">
		  <form class="form-signin" method="POST"  action="Admin.html">
        <h2 class="form-signin-heading">Add Nurse</h2>
		
		
        <input type="text"  class="form-control" placeholder="Nurse Name" >
        <input type="email"  class="form-control" placeholder="Email" >
        <input type="text"  class="form-control" placeholder="Address" >
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" >
        <input type="text"  class="form-control" placeholder="Phone" >
        <br>
		<input type="submit" class="btn btn-lg btn-primary btn-block" value="Add Nurse" ></input>
      </form>
        </div>
        
    </div>
		
        </div>
		<div id="AddPharmacist" class="tab-pane fade">
            <h1 class="sub-header" >Manage Pharmacist</h1><br>
		  <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_pharmacist"><span class="glyphicon glyphicon-th-list"></span>  Pharmacist List</a></li>
        <li><a data-toggle="tab" href="#add_pharmacist"><span class="glyphicon glyphicon-plus"></span>  Add Pharmacist</a></li>
        
    </ul>
	<div class="tab-content">
        <div id="list_pharmacist" class="tab-pane fade in active">
		  <label>Search: <input type="search" class="form-control"></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Pharmacist Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Micheal Scorfield</td>
                  <td>micheal@hospitalmanagement.com</td>
                  <td>8th floor, SD Park, NewYork </td>
                  <td>9785463218 </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
        <div id="add_pharmacist" class="tab-pane fade">
		  <form class="form-signin" method="POST"  action="Admin.html">
        <h2 class="form-signin-heading">Add Pharmacist</h2>
		
		
        <input type="text"  class="form-control" placeholder="Pharmacist Name" >
        <input type="email"  class="form-control" placeholder="Email" >
        <input type="text"  class="form-control" placeholder="Address" >
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" >
        <input type="text"  class="form-control" placeholder="Phone" >
        <br>
		<input type="submit" class="btn btn-lg btn-primary btn-block" value="Add Pharmacist" ></input>
      </form>
         </div>
        
    </div>
		
        </div>
		
		  
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
	<script type="text/javascript">
	function nav_set(number)
	{
	var link_no="link"+number;
	a=document.getElementById("link1");
	b=document.getElementById(link_no);
	b.className="active";
	a.className="";
	}
	</script>
  </body>
</html>
			