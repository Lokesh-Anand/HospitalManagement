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
    
	<link rel="shortcut icon" href="images/logo.png" type="image/icon"/>
    
    <title>Doctor Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="doctor.css" rel="stylesheet">

    
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
			width : 400px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			padding: 10px;
			font-size: 16px;
	   }
	   .form-signin .prescription
	   {
			position: relative;
			height: 200px;
			width : 400px;
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
	   .form-signin .prescription:focus 
	   {
			z-index: 2;
	   }
	   
	   input[type="time"]:before 
	   {
    content: attr(placeholder);
    color: #aaa;
       }

  input[type="time"]:focus:before, input[type="time"]:valid:before
	  {
		content: "";
	  }
	  .black_overlay{
        display: none;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
    .white_content {
        display: none;
        position: absolute;
        top: 10%;
        left: 10%;
        width: 75%;
        height: 75%;
        padding: 16px;
        border: 16px solid blue;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
    </style>
  </head>

  <body>
  	<!--Modal-->
  	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Prescription</h4>
				</div>
				<div class="modal-body" id="modal-display">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!--navigation bar-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Doctor</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="Doctor.html">Doctor Dashboard</a></li>
					<li><a href="../logout.php">LogOut</a></li>
				</ul>
          
			</div>
		</div>
    </nav>
	<!--end of navigation bar-->
	<!--side Navigation bar and Place holder-->
    <div class="container-fluid">
		<div class="row">
			<!--Side Navigation Bar-->
			<div class="col-sm-3 col-md-2 sidebar">
				<!--Profile pic of Doctor-->
				<!--img class="profile-pic" src="images/dr-lang_profile-pic.png"></img-->
				<?php include('profile_pic.php'); ?>
          		<img class="profile-pic"src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" />

				<!--links on side Navigation bar-->
					<ul class="nav nav-sidebar">
						<ul class="nav nav-tabs nav-stacked">
							<li id="link1" class="active"><a data-toggle="tab" href="#Doctor" >Dashboard</a></li>
							<li id="link2" ><a data-toggle="tab" href="#AddPatient">Patient</a></li>
							<li id="link3"><a data-toggle="tab" href="#Appointments" onclick="display_appointmentlist()">Appointments</a></li>
							<li id="link4"><a data-toggle="tab" href="#Prescription">Prescription</a></li>
							<li id="link5"><a data-toggle="tab" href="#Profile" onclick="display_profile()">Profile</a></li>
						</ul>
					</ul>	
			</div>
			<!--Rest of Front page plus other modules-->
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="tab-content">
					<div id="Doctor" class="tab-pane fade in active">
						<!--Header of the page for this module Doctor Dashboard-->
						<h1 class="page-header">Doctor Dashboard</h1>
							<!--Place Holders-->
							<div class="table-responsive">
								<ul class="nav nav-pills" role="tablist" >
									<a onclick="nav_set(2)" data-toggle="tab" href="#AddPatient"><img src="images/patient.png" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<a onclick="nav_set(3)" data-toggle="tab" href="#Appointments"><img src="images/Appointment Add.png" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
									<a onclick="nav_set(4)" data-toggle="tab" href="#Prescription"><img src="images/prescription_icon.png" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<a onclick="nav_set(5)" data-toggle="tab" href="#Profile"><img src="images/profile1.png" height="200px"></img></a>
									<br><br>
								</ul>  
							</div>
							<div class="row placeholders">
								<!--Responsive calendar-->
								<div class="col-xs-4 col-sm-4 placeholder">
									<iframe height="350px" width="400px" style="border:none" src="responsive-calendar/0.8/example/index.php"></iframe>
									<div class="loading"></div>
								</div>
								<!--Notice Board-->
								<div class="col-xs-5 col-sm-5 placeholder">
									<div class="container">
										<div class="row">
											<div class="col-md-5 text-center">
												<!--Just above notice board-->
												<h2>Notice Board</h2>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 col-md-offset-1 text-left">
												<div class="notice-board">
													<div class="panel panel-default">
														<div class="panel-heading">
														<!--Header of Notice Panel-->
															Active  Notice Panel
															<div class="pull-right" >
																<div class="dropdown">
																	<!--Button on notice header panel-->
																	<button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
																		<span class="glyphicon glyphicon-cog"></span>
																		<span class="caret"></span>
																	</button>
																	<!--Options in above button-->
																	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
																		<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Refresh</a></li>
																		<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a></li>
																	</ul>
																</div>
															</div>
														</div>
														<!--Body of notice board-->
														<div class="panel-body">
															<ul style="padding-left:0px;list-style:none;" id="notice_body">
																
															</ul>
														</div>
														<!--Refresh Button-->
														<div class="panel-footer">
															<a href="#" class="btn btn-default btn-block" onclick="notice_body()"> <i class="glyphicon glyphicon-repeat"></i> Refresh</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							    
					</div>
					<!--List of patient and Adding patient-->
					<div id="AddPatient" class="tab-pane fade">
						<h1 class="sub-header" >Search Patient</h1><br>
						<!--For tabs-->
						<ul class="nav nav-pills">
							<li class="active"><a data-toggle="tab" href="#list_patient"><span class="glyphicon glyphicon-search"></span>Search Patient</a></li>
							<li><a data-toggle="tab" href="#add_patient" onclick="display_waiting_list()"><span class="glyphicon glyphicon-th-list" ></span>Waiting List</a></li>
						</ul>
						<!--Tab content-->
						<div class="tab-content">
							<div id="list_patient" class="tab-pane fade in active">
									<label>Search: <input type="search" id="search_patient" class="form-control"></input></label>
									<input type="submit" name="submit" class="btn btn-lg btn-primary" value="Go" onclick="display_patient()"></input><br/><br/>
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<form id="patient_form" method="POST">
														<th>#</th>
														<th>Patient ID</th>
														<th>Age</th>
														<th>Phone No</th>
														<th>Address</th>
														<th>History</th>
														<th>Type</th>
														<th>Room No</th>
														<input type="hidden" id="patient_hidden" name="patient_hidden"></input>
													</form>
												</tr>
											</thead>
											<tbody id="patient_list_body">
											</tbody>
										</table>
										<div id="light" class="white_content"></div>
										<div id="fade" class="black_overlay"></div>
									</div>
									
							</div>
							<!--Form for adding new patient-->
							<div id="add_patient" class="tab-pane fade">
								<div class="table-responsive">
										<br><br>
										<table class="table table-striped" id="waiting_list_body">
											<thead>
												<tr>
														<form id="wait_form" method="POST">
															<th>#</th>
															<th>Patient Nmae</th>
															<th>Age</th>
															<th>Phone No</th>
															<th>Address</th>
															<th>Option</th>
															<input type="hidden" id="wait_hidden" name="wait_hidden"></input>
														</form>
												</tr>
											</thead>
											<tbody id="waiting_list_body">
											</tbody>
										</table>
									</div>	
							</div>
						</div>
					</div>
					<!--List of appointment and adding patient-->
					<div id="Appointments" class="tab-pane fade">
						<h1 class="sub-header" >Appointments</h1><br><br>
						<!--For tabs-->
						<ul class="nav nav-pills">
							<li class="active"><a data-toggle="tab" href="#list_appointments" onclick="display_appointmentlist()"><span class="glyphicon glyphicon-th-list"></span>  Appointment List</a></li>
							<li><a data-toggle="tab" href="#add_appointment"><span class="glyphicon glyphicon-plus"></span>New Appointment</a></li>
						</ul>
						<div class="tab-content">
							<div id="list_appointments" class="tab-pane fade in active">
								<div class="table-responsive">
									<table class="table table-striped" id="appointment_table_body">
										<thead>
											<tr>
												<form id="app_form" method="POST">
													<th>#</th>
													<!--<th>Appointment Date</th>-->
													<th>Patient Name</th>
													<th>Remark</th>
													<th>Cosultation Time</th>
													<th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
													<input type="hidden" id="app_hidden1" name="app_hidden1"></input>
													<input type="hidden" id="app_hidden2" name="app_hidden2"></input>
												</form>
											</tr>
										</thead>
									</table>
								</div>
							</div>
								<!--Form for adding appointment-->
								<div id="add_appointment" class="tab-pane fade">
									<form class="form-signin" method="POST"  action="add_new_appointment.php">
										<h2 class="form-signin-heading">Add Appointment</h2>
										<input type="text" name="doctor_id" id="doctor_id" class="form-control" placeholder="Doctor ID" >
										<input type="text" name="patient_id" id="patient_id" class="form-control" placeholder="Patient ID" >
										<input type="text" name="remark" id="remark" class="form-control" placeholder="Remark" >
										<br>
										<input type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="Add Appointment" ></input>
									</form>
								</div>
							</div>
						</div>
						<!--For Adding Prescription-->
						<div id="Prescription" class="tab-pane fade">
							<h1 class="sub-header" >Prescription</h1><br>
							<ul class="nav nav-pills">
								<li class="active"><a data-toggle="tab" href="#add_prescription"><span class="glyphicon glyphicon-plus"></span>Write Prescription</a></li>
							</ul>
							<div class="tab-content">
								<div id="add_prescription" class="tab-pane fade in active">
									<form class="form-signin" method="POST"  action="store_prescription.php">
										<h2 class="form-signin-heading">New Prescription</h2>
										<input type="text" id="prescription_patient_id" name="prescription_patient_id"  class="form-control" placeholder="Patient ID" ><br>
										<input type="text" id="prescription_app_time" name="prescription_app_time" class="form-control" placeholder="Appointment Time" ><br>
										<textarea   name="prescription_text" class="prescription" id="prescription_text" cols="15" rows="20"  placeholder="Enter the Prescription here" required></textarea><br>

										<br>
										<input type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="Add Prescription" ></input>
									</form>
								</div>    
							</div>
						</div>
					<!--For Editing Profile and changing password-->
					<div id="Profile" class="tab-pane fade">
						<h1 class="sub-header" >Manage Profile</h1><br>
						<ul class="nav nav-pills">
							<li class="active"><a data-toggle="tab" href="#profile_content"><span class="glyphicon glyphicon-th-list"></span> Edit Profile</a></li>
							<li><a data-toggle="tab" href="#change_password"><span class="glyphicon glyphicon-plus"></span>Change Password</a></li>
						</ul>
						<div class="tab-content">
							<div id="profile_content" class="tab-pane fade in active">
								<h2>Update Profile</h2>
								<form role="form" action="update_profile.php" method="POST">
								<div class="form-group">
									<label for="name">Name:
									<input type="text" class="form-control" id="profile_name" name="profile_name"></label>
								</div>
								<div class="form-group">
									<label for="age">Age:
									<input type="text" class="form-control" id="profile_age" name="profile_age"></label>
								</div>
								<div class="form-group">
									<label for="address">Address:
									<input type="text" class="form-control" id="profile_address" name="profile_address"></label>
								</div>
								<button type="submit" class="btn btn-primary">Update Profile</button>
								</form>
							</div>
							<div id="change_password" class="tab-pane fade">
								<form class="form-signin" method="POST"  action="Doctor.html">
									<h2 class="form-signin-heading">Change password</h2>
									<input type="password"  class="form-control" placeholder="old password" >
									<input type="password"  class="form-control" placeholder="new password" >
									<input type="password"  class="form-control" placeholder="retype password" >
									<br>
									<input type="submit" class="btn btn-lg btn-primary btn-block" value="Submit" ></input>
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
		var global_appointment_count=0;
		var global_waiting_count=0;
		//Method for making placeholders work.
		
		function nav_set(number)
		{
			//alert(number);
			if(number==3)
				display_appointmentlist();
			/*else if(number==3)
				doc_list();
			else if(number==4)
				patient_list();
			else if(number==5)
				nurse_list();
			else if(number==6)
				staff_list();*/
			var link_no="link"+number;
			a=document.getElementById("link1");
			b=document.getElementById(link_no);
			b.className="active";
			a.className="";
		}
		function display_patient()
		{
			//alert("hello");
			var x=document.getElementById("patient_list_body");
			 x.innerHTML="";
			var patient_name=document.getElementById("search_patient").value;
			//'alert(patient_name);
			//Ajax method for search
			$.ajax(
					{
						url: 'dynamic_patient.php?patient_name='+patient_name ,
						dataType: 'json' ,                                
						success: function(data)
										{
											//alert(data);
											$.each(
													data,function(i,item)
													{
														$('#patient_list_body').append("<tr><td>"+(i+=1)+"</td><td>"+item.PatientID+"</td><td>"+item.Age+"</td><td>"+item.Phone_No+"</td><td>"+item.Address+"</td><td><a data-toggle=\"modal\" data-target=\"#myModal\" onclick=\"priscriptionshower()\">click here</a></td><td>"+item.Type+"</td><td>"+item.Room_No+"</td></tr>");
													}
												);
										} ,
						error: function()
										{
											alert('error');
										}
					}
					);
		}
		function priscriptionshower()
		{
			var selected_patient_row=event.currentTarget;
			var child_nodes=selected_patient_row.parentNode.parentNode.childNodes;
			var patient_id=child_nodes[1].innerHTML;
			//alert(small_patient_row);
			document.getElementById("modal-display").innerHTML="";
			$.ajax(
					{
						url: 'show_history.php?patient_id='+patient_id ,
						dataType: 'json' ,                                
						success: function(data)
										{
											//alert('in success');
											//alert(data);
											$.each(
													data,function(i,item)
													{
														$('#modal-display').append(item.Data);
													}
												);
										} ,
						error: function()
										{
											alert('error');
										}
					}
				  );
			//document.getElementById('light').style.display='block';
			//document.getElementById('fade').style.display='block';
		}
		function forclosingprescription()
		{
			document.getElementById('light').style.display='none';
			document.getElementById('fade').style.display='none';
		}
		function display_waiting_list()
		{
			//alert("inside list");
			<?php include ('dynamic_waitinglist.php');?>
			global_waiting_count++;
			if(global_waiting_count==1)
			{
				//alert("inside if");
				count_of_waitinglist=String(<?php echo json_encode($count_waitinglist);?>);
				patient_name=String(<?php echo json_encode($patient_name);?>);    
				age=String(<?php echo json_encode($age);?>);
				phone_no=String(<?php echo json_encode($phone_no);?>);
				address=String(<?php echo json_encode($address);?>);
				//alert(patient_name);
				patient_name_array=patient_name.split(",");
				age_array=age.split(",");
				phone_no_array=phone_no.split(",");
				address_array=phone_no.split(",");
				for(i=0;i<count_of_waitinglist;i++)
				{
					//alert("inside for");
					waiting_list_generator(i,patient_name_array[i],age_array[i],phone_no_array[i],address_array[i]);
				}
	
			}
		}
		function waiting_list_generator(serial_num,patientName,year,phno,addr)
		{
			//alert("inside waiting list");
			mod_serial_num=serial_num+1;
			patient_name=patientName;
			age=year;
			phone_no=phno;
			address=addr;
			var wait_table_body_rows=document.getElementById("waiting_list_body");
			var row = wait_table_body_rows.insertRow(mod_serial_num);
			//var form_dept=document.createElement("form");
			var add_wait=document.createElement("a");
			add_wait.id="add_patient";
			add_wait.name="add_patient";
			add_wait.onclick=add_waiting_patient;
			add_wait.innerHTML="Add";
			//form_dept.appendChild(remove_dept);

			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			var cell6 = row.insertCell(5);
	
	
			cell1.innerHTML=mod_serial_num;
			cell2.innerHTML=patient_name;
			cell3.innerHTML=age;
			cell4.innerHTML=phone_no;
			cell5.innerHTML=address;
			cell6.appendChild(add_wait);
		}
		
		function add_waiting_patient()
		{
			//alert("inside handler");
			var selected_wait_row=event.currentTarget;
			var child_nodes=selected_wait_row.parentNode.parentNode.childNodes;
			var wait_patient_name=child_nodes[1].innerHTML;
			//alert(wait_patient_name);
			var wait_hidden=document.getElementById("wait_hidden");
			wait_hidden.value=wait_patient_name;
			//alert(app_hidden1.value);
			var wait_form=document.getElementById("wait_form");
			wait_form.action="time_test.php";
			wait_form.submit();
		}
		function display_appointmentlist()
		{
			//Including PHP/Database Interaction for Department	
			<?php include ('dyamic_appointment.php');?>
			global_appointment_count++;
	
			if(global_appointment_count==1)
			{
				count_of_appointment=String(<?php echo json_encode($count_appointment);?>);
				patient_name=String(<?php echo json_encode($patient_name);?>);    
				remark=String(<?php echo json_encode($remark);?>);
				consul_time=String(<?php echo json_encode($consulting_time);?>);
				//alert(patient_name);
				patient_name_array=patient_name.split(",");
				//app_time_array=app_time.split(",");
				remark_array=remark.split(",");
				consul_time_array=consul_time.split(",");
	
				for(i=0;i<count_of_appointment;i++)
				{
					appointment_list_generator(i,patient_name_array[i],remark_array[i],consul_time_array[i]);
				}
	
			}
		}
		function appointment_list_generator(serial_num,patientName,remark,consultTime)
		{
			//alert(serial_num+patientName+appointmentTime+remark+consultTime);
			mod_serial_num=serial_num+1;
			patient_name=patientName;
			//appointment_time=appointmentTime;
			Remark=remark;
			//alert(Remark);
			con_time=consultTime;
			var app_table_body_rows=document.getElementById("appointment_table_body");
			var row = app_table_body_rows.insertRow(mod_serial_num);
			//var form_dept=document.createElement("form");
			var remove_app=document.createElement("a");
			remove_app.id="remove_dept";
			remove_app.name="remove_dept";
			remove_app.onclick=remove_app_rows;
			remove_app.innerHTML="Remove";
			//form_dept.appendChild(remove_dept);

			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			//var cell6 = row.insertCell(5);
	
	
			cell1.innerHTML=mod_serial_num;
			cell2.innerHTML=patient_name;
			cell3.innerHTML=Remark;
			cell4.innerHTML=con_time;
			cell5.appendChild(remove_app);
		}
		function remove_app_rows()
		{
			//alert("inside handler");
			var selected_app_row=event.currentTarget;
			var child_nodes=selected_app_row.parentNode.parentNode.childNodes;
			var small_app_time=child_nodes[3].innerHTML;
			//alert(small_app_time);
			var app_hidden1=document.getElementById("app_hidden2");
			app_hidden1.value=small_app_time;
			//alert(app_hidden1.value);
			var app_form=document.getElementById("app_form");
			app_form.action="remove_appointment.php";
			app_form.submit();
		}
		function display_profile()
		{
			//alert("handler");
			<?php include ('profile.php');?>
			var name=document.getElementById("profile_name").value=String(<?php echo json_encode($doctor_name);?>);
			var name=document.getElementById("profile_age").value=String(<?php echo json_encode($age);?>);
			var name=document.getElementById("profile_address").value=String(<?php echo json_encode($address);?>);
		}
		function notice_body()
		{
			var x=document.getElementById("notice_body");
			 x.innerHTML="";
			//'alert(patient_name);
			//Ajax method for search
			$.ajax(
					{
						url: 'notice.php' ,
						dataType: 'json' ,                                
						success: function(data)
										{
											//alert(data);
											$.each(
													data,function(i,item)
													{
														$('#notice_body').append("<li><span class=\"glyphicon glyphicon-map-marker text-danger\" ></span>Appointment with "+item.Patient_Name+" at "+item.Con_time+"</li>");
													}
												);
										} ,
						error: function()
										{
											alert('error');
										}
					}
					);
		}
	</script>
  </body>
</html>
			