<?php
session_start();
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    
	
	
	
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

  
  
  
  
  
  
  
  <body >

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="Admin.php">ADMIN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="Admin.php">Admin Panel</a></li>
            <li><a href="../registeruser.php">Register users</a></li>
            <li><a href="../logout.php">LogOut</a></li>
			<li><a href="edit_account.php">Profile</a></li>
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
            <li class="active"><?php
                  $con=mysql_connect("localhost","root","");
                  mysql_select_db("hospital_management",$con);
                  $one=mysql_query("select picture from staff where job='admin'");
                  while($row=mysql_fetch_array($one))
                  {
                    echo '<img src="data:image/png;base64,' . base64_encode($row['picture']) . '" height="150px" width="150px"/>';
                  }

                  
                     ?>
      </li>
      
          </ul>
          
		  
		 <ul class="nav nav-sidebar">
      
      <ul class="nav nav-tabs nav-stacked">
        <li id="link1" class="active"><a data-toggle="tab" href="#Admin">Dashboard</a></li>
        <li id="link2" ><a data-toggle="tab" onclick="dept_list()" href="#AddDept">Department</a></li>
        <li id="link3"><a data-toggle="tab" onclick="doc_list()" href="#AddDoc">Doctor</a></li>
        <li id="link4"><a data-toggle="tab" onclick="patient_list()" href="#AddPatient">Patient</a></li>
        <li id="link5"><a data-toggle="tab" onclick="nurse_list()" href="#AddNurse">Nurse</a></li>
        <li id="link6"><a data-toggle="tab" onclick="staff_list()" href="#AddStaff">Staff</a></li>
        <li id="link8"><a data-toggle="tab" onclick="lab_list()" href="#AddLab">Laboratory</a></li>
        <li id="link10"><a data-toggle="tab" onclick="room_management()" href="#AddRoom">Room Management</a></li>
        <li id="link7"><a data-toggle="tab" onclick="billing()" href="#Billing">Billing</a></li>
        <li id="link9"><a data-toggle="tab" onclick="profile()">Profile</a></li>
      </ul>
      </ul> 
        </div>
    <!-- Side Nav Ends here -->
    
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
      
        <!-- Has 2 inactive links for FUTURE use -->
          <div class="table-responsive">
            <ul class="nav nav-pills" role="tablist" >
          <a onclick="nav_set(6)" data-toggle="tab" href="#AddStaff"><img src="images/Staff.jpeg" height="200px" width="250px" ></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
      <a onclick="nav_set(7)" data-toggle="tab" href="#"><img src="images/Accountant.jpeg" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
      <a onclick="nav_set(8)" data-toggle="tab" href="#AddLab"><img src="images/laboratory.gif" height="200px" width="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
      <a   onclick="profile()" data-toggle="tab" href="#AddProfile"><img src="images/Profile.jpeg" height="150px"></img></a>
        </ul>   
          </div>
      
        </div>
    
    <!--##################################################################################################################-->
    <!--Side Nav for Dept  -->
    <div id="AddDept" class="tab-pane fade">
            <h1 class="sub-header" >Manage Department</h1><br>
      
     <ul class="nav nav-pills">
        <li id="reset" class="active"><a data-toggle="tab"  href="#list_dept"><span class="glyphicon glyphicon-list"></span> Department List</a></li>
        <li><a data-toggle="tab" href="#add_dept"><span class="glyphicon glyphicon-plus"></span> Add Department</a></li>
        
    </ul>
  <div class="tab-content">
        <div id="list_dept" class="tab-pane fade in active">
           
    <label>Search: <input type="search" id="tags_dept" class="form-control" onblur="dept_hilight(this)"></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="dept_table_body">
             
                <tr>
        <form id="dept_form" method="POST">
                  <th>#</th>
                  <th>Department Name</th>
                  <th>HOD</th>
                  <th>No Of Employees</th>
          <th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
                  <input type="hidden" id="dept_hidden" name="dept_hidden"></input>
        </form>  
                  
                </tr>
                           
             
            </table>
          </div>
        </div>
    
    
        <div id="add_dept" class="tab-pane fade">
           <form class="form-signin" method="POST"  action="admin_add_dept.php">
        <h2 class="form-signin-heading">Add Department</h2>
    
    
        <input type="text"  name="dept_name" id="dept_name" class="form-control" placeholder="Department Name" required>
        <input type="text"  name="HOD" id="HOD" class="form-control" placeholder="Head Of Department" required>
        <!--<input type="number" name="employee" id="employee" class="form-control" placeholder="No of Employees" required>
        -->
        <br>
    <input type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="Add Department" ></input>
      </form>
        </div>
        
    </div>
      
      
        </div>
    
    <!--##################################################################################################################-->
    <!--Side Nav for Doctor  -->
    <div id="AddDoc" class="tab-pane fade">
            <h1 class="sub-header" >Manage Doctor</h1><br>
      
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_doc"><span class="glyphicon glyphicon-list"></span>  Doctor List</a></li>
        <li><a data-toggle="tab" href="#add_doc"><span class="glyphicon glyphicon-plus"></span>  Add Doctor</a></li>
        
    </ul>
  <div class="tab-content">
        <div id="list_doc" class="tab-pane fade in active">
           
    <label>Search: <input type="search" id="tags_doc" class="form-control" onblur="dept_hilight(this)" ></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="doc_table_body">
              
                <tr>
        <form id="doc_form" method="POST">
                  <th>#</th>
                  <th>Doctor Name</th>
                  <th>Doctor Age</th>
                  <th>Doctor Address</th>
                  <th>Department</th>
                  <th>Consultation Type</th>
          <th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
                  <input type="hidden" id="doc_hidden" name="doc_hidden"></input>
        </form> 
                </tr>
              
            </table>
          </div>
        </div>
        <div id="add_doc" class="tab-pane fade">
           <form class="form-signin" method="POST"  action="admin_add_doc.php" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Add Doctor</h2>
    
    
        <input type="text"  name="doc_name" class="form-control" placeholder="Name" required>
        <input type="file"  name="doc_pic" class="form-control" title="Doctors Picture" required>
        <input type="text"  name="doc_age" class="form-control" onkeypress="return isnum(event)" maxlength="3" placeholder="Age" required>
        <input type="email"  name="doc_email" class="form-control" placeholder="Email" required>
        <input type="file"  name="doc_qual" class="form-control" title="Upload Qualification" required>
        <input type="text"  name="doc_add" class="form-control" placeholder="Address" required>
        <input type="text"  name="doc_phone" class="form-control" onkeypress="return isnum(event)" maxlength="10" placeholder="Phone" required>
        <input type="text"  name="doc_sal" class="form-control" placeholder="Salary" onkeypress="return isnum(event)" maxlength="10" required>
        <input type="date"  name="doc_doj" class="form-control" placeholder="DOJ" required>
        <input type="time"  name="doc_start" class="form-control" placeholder="Shift Start Time" required>
        <input type="time"  name="doc_end" class="form-control" placeholder="Shift End Time" required>
        <input type="text"  name="doc_fees" class="form-control" onkeypress="return isnum(event)" maxlength="10" placeholder="Consultation Fees" required>
        <select id="drop1" name="doc_dept" class="form-control" required>
      <option disabled selected>Name Of Department</option>
      
      
    </select>
        <select id="drop2" name="doc_vtype" class="form-control" required>
      <option disabled selected>Consultation Type</option>
      <option>FT</option>
      <option>PT</option>
          
    </select>
    <br>
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Add Doctor" ></input>
      </form>
        </div>
        
    </div>
        </div>
    
    <!--##################################################################################################################-->
    <!--Side Nav for Patient  -->
    <div id="AddPatient" class="tab-pane fade">
            <h1 class="sub-header" >Manage Patient</h1><br>
      
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_patient"><span class="glyphicon glyphicon-list"></span>  Patient List</a></li>
        <li><a data-toggle="tab" href="#add_patient"><span class="glyphicon glyphicon-plus"></span>  Add Patient</a></li>
        
    </ul>
  <div class="tab-content">
        <div id="list_patient" class="tab-pane fade in active">
           
    <label>Search: <input type="search" id="tags_patient" class="form-control" onblur="dept_hilight(this)" ></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="patient_table_body">
              
                <tr>
        <form id="patient_form" method="POST">
                  <th>#</th>
                  <th>Patient Name</th>
                  <th>Age</th>
                  <th>Phone</th>
                  <th>Type</th>
                  <th>Room</th>
          <th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
                  <input type="hidden" id="patient_hidden" name="patient_hidden"></input>
        </form>
                </tr>
              
            </table>
          </div>

        </div>
        <div id="add_patient" class="tab-pane fade">
           <form class="form-signin" method="POST"  action="admin_add_pat.php" onsubmit="return check_room_details()" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Add Patient</h2>
    
    
        <input type="text"  name="pat_name" class="form-control" placeholder="Patient Name" required>
        <input type="text" name="pat_age" class="form-control" placeholder="Age" onkeypress="return isnum(event)" maxlength="3" required>
        <input type="email" name="pat_email" class="form-control" placeholder="Email" required>
        <select  name="pat_blood" class="form-control" required>
      <option disabled selected>Blood Group</option>
      <option>A+</option>
      <option>A-</option>
      <option>B+</option>
      <option>B-</option>
      <option>AB+</option>
      <option>AB-</option>
      <option>O+</option>
      <option>O-</option>
    </select>
        <input type="file"  name="pat_history" class="form-control" placeholder="History" title="Please Add Patient History" required>
        <input type="text"  name="pat_phone" class="form-control" placeholder="Phone" onkeypress="return isnum(event)" maxlength="10" required>
    <input type="text"  name="pat_add" class="form-control" placeholder="Address" required>
    <input type="date"  name="pat_admission" class="form-control" placeholder="Admission Date" title="Admission Date" required>
    
        <select id="drop1p" name="pat_type" class="form-control" title="Please Select Type of Patient" required>
      <option disabled selected>Type of Patient</option>
      <option>IP</option>
      <option>OP</option>
    </select>
      
    <select id="drop2p" name="pat_room" class="form-control" title="Room Type" onchange="fetch_room_details()" required>
      <option disabled selected>Room Type</option>
      
    </select>
    <input type="text"  id="room_number" name="room_number" class="form-control"  placeholder="Room Number" readonly>
    <input type="text"  id="room_cost" name="room_cost" class="form-control"  placeholder="Room Cost" readonly>
    <br>
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Add Patient" ></input>
      </form>
        </div>
        
    </div>
    
        </div>

    <!--##################################################################################################################-->   
    <!--Side Nav for Nurse  -->
    <div id="AddNurse" class="tab-pane fade">
            <h1 class="sub-header" >Manage Nurse</h1><br>
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_nurse"><span class="glyphicon glyphicon-list"></span>  Nurse List</a></li>
        <li><a data-toggle="tab" href="#add_nurse"><span class="glyphicon glyphicon-plus"></span>  Add Nurse</a></li>
        
    </ul>
  <div class="tab-content">
        <div id="list_nurse" class="tab-pane fade in active">
      <label>Search: <input type="search" id="tags_nurse" class="form-control" onblur="dept_hilight(this)" ></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="nurse_table_body">
              
                <tr>
        <form id="nurse_form" method="POST">
                  <th>#</th>
                  <th>Nurse Name</th>
                  <th>Nurse Age</th>
                  <th>Qualification</th>
                  <th>DOJ</th>
                  <th>Salary</th>
          <th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
                  <input type="hidden" id="nurse_hidden" name="nurse_hidden"></input>
        </form>
                </tr>
              
            </table>
          </div>
        </div>
        <div id="add_nurse" class="tab-pane fade">
      <form class="form-signin" method="POST"  action="admin_add_nurse.php" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Add Nurse</h2>
    
    
        <input type="text" name="nur_name"  class="form-control" placeholder="Nurse Name" required>
        <input type="file" name="nur_pic"  class="form-control" placeholder="Nurse Pic" title="Nurse Pic" required>
        <input type="text"  name="nur_age" class="form-control" placeholder="Age" onkeypress="return isnum(event)" maxlength="3" required>
        <input type="email"  name="nur_email" class="form-control" placeholder="Email" required>
        <input type="text" name="nur_qual" class="form-control" placeholder="Qualification" required>
        <select id="drop1n" name="nur_dept" class="form-control" required>
      <option disabled selected>Name Of Department</option>
      
      
    </select>
      <input type="date"  name="nur_doj" class="form-control" placeholder="DOJ" title="DOJ" required>
      <input type="text"  name="nur_sal" class="form-control" placeholder="Salary" onkeypress="return isnum(event)" maxlength="10" required>
        <br>
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Add Nurse" ></input>
      </form>
        </div>
        
    </div>
    
        </div>
    
    
    <!--##################################################################################################################-->
    <!--Side Nav for Staff  -->
    <div id="AddStaff" class="tab-pane fade">
            <h1 class="sub-header" >Manage Staff</h1><br>
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_staff"><span class="glyphicon glyphicon-list"></span>  Staff List</a></li>
        <li><a data-toggle="tab" href="#add_staff"><span class="glyphicon glyphicon-plus"></span>  Add Staff</a></li>
        
    </ul>
  <div class="tab-content">
        <div id="list_staff" class="tab-pane fade in active">
      <label>Search: <input type="search" id="tags_staff" class="form-control" onblur="dept_hilight(this)" ></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="staff_table_body">
              
                <tr>
        <form id="staff_form" method="POST">
                  <th>#</th>
                  <th>Staff Name</th>
                  <th>Age</th>
                  <th>Salary</th>
                  <th>Job</th>
                  <th>DOJ</th>
          <th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
                  <input type="hidden" id="staff_hidden" name="staff_hidden"></input>
        </form>
                </tr>
              
            </table>
          </div>
        </div>
        <div id="add_staff" class="tab-pane fade">
      <form class="form-signin" method="POST"  action="admin_add_staff.php" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Add Staff</h2>
    
    
        <input type="text" name="staff_name" class="form-control" placeholder="Staff Name" required>
        <input type="text" name="staff_age"  class="form-control" placeholder="Age" onkeypress="return isnum(event)" maxlength="3" required>
        <input type="email" name="staff_email"  class="form-control" placeholder="Email" required>
        <input type="text" name="staff_sal"  class="form-control" placeholder="Salary" onkeypress="return isnum(event)" maxlength="10" required>
        <input type="text" name="staff_add" class="form-control" placeholder="Address" required>
        <input type="text"  name="staff_job" class="form-control" placeholder="JOB" required>
        <input type="text"  name="staff_qual" class="form-control" placeholder="Qualification" required>
        <input type="file"  name="staff_pic" class="form-control" placeholder="Staffs Picture" title="Staffs Picture" required>
        <input type="time"  name="staff_start" class="form-control" placeholder="Start Shift Time" title="Start Shift Time" required>
        <input type="time"  name="staff_end" class="form-control" placeholder="End Shift Time" title="End Shift Time" required>
        
    <select id="drop1s" name="staff_dept" class="form-control" required>
      <option disabled selected>Name Of Department</option>
      
      
    </select>
    <input type="date"  name="staff_doj" class="form-control" placeholder="DOJ" required>
        <br>
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Add Staff" ></input>
      </form>
         </div>
        
    </div>
    
        </div>
    
    <!--##################################################################################################################-->
    <!-- Laboratory Nav tab -->
    
    
    <div id="AddLab" class="tab-pane fade">
            <h1 class="sub-header" >Manage Laboratory</h1><br>
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_lab"><span class="glyphicon glyphicon-list"></span>  Laboratory List</a></li>
        <li><a data-toggle="tab" href="#add_lab"><span class="glyphicon glyphicon-plus"></span>  Add Laboratory</a></li>
        
    </ul>
  <div class="tab-content">
        <div id="list_lab" class="tab-pane fade in active">
      <label>Search: <input type="search" id="tags_lab" class="form-control" onblur="dept_hilight(this)" ></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="lab_table_body">
              
                <tr>
        <form id="lab_form" method="POST">
                  <th>#</th>
                  <th>Lab Name</th>
                  <th>Head</th>
                  <th>Cost</th>
                  
          <th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
                  <input type="hidden" id="lab_hidden" name="lab_hidden"></input>
        </form>
                </tr>
              
            </table>
          </div>
        </div>
        <div id="add_lab" class="tab-pane fade">
      <form class="form-signin" method="POST"  action="admin_add_lab.php">
        <h2 class="form-signin-heading">Add Laboratory</h2>
    
    
        <input type="text" name="lab_name" class="form-control" placeholder="Lab Name" required>
        <select id="drop1c" name="lab_head" class="form-control" placeholder="Lab Head" required>
      <option disabled selected> Lab In Charge</option>
      
      
    </select>
    <select id="drop1l" name="lab_dept" class="form-control" required>
      <option disabled selected>Name Of Department</option>
      
      
    </select>
    <input type="text" name="lab_cost"  class="form-control" placeholder="Cost" onkeypress="return isnum(event)" maxlength="10" required>
        
        <br>
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Add Laboratory" ></input>
      </form>
         </div>
        
    </div>
    
        </div>
    
	<!--##################################################################################################################-->
    <!-- Billing nav tab -->
	
    <div id="Billing" class="tab-pane fade">
            <h1 class="sub-header" >Billing</h1><br>
			<form class="form-signin" method="POST"  action="change_bill_status.php">
			<select id="drop1b" name="doc_dept" class="form-control" onchange="display_patient_bill()" required>
				<option disabled selected>Patient ID</option>
      		</select>
			<br>
			<br>
			
            <table class="table table-striped" id="billing_table_body">
              
				  
            </table>
			<input type="hidden" id="hidden_bil" name="hidden_bil"></input>
            <input type="submit" name="submit" id="bil_submit" class="btn btn-lg btn-primary btn-block" value="Confirm payment" ></input>
			</form>
    
    </div>

	
	
	
    
    
    
    <!--##################################################################################################################-->
    <!-- Profile nav tab -->
    <div id="AddProfile" class="tab-pane fade">
            <h1 class="sub-header" >Manage Profile</h1><br>
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_profile"><span class="glyphicon glyphicon-wrench"></span>  Manage Profile</a></li>
        <li><a data-toggle="tab" href="#change_pass"><span class="glyphicon glyphicon-lock"></span>  Change Password</a></li>
        
    </ul>
    <div class="tab-content">
        <div id="list_profile" class="tab-pane fade in active">
      
          <div class="table-responsive">
            <form class="form-signin" method="POST"  action="UpdateAdmin.php">
        
    
    
        <input type="text"  class="form-control" name="user" placeholder="Admin" required>
        <input type="email"  class="form-control" name="email" placeholder="admin@admin.com" required>
        
        <br>
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Update Profile" ></input>
      </form>
          </div>
        </div>
        <div id="change_pass" class="tab-pane fade">
      <form class="form-signin" method="POST"  action="set_pass.php">
        
    
           
        <input type="password" id="inputPassword1" class="form-control" placeholder="Password" onblur="admin_pass(this)" required>
        <input type="password" name="newpass" id="inputPassword21" class="form-control" placeholder="New Password" required>
        
        <br>
    <input type="submit"  name="submit" class="btn btn-lg btn-primary btn-block" value="Update Password" ></input>
      </form>
        </div>
        
    </div>
    
        </div>


