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
            <li><a href="#">Profile</a></li>
            <li><a href="Login.html">LogOut</a></li>
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
            <li class="active"><img src="images/IMG_20140720_173513.png" height="150px" width="150px"></li>
          </ul>
          
		  
		  <ul class="nav nav-sidebar">
		  
			<ul class="nav nav-tabs nav-stacked">
				<li id="link1" class="active"><a data-toggle="tab" href="#Admin">Dashboard</a></li>
				<li id="link2" ><a data-toggle="tab" onclick="dept_list()" href="#AddDept">Department</a></li>
				<li id="link3"><a data-toggle="tab" onclick="doc_list()" href="#AddDoc">Doctor</a></li>
				<li id="link4"><a data-toggle="tab" onclick="patient_list()" href="#AddPatient">Patient</a></li>
				<li id="link5"><a data-toggle="tab" onclick="nurse_list()" href="#AddNurse">Nurse</a></li>
				<li id="link6"><a data-toggle="tab" onclick="staff_list()" href="#AddStaff">Staff</a></li>
				<li id="link7"><a data-toggle="tab" href="#">Billing</a></li>
				<li id="link8"><a data-toggle="tab" href="#">Settings</a></li>
				<li id="link9"><a data-toggle="tab" href="#AddProfile">Profile</a></li>
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
		  <a  data-toggle="tab" href="#"><img src="images/Accountant.jpeg" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
		  <a  data-toggle="tab" href="#"><img src="images/Bolt.png" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
		  <a   onclick="nav_set(9)" data-toggle="tab" href="#AddProfile"><img src="images/Profile.jpeg" height="150px"></img></a>
    		</ul>   
          </div>
		  
        </div>
		<!--Side Nav for Dept  -->
		<div id="AddDept" class="tab-pane fade">
            <h1 class="sub-header" >Manage Department</h1><br>
		  
		 <ul class="nav nav-pills">
        <li id="reset" class="active"><a data-toggle="tab"  href="#list_dept"><span class="glyphicon glyphicon-list"></span> Department List</a></li>
        <li><a data-toggle="tab" href="#add_dept"><span class="glyphicon glyphicon-plus"></span> Add Department</a></li>
        
    </ul>
	<div class="tab-content">
        <div id="list_dept" class="tab-pane fade in active">
           
		<label>Search: <input type="search" class="form-control"></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="dept_table_body">
             
                <tr>
                  <th>#</th>
                  <th>Department Name</th>
                  <th>HOD</th>
                  <th>No Of Employees</th>
				  <th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
                  
                  
                </tr>
        		               
             
            </table>
          </div>
        </div>
		
		
        <div id="add_dept" class="tab-pane fade">
           <form class="form-signin" method="POST"  action="admin_add_dept.php">
        <h2 class="form-signin-heading">Add Department</h2>
		
		
        <input type="text"  name="dept_name" id="dept_name" class="form-control" placeholder="Department Name" required>
        <input type="text"  name="HOD" id="HOD" class="form-control" placeholder="Head Of Department" required>
        <input type="number" name="employee" id="employee" class="form-control" placeholder="No of Employees" required>
        
        <br>
		<input type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="Add Department" ></input>
      </form>
        </div>
        
    </div>
			
		  
        </div>
		<!--Side Nav for Doctor  -->
		<div id="AddDoc" class="tab-pane fade">
            <h1 class="sub-header" >Manage Doctor</h1><br>
		  
		  <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_doc"><span class="glyphicon glyphicon-list"></span>  Doctor List</a></li>
        <li><a data-toggle="tab" href="#add_doc"><span class="glyphicon glyphicon-plus"></span>  Add Doctor</a></li>
        
    </ul>
	<div class="tab-content">
        <div id="list_doc" class="tab-pane fade in active">
           
		<label>Search: <input type="search" class="form-control"></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="doc_table_body">
              
                <tr>
                  <th>#</th>
                  <th>Doctor Name</th>
                  <th>Doctor Age</th>
                  <th>Doctor Qualification</th>
                  <th>Department</th>
                  <th>Consultation Type</th>
				  <th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
                  
                </tr>
              
            </table>
          </div>
        </div>
        <div id="add_doc" class="tab-pane fade">
           <form class="form-signin" method="POST"  action="admin_add_doc.php">
        <h2 class="form-signin-heading">Add Doctor</h2>
		
		
        <input type="text"  name="doc_name" class="form-control" placeholder="Name" required>
        <input type="number"  name="doc_age" class="form-control" placeholder="Age" required>
        <input type="text"  name="doc_qual" class="form-control" placeholder="Qualification" required>
        <input type="text"  name="doc_add" class="form-control" placeholder="Address" required>
        <!-- What About Password??? <input type="password" id="inputPassword" class="form-control" placeholder="Password" >-->
        <input type="number"  name="doc_phone" class="form-control" placeholder="Phone" required>
        <input type="number"  name="doc_sal" class="form-control" placeholder="Salary" required>
        <input type="date"  name="doc_doj" class="form-control" placeholder="DOJ" required>
        <select id="drop1" name="doc_dept" class="form-control" required>
			<option>Name Of Department</option>
			
			
		</select>
        <select id="drop2" name="doc_vtype" class="form-control" required>
			<option>Consultation Type</option>
			<option>FT</option>
			<option>PT</option>
					
		</select>
		<br>
		<input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Add Doctor" ></input>
      </form>
        </div>
        
    </div>
        </div>
		<!--Side Nav for Patient  -->
		<div id="AddPatient" class="tab-pane fade">
            <h1 class="sub-header" >Manage Patient</h1><br>
		  
		  <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_patient"><span class="glyphicon glyphicon-list"></span>  Patient List</a></li>
        <li><a data-toggle="tab" href="#add_patient"><span class="glyphicon glyphicon-plus"></span>  Add Patient</a></li>
        
    </ul>
	<div class="tab-content">
        <div id="list_patient" class="tab-pane fade in active">
           
		<label>Search: <input type="search" class="form-control"></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="patient_table_body">
              
                <tr>
                  <th>#</th>
                  <th>Patient Name</th>
                  <th>Age</th>
                  <th>Phone</th>
                  <th>Type</th>
                  <th>Room</th>
				  <th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
                  
                </tr>
              
            </table>
          </div>

        </div>
        <div id="add_patient" class="tab-pane fade">
           <form class="form-signin" method="POST"  action="admin_add_pat.php">
        <h2 class="form-signin-heading">Add Patient</h2>
		
		
        <input type="text"  name="pat_name" class="form-control" placeholder="Patient Name" >
        <input type="number" name="pat_age" class="form-control" placeholder="Age" >
        <input type="file"  name="pat_history" class="form-control" placeholder="History" title="Please Add Patient History" >
        <input type="text"  name="pat_phone" class="form-control" placeholder="Phone" >
		<input type="text"  name="pat_add" class="form-control" placeholder="Address" >
		<input type="text"  name="pat_pref" class="form-control" placeholder="Preference" >
        
        <select id="drop1p" name="pat_type" class="form-control">
			<option>Type</option>
			<option>IP</option>
			<option>OP</option>
		</select>
			
		<select id="drop2p" name="pat_room" class="form-control">
			<option>Room No</option>
		</select>
		<br>
		<input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Add Patient" ></input>
      </form>
        </div>
        
    </div>
		
        </div>
		
		<!--Side Nav for Nurse  -->
		<div id="AddNurse" class="tab-pane fade">
            <h1 class="sub-header" >Manage Nurse</h1><br>
		  <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_nurse"><span class="glyphicon glyphicon-list"></span>  Nurse List</a></li>
        <li><a data-toggle="tab" href="#add_nurse"><span class="glyphicon glyphicon-plus"></span>  Add Nurse</a></li>
        
    </ul>
	<div class="tab-content">
        <div id="list_nurse" class="tab-pane fade in active">
		  <label>Search: <input type="search" class="form-control"></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="nurse_table_body">
              
                <tr>
                  <th>#</th>
                  <th>Nurse Name</th>
                  <th>Nurse Age</th>
                  <th>Qualification</th>
                  <th>DOJ</th>
                  <th>Salary</th>
				  <th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
                  
                </tr>
              
            </table>
          </div>
        </div>
        <div id="add_nurse" class="tab-pane fade">
		  <form class="form-signin" method="POST"  action="admin_add_nurse.php">
        <h2 class="form-signin-heading">Add Nurse</h2>
		
		
        <input type="text" name="nur_name"  class="form-control" placeholder="Nurse Name" required>
        <input type="number"  name="nur_age" class="form-control" placeholder="Age" required>
        <input type="text" name="nur_qual" class="form-control" placeholder="Qualification" required>
        <select id="drop1n" name="nur_dept" class="form-control" required>
			<option>Name Of Department</option>
			
			
		</select>
      <input type="date"  name="nur_doj" class="form-control" placeholder="DOJ" required>
      <input type="number"  name="nur_sal" class="form-control" placeholder="Salary" required>
        <br>
		<input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Add Nurse" ></input>
      </form>
        </div>
        
    </div>
		
        </div>
		<!--Side Nav for Staff  -->
		<div id="AddStaff" class="tab-pane fade">
            <h1 class="sub-header" >Manage Staff</h1><br>
		  <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_staff"><span class="glyphicon glyphicon-list"></span>  Staff List</a></li>
        <li><a data-toggle="tab" href="#add_staff"><span class="glyphicon glyphicon-plus"></span>  Add Staff</a></li>
        
    </ul>
	<div class="tab-content">
        <div id="list_staff" class="tab-pane fade in active">
		  <label>Search: <input type="search" class="form-control"></input></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="staff_table_body">
              
                <tr>
                  <th>#</th>
                  <th>Staff Name</th>
                  <th>Age</th>
                  <th>Salary</th>
                  <th>Job</th>
                  <th>DOJ</th>
				  <th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
                  
                </tr>
              
            </table>
          </div>
        </div>
        <div id="add_staff" class="tab-pane fade">
		  <form class="form-signin" method="POST"  action="admin_add_staff.php">
        <h2 class="form-signin-heading">Add Staff</h2>
		
		
        <input type="text" name="staff_name" class="form-control" placeholder="Staff Name" required>
        <input type="number" name="staff_age"  class="form-control" placeholder="Age" required>
        <input type="number" name="staff_sal"  class="form-control" placeholder="Salary" required>
        <input type="text" name="staff_add" class="form-control" placeholder="Address" required>
        <input type="text"  name="staff_job" class="form-control" placeholder="JOB" required>
        <input type="text"  name="staff_qual" class="form-control" placeholder="Qualification" required>
        
		<select id="drop1s" name="staff_dept" class="form-control" required>
			<option>Name Of Department</option>
			
			
		</select>
		<input type="date"  name="staff_doj" class="form-control" placeholder="DOJ" required>
        <br>
		<input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Add Staff" ></input>
      </form>
         </div>
        
    </div>
		
        </div>
		<div id="AddProfile" class="tab-pane fade">
            <h1 class="sub-header" >Manage Profile</h1><br>
		  <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_profile"><span class="glyphicon glyphicon-wrench"></span>  Manage Profile</a></li>
        <li><a data-toggle="tab" href="#change_pass"><span class="glyphicon glyphicon-lock"></span>  Change Password</a></li>
        
    </ul>
		<div class="tab-content">
        <div id="list_profile" class="tab-pane fade in active">
		  
          <div class="table-responsive">
            <form class="form-signin" method="POST"  action="Admin.php">
        
		
		
        <input type="text"  class="form-control" value="Admin" >
        <input type="email"  class="form-control" value="admin@hospitalmanagement.com" >
        <input type="text"  class="form-control" value="India" >
        <input type="tel"  class="form-control" value="8050896963" >
        <br>
		<input type="submit" class="btn btn-lg btn-primary btn-block" value="Update Profile" ></input>
      </form>
          </div>
        </div>
        <div id="change_pass" class="tab-pane fade">
		  <form class="form-signin" method="POST"  action="Admin.php">
        
		
		       
        <input type="password" id="inputPassword1" class="form-control" placeholder="Password" >
        <input type="password" id="inputPassword21" class="form-control" placeholder="New Password" >
        <input type="password" id="inputPassword22" class="form-control" placeholder="Confirm New Password" >
        <br>
		<input type="submit" class="btn btn-lg btn-primary btn-block" value="Update Password" ></input>
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
	
	
	var global_dept_count=0;
	var global_doc_count=0;
	var global_patient_count=0;
	var global_nurse_count=0;
	var global_staff_count=0;
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
	var link_no="link"+number;
	a=document.getElementById("link1");
	b=document.getElementById(link_no);
	b.className="active";
	a.className="";
	}
	
	//Dynamic Dept List
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
	
	
	
	function foo(serial_num,name_element1,hod_element1,number_element)
	{
	mod_serial_num=serial_num+1;
	name_element=capital(name_element1);
	hod_element=capital(hod_element1);
	var dept_table_body_rows=document.getElementById("dept_table_body");
	var row = dept_table_body_rows.insertRow(mod_serial_num);
	//var form_dept=document.createElement("form");
	var remove_dept=document.createElement("a");
	remove_dept.id="remove_dept";
	remove_dept.name="remove_dept";
	remove_dept.onclick=remove_rows;
	remove_dept.innerHTML="Remove";
	//form_dept.appendChild(remove_dept);

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
	
	
	
	
	//Capitalizing first character
	function capital(a)
	{
	ne=a.charAt(0).toUpperCase() + a.substring(1);
	return ne;
	}
	
	//Dynamic Doc List
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
	doc_qualification=String(<?php echo json_encode($search_doc_qualification);?>);
	search_depts=String(<?php echo json_encode($search_depts);?>);

	
	doc_name_array=doc_name.split(",");
    doc_age_array=doc_age.split(",");
    v_type_array=v_type.split(",");
    dept_doc_name_array=dept_doc_name.split(",");
    doc_qualification_array=doc_qualification.split(",");
    search_depts_array=search_depts.split(",");
	for(i=0;i<search_depts_array.length;i++)
	{
			search_depts_array[i]=capital(search_depts_array[i]);
	}	
	
	for(i=0;i<count_of_docs;i++)
	{
    foo1(i,doc_name_array[i],doc_age_array[i],v_type_array[i],dept_doc_name_array[i],doc_qualification_array[i]);
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
	
	
	function foo1(serial_num,name_element1,age_element,vtype_element1,depdoc_element1,docqual_element1)
	{
	mod_serial_num=serial_num+1;
	name_element=capital(name_element1);
	vtype_element=capital(vtype_element1);
	depdoc_element=capital(depdoc_element1);
	docqual_element=capital(docqual_element1);
	var doc_table_body_rows=document.getElementById("doc_table_body");
	var row = doc_table_body_rows.insertRow(mod_serial_num);
	var remove_doc=document.createElement("a");
	remove_doc.href="Admin.php";
	remove_doc.innerHTML="Remove";
	
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
	cell4.innerHTML=docqual_element;
	cell5.innerHTML=depdoc_element;
	cell6.innerHTML=vtype_element;
	cell7.appendChild(remove_doc);
	}
	
	
	
	
	
	
	
//Dynamic Patient List	
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
	
	
	function foo2(serial_num,name_element1,age_element,phno_element,type_element1,roomno_element)
	{
	
	mod_serial_num=serial_num+1;
	name_element=capital(name_element1);
	type_element=capital(type_element1);
	
	var patient_table_body_rows=document.getElementById("patient_table_body");
	var row = patient_table_body_rows.insertRow(mod_serial_num);
	var remove_patient=document.createElement("a");
	remove_patient.href="Admin.php";
	remove_patient.innerHTML="Remove";
	
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
	
	
	
	
//Dynamic Nurse List
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
	
	
	function foo3(serial_num,name_element1,age_element,qual_element1,doj_element,salary_element)
	{
	
	mod_serial_num=serial_num+1;
	name_element=capital(name_element1);
	qual_element=capital(qual_element1);
	
	var nurse_table_body_rows=document.getElementById("nurse_table_body");
	var row = nurse_table_body_rows.insertRow(mod_serial_num);
	var remove_nurse=document.createElement("a");
	remove_nurse.href="Admin.php";
	remove_nurse.innerHTML="Remove";
	
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
	
	
	
	//Dynamic Staff List
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
	
	
	function foo4(serial_num,name_element1,age_element,job_element1,doj_element,salary_element)
	{
	
	mod_serial_num=serial_num+1;
	name_element=capital(name_element1);
	job_element=capital(job_element1);
	
	var staff_table_body_rows=document.getElementById("staff_table_body");
	var row = staff_table_body_rows.insertRow(mod_serial_num);
	var remove_staff=document.createElement("a");
	remove_staff.href="Admin.php";
	remove_staff.innerHTML="Remove";
	
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
	
	
	function remove_rows()
	{	
		
		var selected_row=event.currentTarget;
		var child_nodes=selected_row.parentNode.parentNode.childNodes;
		var small_dept_name=smaller(child_nodes[1].innerHTML);
		alert(small_dept_name);
//		var remove_dept_name=document.getElementById("remove_dept").value;
	/*	var xhr;
		xhr=new XMLHttpRequest();
		var data="dept_name="+small_dept_name;
		xhr.open("POST","remove.php",true);
		xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xhr.send(data);
		*/
		
	}
	
	function smaller(temp)
	{
		return(temp.toLowerCase());
	}	

	</script>
  </body>
</html>
			