<!--##################################################################################################################-->
    <!-- Room Management nav tab -->
    <div id="AddRoom" class="tab-pane fade">
            <h1 class="sub-header" >Manage Rooms</h1><br>
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#modify_room"><span class="glyphicon glyphicon-wrench"></span>  Modify Rooms</a></li>
        <li><a data-toggle="tab" href="#add_room"><span class="glyphicon glyphicon-plus"></span>  Add Rooms</a></li>
        <li><a data-toggle="tab" href="#add_room_type"><span class="glyphicon glyphicon-plus"></span>  New Rooms Type</a></li>
        
    </ul>
    <div class="tab-content">
        <div id="modify_room" class="tab-pane fade in active">
      
          <div class="table-responsive">
            <form class="form-signin" method="POST"  action="manage_room.php">
        
    
    <select id="drop2r" name="manage_room_type" class="form-control" title="Room Type" onchange="manage_room_details()" required>
      <option disabled selected>Room Type</option>
      
    </select>
        <input type="text"  id="manage_current_cost" name="manage_current_cost" class="form-control" placeholder="Current Room Cost" readonly >
    <input type="text"  id="manage_new_cost" name="manage_new_cost" class="form-control" placeholder="New Room Cost" required>
        <br>
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Update Details" ></input>
      </form>
          </div>
        </div>
        <div id="add_room" class="tab-pane fade">
      <form class="form-signin" method="POST"  action="add_room.php">
        
    <select id="drop2r0" name="add_new_room" class="form-control" title="Room Type" required>
      <option disabled selected>Room Type</option>
      
    </select>
    
        <br>
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Add New Room" ></input>
      </form>
        </div>
    
    <div id="add_room_type" class="tab-pane fade">
      <form class="form-signin" method="POST"  action="add_room_type.php">
      
        <input type="text"  id="manage_new_type" name="manage_new_type" class="form-control" placeholder="New Room Type" onblur="check_conflict()" required><label id="label" style="color:red"></label>
        <input type="text"  id="manage_new_type_cost" name="manage_new_type_cost" class="form-control" placeholder="New Room Cost" required>
        <input type="text"  id="manage_new_type_capacity" name="manage_new_type_capacity" class="form-control" placeholder="New Room Capacity" required>
        <br>
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Add New Type" ></input>
      </form>
        </div>
        
    </div>
    
        </div>

<!--##################################################################################################################-->
    <!-- End of Nav functionality and follows the code for enabling the Modal action for Department details -->
    
    </div>
    
          
        </div>
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Department Details</h4>
      </div>
      <div class="modal-body" id="modal-body">
    <center>
    </center>
       
      </div>
      <div class="modal-footer">
        <label>Displaying Members Of The Selected Department</label>
      </div>
    </div>
  </div>
</div>


<!--##################################################################################################################-->
    <!-- Code for enabling the Modal action for Doctor details -->    
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel1">Doctor Qualification Details</h4>
      </div>
      <div class="modal-body" id="modal-body1">
    <center>
    </center>
       
      </div>
      <div class="modal-footer">
        <label>Displaying Qualification Of The Selected Doctor</label>
      </div>
    </div>
  </div>
</div>



<!--##################################################################################################################-->
    <!-- Code for enabling the Modal action for Patient details -->
    
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel2">Patient's History</h4>
      </div>
      <div class="modal-body" id="modal-body2">
    <center>
    </center>
       
      </div>
      <div class="modal-footer">
        <label>Displaying History Of The Selected Patient</label>
      </div>
    </div>
  </div>
</div>    
      

<!--##################################################################################################################-->
                  <!-- End of Code for enabling the Modal action -->      
     
     
      
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  function profile(){
  
  window.location="https://www.hospital.dev/admin/edit_account.php";
  
  }

  </script>
  <script type="text/javascript">
  
  var global_bill_count=0;
  
  
  
  function billing()
  {
	global_bill_count++;
	<?php include ('billing_patient.php');?>
	pat_billing=document.getElementById("drop1b");
	var sub_bil_but=document.getElementById("bil_submit");
	sub_bil_but.style.display="none";
	
	search_bill_patient=String(<?php echo json_encode($patient_ids);?>);
	search_bill_patient_array=search_bill_patient.split(",");
	if(global_bill_count==1)
	{
	for(i=0;i<search_bill_patient_array.length-1;i++)
	{	
    var opt=search_bill_patient_array[i];
    var el=document.createElement("option");
    el.textContent=opt;
    el.value=opt;
    pat_billing.appendChild(el);
	}
	}
  }
  
  function display_patient_bill()
  {
  
		var pat_sel=document.getElementById("drop1b").value;
		var billing_table_body_rows1=document.getElementById("billing_table_body");
		billing_table_body_rows1.innerHTML="";
		var xhr= new XMLHttpRequest();
		xhr.onreadystatechange= function(){
		if(xhr.readyState==4 && xhr.status==200)
		{
        return_data=xhr.responseText;
		bill_array=return_data.split(",");
		//alert(bill_array);
        
        //alert(return_data);
		for(i=0;i<2;i++)
		{
        var billing_table_body_rows=document.getElementById("billing_table_body");
		if(i==0)
		{
		var row = billing_table_body_rows.insertRow(0);
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		var cell6 = row.insertCell(5);
		var cell7 = row.insertCell(6);
		var cell8 = row.insertCell(7);
        
        cell1.innerHTML="Pharma Cost";
        cell2.innerHTML="Lab Cost";
		cell3.innerHTML="Consultation Fees";
		cell4.innerHTML="Operation Cost";
		cell5.innerHTML="Canteen";
		cell6.innerHTML="Room Charge";
		cell7.innerHTML="Tax";
		cell8.innerHTML="Total";
		cell8.style.color="red";
		      
		}
		else
		{
		var row = billing_table_body_rows.insertRow(1);
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		var cell6 = row.insertCell(5);
		var cell7 = row.insertCell(6);
		var cell8 = row.insertCell(7);
        
        cell1.innerHTML=bill_array[0];
		cell2.innerHTML=bill_array[1];
		cell3.innerHTML=bill_array[2];
		cell4.innerHTML=bill_array[3];
		cell5.innerHTML=bill_array[4];
		cell6.innerHTML=bill_array[5];
		cell7.innerHTML=bill_array[6];
		cell8.innerHTML=bill_array[7];
		cell8.style.color="red";
		}
        }
		var hid_bil=document.getElementById("hidden_bil");
		hid_bil.value=bill_array[8];
		var sub_bil_but=document.getElementById("bil_submit");
		sub_bil_but.style.display="block";
		}
      
  }
	xhr.open("GET","fetch_bill_details.php?patient_id="+pat_sel, true);
	xhr.send();
	  /*mod_serial_num=serial_num+1;
	  name_element=capital(name_element1);
	  hod_element=capital(hod_element1);
	  var dept_table_body_rows=document.getElementById("dept_table_body");
	  var row = dept_table_body_rows.insertRow(mod_serial_num);
	  
	  //div1.innerHTML="Vinay";
	  row.onclick=display;
	  //var form_dept=document.createElement("form");
	  var remove_dept=document.createElement("a");
	  remove_dept.id="remove_dept";
	  remove_dept.name="remove_dept";
	  remove_dept.onclick=remove_dept_rows;
	  remove_dept.innerHTML="Remove";
	  //form_dept.appendChild(remove_dept);
	  row.id=name_element1;
	  var cell1 = row.insertCell(0);
	  var cell2 = row.insertCell(1);
	  var cell3 = row.insertCell(2);
	  var cell4 = row.insertCell(3);
	  var cell5 = row.insertCell(4);
	  
	  
	  cell1.innerHTML=mod_serial_num;
	  cell2.innerHTML=name_element;
	  cell3.innerHTML=hod_element;
	  cell4.innerHTML=number_element;
	  cell5.appendChild(remove_dept);*/
	  
  }
  
  
  
  //This is a JavaScript function to allow prohibits the entry of alphabets and symbols in number fields(Ex:Salary,age,phone)
  function isnum(evt)
      {
      evt=(evt)?evt:window.event;
      var charCode=(evt.which)?evt.which:evt.keyCode;
      if(charCode>31 && (charCode<48 || charCode>57))
      {
      return false;
      }
      return true;
      }

  //This is a JavaScript function to facilitate the modal action to show all details of the members of the department selected
  
  function display(event)
  {
    var display_dep_selected=event.currentTarget.childNodes[1].innerHTML;
    var display_modal_body=document.getElementById("modal-body");
    var fc=display_modal_body.firstChild;
    while(fc)
    {
      display_modal_body.removeChild(fc);
      fc=display_modal_body.firstChild;
    }
    event.currentTarget.setAttribute("data-toggle", "modal");
    event.currentTarget.setAttribute("data-target", "#myModal");
  
    
  
    var xhr= new XMLHttpRequest();
    xhr.onreadystatechange= function(){
    if(xhr.readyState==4 && xhr.status==200)
      {
        return_data=xhr.responseText;
        data=return_data.split("~");
        data_length=data.length-1;
  //      alert(data_length);
  //      alert(data);
        
        for(i=0;i<data_length;i++)
        {
          flag_modal=0;
        if(i==0)
        {
          flag_modal=2;
          temp_modal2=document.createElement("p");
          display_modal_body.appendChild(temp_modal2);
        }
        if(data[i]=="DOCTORS"||data[i]=="LABORATORY"||data[i]=="NURSE"||data[i]=="STAFF")
        { 
          flag_modal=1;
          temp_modal0=document.createElement("p");
          display_modal_body.appendChild(temp_modal0);
        }
        var new_label=document.createElement("label");
        if(flag_modal==1)
        {
          new_label.style.color="red";
          new_label.style.fontSize="16px";
          new_label.style.fontFamily="Broadway";
          new_label.style.textDecoration="underline";
        }
        
        else if(flag_modal==2)
        {
          new_label.style.color="green";
          new_label.style.fontSize="18px";
          new_label.style.fontFamily="Algerian";
        }
        
        
        new_label.innerHTML=data[i];
        display_modal_body.appendChild(new_label);
        if(flag_modal==0)
        {
          temp_modal_inter=document.createElement("p");
          display_modal_body.appendChild(temp_modal_inter);
        }
        if(flag_modal>0)
        {
          temp_modal1=document.createElement("p");
          display_modal_body.appendChild(temp_modal1);
        }
        
        }
        
      }
      
  }
  xhr.open("GET","display_div.php?dept_name="+display_dep_selected, true);
  xhr.send();
  }
  
  
//This is a JavaScript function to display in the form of modal the qualifications of the doctor that has been selected 
  
  function display_doc_modal(event)
  {
    var display_doc_selected=event.currentTarget.childNodes[1].innerHTML;
    var display_modal_body=document.getElementById("modal-body1");
    var fc=display_modal_body.firstChild;
    while(fc)
    {
      display_modal_body.removeChild(fc);
      fc=display_modal_body.firstChild;
    }
    event.currentTarget.setAttribute("data-toggle", "modal");
    event.currentTarget.setAttribute("data-target", "#myModal1");
  
  
  
    selected_doc_label=document.createElement("label");
    temp_modal2=document.createElement("p");
    display_modal_body.appendChild(temp_modal2);
    selected_doc_label.style.color="green";
    selected_doc_label.style.fontSize="18px";
    selected_doc_label.style.fontFamily="Algerian";
    selected_doc_label.innerHTML="Doctor "+display_doc_selected;
    display_modal_body.appendChild(selected_doc_label);
    temp_modal2=document.createElement("p");
    display_modal_body.appendChild(temp_modal2);
    
    
  
    var xhr= new XMLHttpRequest();
    xhr.onreadystatechange= function(){
    if(xhr.readyState==4 && xhr.status==200)
      {
        return_data=xhr.responseText;
        
        //alert(return_data);
        
        
        var new_label=document.createElement("pre");
        new_label.style.fontFamily="Verdana";
        
        
        new_label.innerHTML=return_data;
        display_modal_body.appendChild(new_label);
        
        
      }
      
  }
  xhr.open("GET","display_div_doc.php?doc_name="+display_doc_selected, true);
  xhr.send();
  }
  
  
  //This is a JavaScript function to display in the form of modal the history of the patient under consideration
  
  function display_patient_modal(event)
  {
    var display_patient_selected=event.currentTarget.childNodes[1].innerHTML;
    var display_modal_body=document.getElementById("modal-body2");
    var fc=display_modal_body.firstChild;
    while(fc)
    {
      display_modal_body.removeChild(fc);
      fc=display_modal_body.firstChild;
    }
    event.currentTarget.setAttribute("data-toggle", "modal");
    event.currentTarget.setAttribute("data-target", "#myModal2");
  
  
  
    selected_patient_label=document.createElement("label");
    temp_modal2=document.createElement("p");
    display_modal_body.appendChild(temp_modal2);
    selected_patient_label.style.color="green";
    selected_patient_label.style.fontSize="18px";
    selected_patient_label.style.fontFamily="Algerian";
    selected_patient_label.innerHTML=display_patient_selected;
    display_modal_body.appendChild(selected_patient_label);
    temp_modal2=document.createElement("p");
    display_modal_body.appendChild(temp_modal2);
    
    
  
    var xhr= new XMLHttpRequest();
    xhr.onreadystatechange= function(){
    if(xhr.readyState==4 && xhr.status==200)
      {
        return_data=xhr.responseText;
        
        //alert(return_data);
        
        
        var new_label=document.createElement("pre");
        new_label.style.fontFamily="Verdana";
        
        
        new_label.innerHTML=return_data;
        display_modal_body.appendChild(new_label);
        
        
      }
      
  }
  xhr.open("GET","display_div_patient.php?patient_name="+display_patient_selected, true);
  xhr.send();
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  //This variable helps the function conflict_check() to resolve the conflicts whenever a new room type is to be added
  var return_flag;
  
  
  //Auto Complete/Search Functionality Starts here
  
  //JQuery Function for DEPT AutoComplete
  $(function() {
    $.ajax({
       data: { q: $("#tags_dept").val()},
     url:"AutoComplete/forDept.php",
     type:"post",
     dataType:'json',
     success:function(html){
         $("#tags_dept").autocomplete({
            position: {offset: "0 -10px"},
            source: html
         });
     },
   

    });

});

//JQuery Function for DOC AutoComplete
  $(function() {
    $.ajax({
       data: { q: $("#tags_doc").val()},
     url:"AutoComplete/forDoc.php",
     type:"post",
     dataType:'json',
     success:function(html){
       $("#tags_doc").autocomplete({
        position: {offset: "0 -10px"},
        source: html
       });
     },
     

    });

  });
    
//JQuery Function for PATIENT AutoComplete
  $(function() {
    $.ajax({
       data: { q: $("#tags_patient").val()},
     url:"AutoComplete/forPatient.php",
     type:"post",
     dataType:'json',
     success:function(html){
       $("#tags_patient").autocomplete({
        position: {offset: "0 -10px"},
        source: html
       });
     },
     

    });

  });
    
    
//JQuery Function for NURSE AutoComplete  
  $(function() {
    $.ajax({
       data: { q: $("#tags_nurse").val()},
     url:"AutoComplete/forNurse.php",
     type:"post",
     dataType:'json',
     success:function(html){
       $("#tags_nurse").autocomplete({
        position: {offset: "0 -10px"},
        source: html
       });
     },
     

    });

  });
  


//JQuery Function for STAFF AutoComplete
  $(function() {
    $.ajax({
       data: { q: $("#tags_staff").val()},
     url:"AutoComplete/forStaff.php",
     type:"post",
     dataType:'json',
     success:function(html){
       $("#tags_staff").autocomplete({
        position: {offset: "0 -10px"},
        source: html
       });
     },
     

    });

  });
    


//JQuery Function for LAB AutoComplete
  $(function() {
    $.ajax({
       data: { q: $("#tags_lab").val()},
     url:"AutoComplete/forLab.php",
     type:"post",
     dataType:'json',
     success:function(html){
       $("#tags_lab").autocomplete({
        position: {offset: "0 -10px"},
        source: html
       });
     },
     

    });

  });
    
  
  
//End of Auto Complete/Search Functionality 
  
  
//This is a JavaScript function to check for the password when the admin wants to change the current password 
  function admin_pass(id1)
  {
    <?php include ('admin_pass.php');?>
    password=String(<?php echo json_encode($result1);?>);
    if(id1.value!=password)
    {
      id1.value="";
      alert("Incorrect Password");
    }
  }
  
  
//These are the JavaScript variables to disable reloading the contents from the unchanged database and hence make the process faster  
  var global_dept_count=0;
  var global_doc_count=0;
  var global_patient_count=0;
  var global_nurse_count=0;
  var global_staff_count=0;
  var global_lab_count=0;
  var global_room_count=0;
  
//This is a JavaScript function to facilitate the highlighting a nav-tab when ever it is been selected
  
  function nav_set(number)
  {
    if(number==2)
      dept_list();
    else if(number==3)
      doc_list();
    else if(number==4)
      patient_list();
    else if(number==5)
      nurse_list();
    else if(number==6)
      staff_list();
    else if(number==8)
      lab_list();
  var link_no="link"+number;
  a=document.getElementById("link1");
  b=document.getElementById(link_no);
  b.className="active";
  a.className="";
  }
  
  //This is a JavaScript function to Dynamically generate the Department List from the database
  function dept_list()
  {
    
  //Including PHP/Database Interaction for Department 
  <?php include ('admin_manage_db.php');?>
  global_dept_count++;
  
  if(global_dept_count==1)
  {
  count_of_depts=String(<?php echo json_encode($count_depts);?>);
  
  dept_name=String(<?php echo json_encode($search_dept_name);?>);
    dept_hod=String(<?php echo json_encode($search_dept_hod);?>) ;     
    dept_emp_num=String(<?php echo json_encode($search_number);?>);
  
  
  dept_name_array=dept_name.split(",");
    dept_hod_array=dept_hod.split(",");
    dept_emp_num_array=dept_emp_num.split(",");
  
  
  for(i=0;i<count_of_depts;i++)
  {
    foo(i,dept_name_array[i],dept_hod_array[i],dept_emp_num_array[i]);
    }
  
  }
  }
  
  
  //This is a JavaScript function to generate the table dynamically and to fill the contents of its cells with relevant data
  function foo(serial_num,name_element1,hod_element1,number_element)
  {
  mod_serial_num=serial_num+1;
  name_element=capital(name_element1);
  hod_element=capital(hod_element1);
  var dept_table_body_rows=document.getElementById("dept_table_body");
  var row = dept_table_body_rows.insertRow(mod_serial_num);
  
  //div1.innerHTML="Vinay";
  row.onclick=display;
  //var form_dept=document.createElement("form");
  var remove_dept=document.createElement("a");
  remove_dept.id="remove_dept";
  remove_dept.name="remove_dept";
  remove_dept.onclick=remove_dept_rows;
  remove_dept.innerHTML="Remove";
  //form_dept.appendChild(remove_dept);
  row.id=name_element1;
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  
  
  cell1.innerHTML=mod_serial_num;
  cell2.innerHTML=name_element;
  cell3.innerHTML=hod_element;
  cell4.innerHTML=number_element;
  cell5.appendChild(remove_dept);
  
  }
  
  
  
  
  //This is a JavaScript function for Capitalizing the first character
  function capital(a)
  {
  ne=a.charAt(0).toUpperCase() + a.substring(1);
  return ne;
  }
  
  //This is a JavaScript function to Dynamically generate the Doctors List form the database
  function doc_list()
  {
    //Including PHP/Database Interaction for Doctor
  <?php include ('admin_manage_db1.php');?>
  global_doc_count++;
  if(global_doc_count==1)
  {
  count_of_docs=String(<?php echo json_encode($count_docs);?>);
  
  doc_name=String(<?php echo json_encode($search_doc_name);?>);
    doc_age=String(<?php echo json_encode($search_doc_age);?>) ;     
    v_type=String(<?php echo json_encode($search_v_type);?>);
  dept_doc_name=String(<?php echo json_encode($search_dept_name1);?>);
  doc_address=String(<?php echo json_encode($search_doc_address);?>);
  search_depts=String(<?php echo json_encode($search_depts);?>);

  
  doc_name_array=doc_name.split(",");
    doc_age_array=doc_age.split(",");
    v_type_array=v_type.split(",");
    dept_doc_name_array=dept_doc_name.split(",");
    doc_address_array=doc_address.split("$~,");
    search_depts_array=search_depts.split(",");
  for(i=0;i<search_depts_array.length;i++)
  {
      search_depts_array[i]=capital(search_depts_array[i]);
  } 
  
  for(i=0;i<count_of_docs;i++)
  {
    foo1(i,doc_name_array[i],doc_age_array[i],v_type_array[i],dept_doc_name_array[i],doc_address_array[i]);
    }
  var select=document.getElementById("drop1");
  
  for(i=0;i<search_depts_array.length;i++)
  {
    var opt=search_depts_array[i];
    var el=document.createElement("option");
    el.textContent=opt;
    el.value=opt;
    select.appendChild(el);
  }
  }
  }
  
  //This is a JavaScript function to generate the table dynamically and to fill the contents of its cells with relevant data
  function foo1(serial_num,name_element1,age_element,vtype_element1,depdoc_element1,docadd_element1)
  {
  mod_serial_num=serial_num+1;
  name_element=capital(name_element1);
  vtype_element=capital(vtype_element1);
  depdoc_element=capital(depdoc_element1);
  docadd_element=capital(docadd_element1);
  var doc_table_body_rows=document.getElementById("doc_table_body");
  var row = doc_table_body_rows.insertRow(mod_serial_num);
  
  row.onclick=display_doc_modal;
  
  var remove_doc=document.createElement("a");
  remove_doc.id="remove_doc";
  remove_doc.name="remove_doc";
  remove_doc.onclick=remove_doc_rows;
  remove_doc.innerHTML="Remove";
  row.id=name_element1;
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);
  var cell7 = row.insertCell(6);
  
  
  cell1.innerHTML=mod_serial_num;
  cell2.innerHTML=name_element;
  cell3.innerHTML=age_element;
  cell4.innerHTML=docadd_element;
  cell5.innerHTML=depdoc_element;
  cell6.innerHTML=vtype_element;
  cell7.appendChild(remove_doc);
  }
  
  
  
  
  
  
  
//This is a JavaScript function to Dynamically generate the Patient List from the database  
  function patient_list()
  {
  //Including PHP/Database Interaction for Patient  
  <?php include ('admin_manage_db2.php');?>
  global_patient_count++;
  if(global_patient_count==1)
  {
  count_of_patient=String(<?php echo json_encode($count_patient);?>);
  
  patient_name=String(<?php echo json_encode($search_patient_name);?>);
    patient_age=String(<?php echo json_encode($search_patient_age);?>) ;     
    patient_phno=String(<?php echo json_encode($search_patient_phno);?>);
  patient_type=String(<?php echo json_encode($search_patient_type);?>);
  patient_roomno=String(<?php echo json_encode($search_patient_roomno);?>);
  search_rooms=String(<?php echo json_encode($search_rooms);?>);
  
  patient_name_array=patient_name.split(",");
    patient_age_array=patient_age.split(",");
    patient_phno_array=patient_phno.split(",");
    patient_type_array=patient_type.split(",");
    patient_roomno_array=patient_roomno.split(",");
  search_rooms_array=search_rooms.split(",");
  
  for(i=0;i<count_of_patient;i++)
  {
    foo2(i,patient_name_array[i],patient_age_array[i],patient_phno_array[i],patient_type_array[i],patient_roomno_array[i]);
    }
  
  var select=document.getElementById("drop2p");
  
  for(i=0;i<search_rooms_array.length;i++)
  {
    var opt=search_rooms_array[i];
    var el=document.createElement("option");
    el.textContent=opt;
    el.value=opt;
    select.appendChild(el);
  }
  
  }
  }
  
  //This is a JavaScript function to generate the table dynamically and to fill the contents of its cells with relevant data
  function foo2(serial_num,name_element1,age_element,phno_element,type_element1,roomno_element)
  {
  
  mod_serial_num=serial_num+1;
  name_element=capital(name_element1);
  type_element=capital(type_element1);
  
  var patient_table_body_rows=document.getElementById("patient_table_body");
  var row = patient_table_body_rows.insertRow(mod_serial_num);
  
  row.onclick=display_patient_modal;
  
  var remove_patient=document.createElement("a");
  remove_patient.id="remove_patient";
  remove_patient.name="remove_patient";
  remove_patient.onclick=remove_patient_rows;
  remove_patient.innerHTML="Remove";
  row.id=name_element1;
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);
  var cell7 = row.insertCell(6);
  
  
  cell1.innerHTML=mod_serial_num;
  cell2.innerHTML=name_element;
  cell3.innerHTML=age_element;
  cell4.innerHTML=phno_element;
  cell5.innerHTML=type_element;
  cell6.innerHTML=roomno_element;
  cell7.appendChild(remove_patient);
  } 
  
  
  
  
//This is a JavaScript function to Dynamically generate the Nurse List from the database
  function nurse_list()
  {
  //Including PHP/Database Interaction for Nurse
  <?php include ('admin_manage_db3.php');?>
  global_nurse_count++;
  if(global_nurse_count==1)
  {
  count_of_nurse=String(<?php echo json_encode($count_nurse);?>);
  
  nurse_name=String(<?php echo json_encode($search_nurse_name);?>);
    nurse_age=String(<?php echo json_encode($search_nurse_age);?>) ;     
    nurse_qualification=String(<?php echo json_encode($search_nurse_qualification);?>);
  nurse_doj=String(<?php echo json_encode($search_nurse_doj);?>);
  nurse_salary=String(<?php echo json_encode($search_nurse_salary);?>);
  search_depts=String(<?php echo json_encode($search_depts);?>);
  
  nurse_name_array=nurse_name.split(",");
    nurse_age_array=nurse_age.split(",");
    nurse_qualification_array=nurse_qualification.split(",");
    nurse_doj_array=nurse_doj.split(",");
    nurse_salary_array=nurse_salary.split(",");
  search_depts_array=search_depts.split(",");
  for(i=0;i<search_depts_array.length;i++)
  {
      search_depts_array[i]=capital(search_depts_array[i]);
  }
  
  for(i=0;i<count_of_nurse;i++)
  {
    foo3(i,nurse_name_array[i],nurse_age_array[i],nurse_qualification_array[i],nurse_doj_array[i],nurse_salary_array[i]);
    }
  var select=document.getElementById("drop1n");
  
  for(i=0;i<search_depts_array.length;i++)
  {
    var opt=search_depts_array[i];
    var el=document.createElement("option");
    el.textContent=opt;
    el.value=opt;
    select.appendChild(el);
  }
  }
  }
  
  //This is a JavaScript function to generate the table dynamically and to fill the contents of its cells with relevant data
  function foo3(serial_num,name_element1,age_element,qual_element1,doj_element,salary_element)
  {
  
  mod_serial_num=serial_num+1;
  name_element=capital(name_element1);
  qual_element=capital(qual_element1);
  
  var nurse_table_body_rows=document.getElementById("nurse_table_body");
  var row = nurse_table_body_rows.insertRow(mod_serial_num);
  var remove_nurse=document.createElement("a");
  remove_nurse.id="remove_nurse";
  remove_nurse.name="remove_nurse";
  remove_nurse.onclick=remove_nurse_rows;
  remove_nurse.innerHTML="Remove";
  row.id=name_element1;
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);
  var cell7 = row.insertCell(6);
  
  
  cell1.innerHTML=mod_serial_num;
  cell2.innerHTML=name_element;
  cell3.innerHTML=age_element;
  cell4.innerHTML=qual_element;
  cell5.innerHTML=doj_element;
  cell6.innerHTML=salary_element;
  cell7.appendChild(remove_nurse);
  } 
  
  
  
  //This is a JavaScript function to Dynamically generate the Staff List from the database
  function staff_list()
  {
  //Including PHP/Database Interaction for Staff  
  <?php include ('admin_manage_db4.php');?>
  global_staff_count++;
  if(global_staff_count==1)
  {
  count_of_staff=String(<?php echo json_encode($count_staff);?>);
  
  staff_name=String(<?php echo json_encode($search_staff_name);?>);
    staff_age=String(<?php echo json_encode($search_staff_age);?>) ;     
    staff_salary=String(<?php echo json_encode($search_staff_salary);?>);
  staff_job=String(<?php echo json_encode($search_staff_job);?>);
  staff_doj=String(<?php echo json_encode($search_staff_doj);?>);
  search_depts=String(<?php echo json_encode($search_depts);?>);
  
  
  staff_name_array=staff_name.split(",");
    staff_age_array=staff_age.split(",");
    staff_salary_array=staff_salary.split(",");
  staff_job_array=staff_job.split(",");
    staff_doj_array=staff_doj.split(",");
    search_depts_array=search_depts.split(",");
   
  for(i=0;i<search_depts_array.length;i++)
  {
      search_depts_array[i]=capital(search_depts_array[i]);
  }
  
  
  
  for(i=0;i<count_of_staff;i++)
  {
    foo4(i,staff_name_array[i],staff_age_array[i],staff_job_array[i],staff_doj_array[i],staff_salary_array[i]);
    }
  var select=document.getElementById("drop1s");
  
  for(i=0;i<search_depts_array.length;i++)
  {
    var opt=search_depts_array[i];
    var el=document.createElement("option");
    el.textContent=opt;
    el.value=opt;
    select.appendChild(el);
  }
  
  
  
  }
  }
  
  //This is a JavaScript function to generate the table dynamically and to fill the contents of its cells with relevant data
  function foo4(serial_num,name_element1,age_element,job_element1,doj_element,salary_element)
  {
  
  mod_serial_num=serial_num+1;
  name_element=capital(name_element1);
  job_element=capital(job_element1);
  
  var staff_table_body_rows=document.getElementById("staff_table_body");
  var row = staff_table_body_rows.insertRow(mod_serial_num);
  var remove_staff=document.createElement("a");
  remove_staff.id="remove_staff";
  remove_staff.name="remove_staff";
  remove_staff.onclick=remove_staff_rows;
  remove_staff.innerHTML="Remove";
  row.id=name_element1;
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);
  var cell7 = row.insertCell(6);
  
  
  cell1.innerHTML=mod_serial_num;
  cell2.innerHTML=name_element;
  cell3.innerHTML=age_element;
  cell4.innerHTML=salary_element;
  cell5.innerHTML=job_element;
  cell6.innerHTML=doj_element;
  cell7.appendChild(remove_staff);
  }




//This is a JavaScript function to Dynamically generate the Laboratory List from the database
  function lab_list()
  {
  //Including PHP/Database Interaction for Laboratory 
  <?php include ('admin_manage_db5.php');?>
  global_lab_count++;
  if(global_lab_count==1)
  {
  count_of_lab=String(<?php echo json_encode($count_lab);?>);
  
  lab_name=String(<?php echo json_encode($search_lab_name);?>);
    lab_head=String(<?php echo json_encode($search_lab_head);?>) ;     
    lab_cost=String(<?php echo json_encode($search_lab_cost);?>);
  
  search_depts=String(<?php echo json_encode($search_depts);?>);
  incharge=String(<?php echo json_encode($incharge);?>);
  
  
  lab_name_array=lab_name.split(",");
    lab_head_array=lab_head.split(",");
    lab_cost_array=lab_cost.split(",");
  search_depts_array=search_depts.split(",");
   incharge_array=incharge.split(",");
  
  for(i=0;i<search_depts_array.length;i++)
  {
      search_depts_array[i]=capital(search_depts_array[i]);
  }
  
  
  
  for(i=0;i<count_of_lab;i++)
  {
    foo5(i,lab_name_array[i],lab_head_array[i],lab_cost_array[i]);
    }
  var select=document.getElementById("drop1l");
  
  for(i=0;i<search_depts_array.length;i++)
  {
    var opt=search_depts_array[i];
    var el=document.createElement("option");
    el.textContent=opt;
    el.value=opt;
    select.appendChild(el);
  }
  
  var select1=document.getElementById("drop1c");
  
  for(i=0;i<incharge_array.length;i++)
  {
    var opt=incharge_array[i];
    var el=document.createElement("option");
    el.textContent=opt;
    el.value=opt;
    select1.appendChild(el);
  }
  
  }
  }
  
  //This is a JavaScript function to generate the table dynamically and to fill the contents of its cells with relevant data
  function foo5(serial_num,name_element1,head_element1,cost_element)
  {
  
  mod_serial_num=serial_num+1;
  name_element=capital(name_element1);
  head_element=capital(head_element1);
  
  var lab_table_body_rows=document.getElementById("lab_table_body");
  var row = lab_table_body_rows.insertRow(mod_serial_num);
  var remove_lab=document.createElement("a");
  remove_lab.id="remove_lab";
  remove_lab.name="remove_lab";
  remove_lab.onclick=remove_lab_rows;
  remove_lab.innerHTML="Remove";
  row.id=name_element1;
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  
  
  cell1.innerHTML=mod_serial_num;
  cell2.innerHTML=name_element;
  cell3.innerHTML=head_element;
  cell4.innerHTML=cost_element;
  cell5.appendChild(remove_lab);
  } 
  
  
  //This is a JavaScript function to delete a selected row of a table just by a click and reload the page as the database has been changed
    function remove_dept_rows(event)
  { 
    
    var selected_dept_row=event.currentTarget;
    var child_nodes=selected_dept_row.parentNode.parentNode.childNodes;
    var small_dept_name=smaller(child_nodes[1].innerHTML);
    var dept_hidden=document.getElementById("dept_hidden");
    dept_hidden.value=small_dept_name;
    var dept_form=document.getElementById("dept_form");
    dept_form.action="remove_dept.php";
    dept_form.submit();

    
  }
  
  //This is a JavaScript function to delete a selected row of a table just by a click and reload the page as the database has been changed
  function remove_doc_rows(event)
  { 
    
    var selected_doc_row=event.currentTarget;
    var child_nodes=selected_doc_row.parentNode.parentNode.childNodes;
    var small_doc_name=smaller(child_nodes[1].innerHTML);
    var doc_hidden=document.getElementById("doc_hidden");
    doc_hidden.value=small_doc_name;
    var doc_form=document.getElementById("doc_form");
    doc_form.action="remove_doc.php";
    doc_form.submit();

    
  }
  
  //This is a JavaScript function to delete a selected row of a table just by a click and reload the page as the database has been changed
  function remove_patient_rows(event)
  { 
    
    var selected_patient_row=event.currentTarget;
    var child_nodes=selected_patient_row.parentNode.parentNode.childNodes;
    var small_patient_name=smaller(child_nodes[1].innerHTML);
    var patient_hidden=document.getElementById("patient_hidden");
    patient_hidden.value=small_patient_name;
    var patient_form=document.getElementById("patient_form");
    patient_form.action="remove_patient.php";
    patient_form.submit();

    
  }
  
  //This is a JavaScript function to delete a selected row of a table just by a click and reload the page as the database has been changed
  function remove_nurse_rows(event)
  { 
    
    var selected_nurse_row=event.currentTarget;
    var child_nodes=selected_nurse_row.parentNode.parentNode.childNodes;
    var small_nurse_name=smaller(child_nodes[1].innerHTML);
    var nurse_hidden=document.getElementById("nurse_hidden");
    nurse_hidden.value=small_nurse_name;
    var nurse_form=document.getElementById("nurse_form");
    nurse_form.action="remove_nurse.php";
    nurse_form.submit();

    
  }
  
  //This is a JavaScript function to delete a selected row of a table just by a click and reload the page as the database has been changed
  function remove_staff_rows(event)
  { 
    
    var selected_staff_row=event.currentTarget;
    var child_nodes=selected_staff_row.parentNode.parentNode.childNodes;
    var small_staff_name=smaller(child_nodes[1].innerHTML);
    var staff_hidden=document.getElementById("staff_hidden");
    staff_hidden.value=small_staff_name;
    var staff_form=document.getElementById("staff_form");
    staff_form.action="remove_staff.php";
    staff_form.submit();

    
  }
  
  //This is a JavaScript function to delete a selected row of a table just by a click and reload the page as the database has been changed
  function remove_lab_rows(event)
  { 
    
    var selected_lab_row=event.currentTarget;
    
    var child_nodes=selected_lab_row.parentNode.parentNode.childNodes;
    
    var small_lab_name=smaller(child_nodes[1].innerHTML);
    
    var lab_hidden=document.getElementById("lab_hidden");
    
    lab_hidden.value=small_lab_name;
    
    var lab_form=document.getElementById("lab_form");
    
    lab_form.action="remove_lab.php";
    
    lab_form.submit();
    

    
  }
  
  //This is a JavaScript function to convert the characters of a string to lowercase
  function smaller(temp)
  {
    return(temp.toLowerCase());
  } 
  
  //This is a JavaScript function to facilitate the management of the rooms of the hospital
  function room_management()
  {
  <?php include ('fetch_room_types.php');?>
  global_room_count++;
  if(global_room_count==1)
  {
  search_manage_rooms=String(<?php echo json_encode($search_manage_rooms);?>);
  search_manage_rooms_array=search_manage_rooms.split(",");
  var select=document.getElementById("drop2r");
  var select0=document.getElementById("drop2r0");
  
  for(i=0;i<search_manage_rooms_array.length;i++)
  {
    var opt=search_manage_rooms_array[i];
    if(opt!="NA")
    {
    var el=document.createElement("option");
    el.textContent=opt;
    el.value=opt;
    select.appendChild(el);
    }
  }
  for(i=0;i<search_manage_rooms_array.length;i++)
  {
    var opt=search_manage_rooms_array[i];
    if(opt!="NA")
    {
    var el=document.createElement("option");
    el.textContent=opt;
    el.value=opt;
    select0.appendChild(el);
    }
  }
  
  var label_for_conflict=document.getElementById("label");
  label_for_conflict.style.display="none";
  
  }
  }
  
  //This is a JavaScript function to fetch all the details of a particular type of the room that has been selected
  room_detail_status="true";
  function fetch_room_details()
  {
    room_type=document.getElementById("drop2p").value;
  
    var xhr= new XMLHttpRequest();
    xhr.onreadystatechange= function(){
    if(xhr.readyState==4 && xhr.status==200)
      { 
        return_room=xhr.responseText;
        room=return_room.split(",");
        room_cost=document.getElementById("room_cost");
        room_cost.value=room[0];
        room_number=document.getElementById("room_number");
        room_number.value=room[1];
        room_detail_status=room[2];
      }
      }
    xhr.open("GET","room_details_fetch.php?room_type="+room_type, true);
    xhr.send();
  }
  
  //This is JavaScript function to prevent the addition of a room type that already exists  
  function check_conflict()
  {
  new_room_type=document.getElementById("manage_new_type").value;
  
    var xhr= new XMLHttpRequest();
    xhr.onreadystatechange= function(){
    if(xhr.readyState==4 && xhr.status==200)
      { 
        return_flag=xhr.responseText;
        if(return_flag==1)
        {   var label_for_conflict=document.getElementById("label");
          label_for_conflict.innerHTML="This Type Already Exists!!"
          label_for_conflict.style.color="red";
          label_for_conflict.style.display="block";
          var type_modify_element=document.getElementById("manage_new_type");
          type_modify_element.value="";
          type_modify_element.focus();
          setTimeout(function(){
          label_for_conflict.innerHTML="Try A Different One!!";
          label_for_conflict.style.color="green";
          },1000);
        }
        else if(return_flag==0)
        {   var label_for_conflict=document.getElementById("label");
          label_for_conflict.style.display="none";
        }
          
      }
      }
    xhr.open("GET","conflict_check.php?room_type="+new_room_type, true);
    xhr.send();
  
  }
  
  
  //This is a JavaScript function to provide Admin with the authority to change the cost of the currently existing room types
  function manage_room_details()
  {
    manage_room_type=document.getElementById("drop2r").value;
  
    var xhr= new XMLHttpRequest();
    xhr.onreadystatechange= function(){
    if(xhr.readyState==4 && xhr.status==200)
      { 
        manage_return_room=xhr.responseText;
        room_old_cost=document.getElementById("manage_current_cost");
        room_old_cost.value=manage_return_room;
        //room_number=document.getElementById("room_number");
        //room_number.value=room[1];
        //room_detail_status=room[2];
      }
      }
    xhr.open("GET","for_managing_type.php?room_type="+manage_room_type, true);
    xhr.send();
  }
  
  
  //This is a JavaScript function to check where there are any vacant positions in the room type that has been selected
  function check_room_details()
  {
    if(room_detail_status=="false")
    {
      alert("Please Select an Available Room!!");
      return false;
    }
    else
    {
      //alert("Success");
      return true;
    }   
  }

  //These are the JavaScript variables and a function which help in the highlighting the searched Department OR Doctor OR Patient OR Nurse OR Staff 
  var global_previous_selection="";
  var global_previous_color="";
  function dept_hilight(id)
  {
  if(document.getElementById(id.value)==null)
  {
  alert("Sorry "+id.value +" doesn't exists");
  global_previous_selection.style.backgroundColor=global_previous_color;
  }
  
  else
  {
  //location.href="#id.value";
  //document.getElementById("dept_table_body").style.backgroundColor="red";
  //alert(id.value);
  if(global_previous_selection=="")
  {
      global_previous_selection=document.getElementById(id.value);
      global_previous_color=document.getElementById(id.value).style.backgroundColor;
  
  //alert(document.getElementById(id.value).parentNode.childNodes[0].childNodes.innerHTML);
      var selected_to_hilight=document.getElementById(id.value);
      selected_to_hilight.style.backgroundColor="yellow";
  }
  
  else
  {
    global_previous_selection.style.backgroundColor=global_previous_color;
    global_previous_selection=document.getElementById(id.value);
    global_previous_color=global_previous_selection .style.backgroundColor;
    var selected_to_hilight=document.getElementById(id.value);
    selected_to_hilight.style.backgroundColor="yellow";
  }
  }
  }
  
  //#################################################End of the Complete JavaScript Code here###########################################
  </script>
  </body>
</html>
      