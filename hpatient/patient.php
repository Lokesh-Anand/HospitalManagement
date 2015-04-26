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
    <meta name="author" content="HimanshuRanjan">
    <link rel="icon" href="site1.ico">
    <title>Patient Dashboard</title>
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="myfile.css" rel="stylesheet">
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
	<!-- This is for popup div like modal -->
	<style type="text/css">
		body
		{
		overflow-y: scroll;    
		overflow-x: hidden;
		}
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
        top: 25%;
        left: 25%;
        width: 50%;
        height: 50%;
        padding: 16px;
        border: 16px solid blue;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
	</style>
 </head>
<body>
  <div id="light" class="white_content"><span id="popupdiv">This is the prescription content. </span><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><span id="popupdiv2">Close</span></a></div>
  <div id="light2" class="white_content"><span id="popupdiv2">This is the prescription content. </span><a href = "#Patient_homepage" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><span id="popupdiv2">Close</span></a></div>
  <div id="fade" class="black_overlay"></div>
  <!-- end of modal of popup div -->
  <!--navigation bar-->
  <!-- THe following code will be for horizontal navigation bar at the top of the page -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
	<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Patient</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="patient.php">Patient Dashboard</a></li>
					<li><a href="../logout.php">LogOut</a></li>
				</ul>
				
          
			</div>
		</div>
    </nav>
	<!-- #################################################################################################### end of top navigation bar #############-->
	<!-- start of side Navigation bar and Place holder-->
    <div class="container-fluid">
		<div class="row">
			<!--Side Navigation Bar-->
			<div class="col-sm-3 col-md-2 sidebar">
				<!--Profile pic -->
				<img class="profile-pic" src="pat3.jpg" height="200px"></img>
				<!--links on side Navigation bar-->
					<ul class="nav nav-sidebar">
						<ul class="nav nav-tabs nav-stacked">
							<li id="link1" class="active"><a data-toggle="tab" href="#Patient_homepage" onclick="fun_notice();stopit();">Home Page</a></li>
							
							<li id="link2" ><a data-toggle="tab" href="#History" onClick="fun_payment();stopit();">History</a></li>
							<li id="link3"><a data-toggle="tab" href="#Admit_info" onclick="fun_admitroom();stopit();">Admit Information</a></li>
							<li id="link4"><a data-toggle="tab" href="#Prescription" onclick="fun_prescription();stopit();">View Prescription</a></li>
							
							<li id="link6"><a data-toggle="tab" href="#Appointment" onclick="fun_appointment();stopit();">View Appointment</a></li>
							<!--			<li id="link7"><a data-toggle="tab" href="#Preference">My preference</a></li>   -->
							<li id="link8"><a data-toggle="tab" href="#Viewdocap" onclick="stopit()" >Search Doctor and Book an appointment</a></li>
							<li id="link5"><a data-toggle="tab" href="#Profile" onclick="display_profile();stopit();">Profile</a></li>
						</ul>
					</ul>	
			</div>
<!--#################################################################### end of left navigation bar ########################################################-->
			<!--Rest of Front page This has our entire logic -->
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="tab-content">
				<!-- ################################################################## Starting tab content for PATIENT HOMEPAGE ##########################-->
					<div id="Patient_homepage" class="tab-pane fade in active">
						<!--Header of the page for this module Doctor Dashboard-->
						<h1 class="page-header">Patient Dashboard</h1>
							<!--Place Holders-->
							<div class="table-responsive">
								<ul class="nav nav-pills" role="tablist" >
									<!-- jioo betaa nav_set takes the link num as parameter-->
									<a onclick="nav_set(2);fun_payment();stopit();" data-toggle="tab" href="#History" ><img src="images/patient/history.png" height="150px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<a onclick="nav_set(8);stopit();" data-toggle="tab" href="#Viewdocap"><img src="images/patient/search_doc.jpg" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
									<a onclick="nav_set(6);fun_appointment();stopit();" data-toggle="tab" href="#Appointment"><img src="images/patient/appointment1.jpg" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<a onclick="nav_set(4);fun_prescription();stopit();" data-toggle="tab" href="#Prescription" ><img src="images/patient/prescription.jpg" height="150px"></img></a>
									<br><br>
								</ul>  
							</div>
							<div class="row placeholders">
								<!-- ########################### VIDEO #####################################-->
								<div class="col-xs-4 col-sm-4 placeholder">
									<br />
									
									<br />
									<h3><span class="label label-success"> TOP 5 HEART TIPS.</span></h3>
									<br />
									
									<!-- <iframe height="350px" width="400px" style="border:none" src="responsive-calendar/0.8/example/index.html"></iframe> -->
									<div align="center" class="embed-responsive embed-responsive-16by9">
										<video id="myvideo1" controls="controls" autoplay class="embed-responsive-item">
										<source src=heart.mp4 type=video/mp4>
										<source src=https://techslides.com/demos/sample-videos/small.mp4 type=video/mp4>
										</video>
									</div>
									

									
									<div class="loading"></div>
								</div>
								<!-- ########################## Notice Board which will display the list of appointments and reports that have come ########-->
								<div class="col-xs-6 col-sm-6 placeholder">
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
															<ul style="padding-left:0px;list-style:none;" id="notice_manage">
																<li>
																	<span class="glyphicon glyphicon-headphones  text-success font-size="5px" >
																		Plzz collect the same from our counter. To see your report online go to Report tabs in prescription sections 
																		If you have checked your report then kindly ignore it !!
																		
																	</span>  
																</li>
																
															</ul>
														</div>
														<!--Refresh Button-->
														<div class="panel-footer">
															<a href="#" onclick="fun_notice()" class="btn btn-default btn-block"> <i class="glyphicon glyphicon-repeat"></i> Refresh</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							    
					</div>
					<!-- ############################################# STARTING OF HISTORY TAB CONTENT- PAYMENT and treatment ################################ -->
					<!--    @HISTORY BOTH-->
					<div id="History" class="tab-pane fade">
						<h1 class="sub-header" >Your History</h1><br>
						<!--For tabs-->
						<ul class="nav nav-pills">
							<li class="active"><a data-toggle="tab" href="#payment_history"><span class="glyphicon glyphicon-th-list"></span> Payment</a></li>
							<li><a data-toggle="tab" href="#operation_history" ><span class="glyphicon glyphicon-th-list"></span> Treatment and procedures</a></li>
						</ul>
						<!--Tab content-->
						<div class="tab-content">
							<!--########################### Tab content for PAYMENT HISTORY ########################################################## -->
							<div id="payment_history" class="tab-pane fade in active">
								<div class="table-responsive">
									<table class="table table-hover" id="payment_tab">
									<thead>
										<tr id="firstrow">
										<th rowspan="2">#</th>
										<th rowspan="2">Time</th>
										<th colspan="7" align="right" >    Amount</th>
										<th rowspan="2">Total amount</th>
										<th rowspan="2">Billing.Id</th>
																		<!--	<th rowspan="2">Remarks</th> -->
										</tr>
										<tr>
											<th>Pharma cost</th>
											<th>Lab cost</th>
											<th>Consulatation fee</th>
											<th>Operation Cost</th>
											<th>Canteen</th>
											<th>Room Charge</th>
											<th>Tax</th>
										</tr>
									</thead>
									<tbody id="payment_body">
									</tbody>
									
									</table>
								</div>
							
							</div>
							
							<!--#################################################### Patient treatment history ######################################-->
							<div id="operation_history" class="tab-pane fade">
								<br />
								<a style="cursor:pointer;" onclick="treatmenthistoryshower()" data-toggle="modal" data-target="#myModal">click here</a>
																
								
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<!---- modal --->
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Health History</h4>
											</div>
											<div class="modal-body" id="modal-display">
												<p>  history body </p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
								</div>
							</div> <!-- END OF MODAL -->
						</div>
					</div>
					</div>
					<!-- ###################################################### ADMIT INFORMATION- ROOM NO AND NURSES #################################-->
					<!--   @admitinfo-->
					<div id="Admit_info" class="tab-pane fade">
						<h1 class="sub-header" >ADMIT INFORMATION</h1>
						<br />
						
						<!--For tabs-->
						<ul class="nav nav-pills">
							<li class="active"><a data-toggle="tab" href="#admitinfo" onclick="fun_admitroom()"><span class="glyphicon glyphicon-th-list"></span>  Admit Information</a></li>
							<li><a data-toggle="tab" href="#attended" onclick="fun_attended()"><span class="glyphicon glyphicon-th-list"></span>Person/Nurses/Doctor attended</a></li>
						</ul>
						<div class="tab-content">
							<br />
							<!-- ###################################### SHOWS ROOM RELATED INFORMATION #########################################-->
							<div id="admitinfo" class="tab-pane fade in active">
								<div class="table-responsive">
									
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Room No</th>
												<th>Room Type</th>
												
												<th>Login time </th>
												<th>Allocation Date</th>
												<th>Deallocation Date</th>
											</tr>
											</thead>
											<tbody id="roombody"></tbody>
										</table>
									</div>
								</div>
								<!--##########################################################Form for people attended #############################-->
								<div id="attended" class="tab-pane fade">
									<div class="mylist" width="300px">
										<h3><span class="label label-success">LIST OF NURSES ATTENDED.</span></h3>
										<ul class="list-group" id="ulist">
											<!--  code to be appended by javascript-->											
										</ul>
									</div>
									</div>

								</div>
							</div>
				 <!--######################################################################################## Displays prescriptions and reports ##########-->
					<!-- @ view prescription-->	
					<div id="Prescription" class="tab-pane fade">
						<h1 class="sub-header" >Prescription And Reports </h1><br>
						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<!---- modal --->
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Prescription</h4>
											</div>
											<div class="modal-body" id="modal-display1">
												<p>  prescription body  </p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
								</div>
							</div>
						<!-- for tabs -->
							<ul class="nav nav-pills">
								<li class="active"><a data-toggle="tab" href="#prescriptioninfo" onclick="fun_prescription()"><span class="glyphicon glyphicon-th-list"></span>  prescription Information</a></li>
								<li><a data-toggle="tab" href="#reports" onclick="fun_reports() "><span class="glyphicon glyphicon-th-list"></span> Reports</a></li>
							</ul>
							
						<div class="tab-content">
								<div id="prescriptioninfo" class="tab-pane fade in active">
									<h3><span class="label label-success">Your Prescription List.</span></h3>
									<div class="table-responsive">
										<table class="table table-hover" id="prescription_tab">
											<thead>
											<tr id="firstrow">
												<th>#</th>
												<th>Remarks</th>
												<th>Prescription_id</th>
												<th>Doctor Name</th>
												<th>SEE your prescription</th>
											</tr>
											</thead>
											<tbody id="presbody"> </tbody>
											
										<!--	/* <tr>
												<td>1</td>
												<td>24 April</td>
												<td>To display the full prescription click 
												<a href = "javascript:void(0)" 
													onclick = "document.getElementById('light').style.display='block';
													document.getElementById('fade').style.display='block'"
												>
												here
												</a>
												</td>
											</tr> */  -->
										</table>
									</div>
					
								</div>
								<div id="reports" class="tab-pane fade">
									<h3><span class="label label-success">Your Report List</span></h3>
									<div class="table-responsive">
										<table class="table table-hover" id="report_tab">
											<thead>
											<tr id="firstrowreport">
												<th>#</th>
												<th>Report SL NO.</th>
												<th>Lab Name</th>
												<th>SEE full report</th>
											</tr>
											</thead>
											<tbody id="reportbody">
											</tbody>
											
										</table>
									</div>			
								</div>
						</div>
								
					</div>
			<!-- ########################################## PROFILE MANAGE #######################################################################-->
					<!--  @profile-->
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
										<label for="profile_name">Name:</label>
										<input type="text" class="form-control" name="profile_name" id="profile_name" value="" >
									</div>
									<div class="form-group">
										<label for="profile_age">Age:</label>
										<input type="number" class="form-control" name="profile_age" id="profile_age" value="">
									</div>
									<div class="form-group">
										<label for="profile_bgroup">Blood group:(FOR ANY  CHANGES IN BLOOD GROUP CONTACT US )</label>
										<input type="text" class="form-control" name="profile_bgroup" id="profile_bgroup" value="" readonly>
									</div>
									<div class="form-group">
										<label for="profile_phone">Phone No:</label>
										<input type="number" class="form-control" name="profile_phone" id="profile_phone" value="">
									</div>
									<div class="form-group">
										<label for="profile_address">Address:</label>
										<input type="text" class="form-control" name="profile_address" id="profile_address" value="">
									</div>
									
									<button type="submit" class="btn btn-default">Update Profile</button>
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
					<!-- @appointment status-- ############################################  every appointment has a unique prescription id -->
					
					<div id="Appointment" class="tab-pane fade">
				<h1 class="sub-header" >Your Appoinement list</h1><br>
				<div class="table-responsive">
					<table class="table table-hover" id="patient_tab">
						<thead>
						<tr id="firstrow">
							<th>#</th>
							<th>Prescription id</th>
							<th>Date</th>
							<th>Time</th>
							<th>Doctor</th>
							<th><span class="glyphicon glyphicon-wrench"></span>  Manage</th>
							<!--<th>CHANGE</th> -->
						</tr>
						</thead>
						<tbody id="appointmentbody">
						</tbody>
					</table>
				</div>
				 
				<span>                     </span>
				
		</div>
					<!-- @my preference -->
					<div id="Preference" class="tab-pane fade">
				<h2> i will paste preference code here </h2>
		</div>
					<!-- @############################################################################## view doctor and book an appointment -->
					<div id="Viewdocap" class="tab-pane fade">
						<h2 class="sub-header" >SEARCH DOCTOR AND BOOK AN APPOINTMENT</h2>
						
						<br />
						<br />
											
						
						
						<div class="row">
							<div class="col-lg-3">
								<h3><span class="label label-success">SELECT THE METHOD</span></h3>
								<select id="method_selected" onchange="fun()" class="form-control" placeholder=".col-lg-4">
									<option value="none"> NoneSelected </option>
									<option value="name">SEARCH BY NAME</option>
									<option value="dept">SEARCH BY DEPARTMENT</option>
								</select>
								
							</div>
							<script type="text/javascript">
							//if(document.getElementById("method_selected").value=="none")
								//alert("plzz select a method first !!");
							function fun()
							{
							    
								var val=document.getElementById("method_selected").value;
								if(val=="none")
									alert("plzz select a method first !!");
								if(val=="name")
									document.getElementById("id1").innerHTML="Enter Doctor's Name :";
								
								else
									{
									document.getElementById("id1").innerHTML="Enter Department's Name :";
									//alert("dept");
									}
								// i am pasting here start
								
								var xhr= new XMLHttpRequest();
								xhr.onreadystatechange= function(){
								if(xhr.readyState==4 && xhr.status==200)
								{
									var dropdownmenu=document.getElementById("enteredname");
									dropdownmenu.innerHTML="";
									dropdownmenu.innerHTML="";
									return_data=String(xhr.responseText);
									
									//alert(return_data);
									
									return_data_array=return_data.split(",");
									//alert(return_data_array);
									/*

									dropdownmenu.innerHTML="";
									var op=document.createElement("option");
									op.innerHTML="none";
									dropdownmenu.appendChild(op);*/
									//var len=strlen(return_data_array);
									var len=return_data_array.length;
									//alert(len);
									for(i=0;i<len-1;i++)
									{
									 var op9=document.createElement("option");
									 
										op9.innerHTML=return_data_array[i];
										
									dropdownmenu.appendChild(op9);	
										}
									 //alert(op.innerHTML);
									 
									
									}
									//end of for
									
									//alert(return_data);
									//var new_label=document.createElement("pre");
									//new_label.style.fontFamily="Verdana";
									//new_label.innerHTML=return_data;
									//display_modal_body.appendChild(new_label);
				
				
								}
								//end of function
								xhr.open("GET","display_listdoctorbynamedept.php?cond="+val, true);
								xhr.send();
								// i am pasting here stop
									
								
							
							}
						</script>
							
							<div class="col-lg-4">
								<h3><span class="label label-success" id="id1">Enter Doctor's Name :</span></h3>
								<select class="form-control" id="enteredname" >
								</select>
							</div>
							<div class="col-lg-2">
								<br />
								<h3><span class="label label-success" id="id1"></span></h3>
								<input type="submit" name="submit" class="btn btn-lg btn-success" value="Go" onclick="display_doctor_start()"></input><br/><br/>
							</div>
						</div>
						<br /><br />
							<div class="table-responsive">
								<table class="table table-striped">
								<thead>
									<tr>
									<th>#</th>
									<th>Doctor Name</th>
									<th>Doctor ID</th>
									<th>Book An appointment</th>
									</tr>
								</thead>
									<tbody id="searchdocbody"></tbody>
								</table>
							</div>
								
						</div>  <!-- end of search doctor div -->
		  
				</div>   <!-- end of class tab-content-->
		
			</div> 
        </div>   <!-- end of right side of page size 9 waala -->
	</div>     <!-- end of row -->
    		<!-- end of container  -->
		<!-- end of container fluid -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery-1.11.2.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
	
  </body>
  	<script>
     	var global_appointment_count=0;
	var global_attendance=0;
	var global_prescription=0;
	var global_reports=0;
	var global_appointment=0;
	var global_notice=0;
	var global_noticeappointment=0;
	
		function nav_set(number)
		{
			var link_no="link"+number;
			a=document.getElementById("link1");
			b=document.getElementById(link_no);
			b.className="active";
			a.className="";
		}
		
		
		
		
		function fun_payment()
		{ 

			//alert("enterd function");
			//Including PHP/Database Interaction for Department	
			<?php include('display_paymenthistory.php');?>
			global_appointment_count++;
			
			if(global_appointment_count==1)
			{	
			   //alert("insdie whrw");
				count_of_appointment=parseInt(<?php echo json_encode($count_appointment);?>);
				if (count_of_appointment==0)
				 alert("No transactions till now !!");
				else 
				{time=String(<?php echo json_encode($time);?>);
				pharma_cost=String(<?php echo json_encode($pharma_cost); ?>);
				lab_cost=String(<?php echo json_encode($lab_cost); ?>);
				consultation_fee=String(<?php echo json_encode($consultation_fee); ?>);
				operation_cost=String(<?php echo json_encode($operation_cost); ?>);
				canteen=String(<?php echo json_encode($canteen); ?>);
				room_charge=String(<?php echo json_encode($room_charge); ?>);
				tax=String(<?php echo json_encode($tax); ?>);
				total_cost=String(<?php echo json_encode($total_cost);?>);
				billing_id=String(<?php echo json_encode($billing_id); ?>);
				
				//alert("alert1");
				//alert(patient_name);
				time_array=time.split(",");
				pharma_cost_array=pharma_cost.split(",");
				lab_cost_array=lab_cost.split(",");
				consultation_fee_array=consultation_fee.split(",");
				operation_cost_array=operation_cost.split(",");
				canteen_array=canteen.split(",");
				room_charge_array=room_charge.split(",");
				tax_array=tax.split(",");
				total_cost_array=total_cost.split(",");
				billing_id_array=billing_id.split(",");
				//remarks_array=remarks.split(",");
				//alert(lab_cost);
				for(i=0;i<count_of_appointment;i++)
				{
					//alert("inside for");
				payment_list_generator(i,time_array[i],pharma_cost_array[i],lab_cost_array[i],consultation_fee_array[i],operation_cost_array[i],canteen_array[i],room_charge_array[i],tax_array[i],total_cost_array[i],billing_id_array[i]);
				}
			
			}
			}
		} //end of function updatehistory
		
	
	</script>
	<script type="text/javascript">
		fun_notice();
		var global_room_count=0;
	
		function payment_list_generator(serial,time,pharma,lab,consultation,operation,canteen,room,tax,total,bid)
		{
			//alert(serial_num+patientName+appointmentTime+remark+consultTime);
			Serial=serial+1;
			Time=time;
			Pharma=pharma;
			Lab=lab;
			Consulatation=consultation;
			Operation=operation;
			Canteen=canteen;
			Room=room;
			Tax=tax;
			Total=total;
			Bid=bid;
			//Remarks=remarks;
			//alert("inside payment list generaj,bj");
			var t=document.getElementById("payment_body");
			//alert(t);
			var row = t.insertRow(serial);
			
			
			//form_dept.appendChild(remove_dept);

			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			var cell6 = row.insertCell(5);
			var cell7 = row.insertCell(6);
			var cell8 = row.insertCell(7);
			var cell9 = row.insertCell(8);
			var cell10 = row.insertCell(9);
			var cell11 = row.insertCell(10);
			//var cell12 = row.insertCell(11);
	
	
			cell1.innerHTML=Serial;
			cell2.innerHTML=Time;
			cell3.innerHTML=Pharma;
			cell4.innerHTML=Lab;
			cell5.innerHTML=Consulatation;
			cell6.innerHTML=Operation;
			cell7.innerHTML=Canteen;
			cell8.innerHTML=Room;
			cell9.innerHTML=Tax;
			cell10.innerHTML=Total;
			cell11.innerHTML=Bid;
			//cell12.innerHTML=Remarks;
			
		}
		
	function fun_admitroom()
	{
	 //alert("function admit  called");
	 <?php include('php_admitroom.php'); ?>
	 global_room_count++;
	 //alert(global_room_count);
	 if(global_room_count==1)			//so that query is not executed again
	 {
		//alert("inside loop1 ");
		count=parseInt(<?php echo json_encode($count_appointment);?>);
		//alert(count+1);
			//alert("inside count=0");
			//fun_noroom();
		
			Roomno=String(<?php echo json_encode($roomno);?>);
			Roomtype=String(<?php echo json_encode($roomtype);?>);
			
			ltime=String(<?php echo json_encode($logintime);?>);
			Adate=String(<?php echo json_encode($adate);?>);
			Ddate=String(<?php echo json_encode($ddate);?>);				//since whatever comes coms in json format therefore we need to typecast and then we firther sploit the values to arrays
			//alert(Roomno);
			//if(Roomno.equals("NA"))
			if(Roomno=="NA" || Roomno=="null")
				{
					//alert("no need");
					fun_noroom();
				}
			else
			{
			roomno_array=Roomno.split(",");
			roomtype_array=Roomtype.split(",");
			//bedno_array=Bedno.split(",");
			ltime_array=ltime.split(",");
			adate_array=Adate.split(",");
			ddate_array=Ddate.split(",");
			//alert(bedno_array);	
			var t=document.getElementById("roombody");
			//alert("table body found");
			var row=t.insertRow(0);
			//alert("new row created"); 				//yahan pe panga hain !!
			var cell1=row.insertCell(0);
			var cell2=row.insertCell(1);
			var cell3=row.insertCell(2);
			var cell4=row.insertCell(3);
			var cell5=row.insertCell(4);
			var cell6=row.insertCell(5);
			//var cell7=row.insertCell(6);
			cell1.innerHTML=1;
			cell2.innerHTML=roomno_array[0];
			cell3.innerHTML=roomtype_array[0];
			//cell4.innerHTML=bedno_array[0];
			cell4.innerHTML=ltime_array[0];
			cell5.innerHTML=adate_array[0];
			cell6.innerHTML=ddate_array[0];
		} //end of else
		
	 }
	} //end of function to add room admit info
	function fun_noroom()
	{
		//alert("You are just fine there is no need for any treatment");
		
		var span1=document.getElementById("popupdiv");
		span1.innerHTML="No Need !! You are fit and healthy !!"; 
		
		document.getElementById('light').style.display='block';
		
		document.getElementById('fade').style.display='block';
		
		
	}
	
	function fun_attended()
	{
		//alert("attended function callaed");
		// code to extract attendance register form database
		<?php include('php_attendance.php'); ?>
		global_attendance++;
		//alert(global_attendance);
		if(global_attendance==1)
		{
		//alert("attended function callaed2");
		 Count=parseInt(<?php echo json_encode($count_res);?>); 		//count=parseInt(<?php echo json_encode($count_appointment);?>);
		 //alert(Count);
		 if( Count==0)
		 {
		  alert("no need u macha ........ u r not admitted");
		 }
		 else
		 {
		 Namea=String(<?php echo json_encode($name);?>);
		 Froma=String(<?php echo json_encode($a);?>);
		 Toa=String(<?php echo json_encode($b);?>);
		 //alert("i got the fields");
		 Name_Array=Namea.split(",");
		 From_Array=Froma.split(",");
		 To_Array=Toa.split(",");
		 //alert("i got the arrays");
		 for(j=0;j<Count;j++)
		{
			var Badge=From_Array[j]+ " to "+To_Array[j];
			fun_attendedgen(Name_Array[j],Badge);
		
		}
		} //end of else
	}	
		
		
		
		//fun_attendedgen("himanshu","4AM");		
		
		
	}
	function fun_attendedgen(display,badge)
	{
		var list=document.getElementById("ulist");  //parent
		var newlist=document.createElement("li")
		newlist.setAttribute('class','list-group-item');
		newlist.innerHTML=display;
		var newspan=document.createElement("span");
		//newspan.className = "badge";										// both of the method works  i like bottom one :D :D :D			
		newspan.setAttribute('class','badge');								//
		newspan.innerHTML=badge;
		newlist.appendChild(newspan);
		list.appendChild(newlist);
	
	
	
	
	}
	
	function fun_notice()
	{
	 <?php include('php_noticeboard.php'); ?>
	 global_notice++;
	 if(global_notice==1)
	 {
	  count=parseInt(<?php echo json_encode($count_appointment2);?>);
		if(count==0)
			alert("no more lab reports");
		else
		{
		 labname_got=String(<?php echo json_encode($labname);?>);
		 labname_array=labname_got.split(",");
		 for(j=0;j<count;j++)
		 {
			if(j==4)
			 break;				// thus i am printing only latest 5 reports
			noticeboard=document.getElementById("notice_manage");          
			var newlist=document.createElement("li");
			var newspan=document.createElement("span");
			newspan.setAttribute('class','glyphicon glyphicon-headphones text-success');
			//newspan.setAttribute('text-success','5px');
			newspan.innerHTML=" Your	"+labname_array[j]+" has come !!"; 
			newlist.appendChild(newspan);
			noticeboard.appendChild(newlist);
		  
		 } //end of for
		 
		 
		} //end of else that will manage printing of reports if they exists
	 } //end of global if
	 <!-- code to display appointment -->

		
		<!--  till here -->
	 
	 notice2();
	 
	} //end of function
	
	function notice2()			//to add consultation time and date on notice board
	{
	 <?php include('notice_appointment.php'); ?>
	global_noticeappointment++;
	 if(global_noticeappointment==1)
	 {
	  count3=parseInt(<?php echo json_encode($count_appointment3);?>);
		if(count3==0)
			alert("no more appointment for u");
		else
		{
		 docname_got=String(<?php echo json_encode($docname);?>);
		 time_got=String(<?php echo json_encode($time);?>);
		 date_got=String(<?php echo json_encode($date);?>);
		 
		 docname_array=docname_got.split(",");
		 time_array=time_got.split(",");
		 date_array=date_got.split(",");
		 for(j=0;j<count3;j++)
		 {
			//if(j==4)
			 //break;				// thus i am printing only latest 5 reports
			//alert(type(date_array[j]));
			var today=new Date();
			var dget=new Date(date_array[j]);			//date got
			if (dget>=today)
			{	noticeboard=document.getElementById("notice_manage");          
				var newlist3=document.createElement("li");
				var newspan3=document.createElement("span");
				newspan3.setAttribute('class','glyphicon glyphicon-map-marker text-danger');
				//newspan.setAttribute('text-success','5px');
				newspan3.innerHTML=" You have appointment  at "+time_array[j]+" for doctor "+docname_array[j]+" on "+date_array[j]; 
				newlist3.appendChild(newspan3);
				noticeboard.appendChild(newlist3);
		  
			}
		 } //end of for
		 
		 
		} //end of else that will manage printing of reports if they exists
	 } //end of global if
	
	
	}
	
	function treatmenthistoryshower()
		{	
			//alert("inside");
			//var selected_patient_row=event.currentTarget;
			//var child_nodes=selected_patient_row.parentNode.parentNode.childNodes;
			//var patient_id=child_nodes[1].innerHTML;
			//alert(small_patient_row);
			document.getElementById("modal-display").innerHTML="";
			//document.getElementById("modal-display1").innerHTML="";
	 
			var display_modal_body=document.getElementById("modal-display");

			event.currentTarget.setAttribute("data-toggle", "modal");
			event.currentTarget.setAttribute("data-target", "#myModal");
			//alert("ok");
		
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
			
			}//end of function
			xhr.open("GET","showhistory.php", true);
	xhr.send();
	
			
			
			
			
			
			
			
			/*
			$.ajax(
					{
						url: 'showhistory.php' ,
						dataType: 'json' ,                                
						success: function(data)
										{
											//alert('in success');
											$.each(
													data,function(i,item)
													{   
														//alert(item.data);
														$('#modal-display').append(item.Data);
													}
												);
										} ,
						error: function()
										{
											alert('No data found !! Your no health history is with us ');
										}
					}
				  );
			//document.getElementById('light').style.display='block';
			//document.getElementById('fade').style.display='block';
		
			*/
	}
		function fun_prescription()
	{
	 //alert("Prescription functiooon   called");
	 <?php include('php_prescription.php'); ?>
	 global_prescription++;
	 //alert(global_room_count);
	 if(global_prescription==1)			//so that query is not executed again
	 {
		//alert("inside loop1 ");
		count=parseInt(<?php echo json_encode($count_appointment2);?>);
		//alert(count+1);
			//alert("inside count=0");
			//fun_noroom();
		if(count == 0)
			alert("no prescription");
		else
		{	Remarks_got=String(<?php echo json_encode($remarks);?>);
			Prescription_got=String(<?php echo json_encode($prescription_id);?>)
			Doctor_got=String(<?php echo json_encode($doctor_name);?>);
			
			Remarks_array=Remarks_got.split(",");
			Doctor_array=Doctor_got.split(",");
			Prescription_array=Prescription_got.split(",");
			for(i=0;i<count;i++)
				{
					//alert("inside for");
				prescription_list_generator(i,Remarks_array[i],Prescription_array[i],Doctor_array[i]," <a style=\"cursor:pointer;\" onclick=\"prescriptioncontent()\" data-toggle=\"modal\" data-target=\"#myModal1\">click here</a>");
				}
		}	
		
	 }
	} //end of function to add room admit info
	
	function prescription_list_generator(serial,remark,pres,doctor,s)
	{
			//alert("prescripron list geberatot called");
			Serial=serial+1;
			//Remarks=remarks;
			//alert("inside payment list generaj,bj");
			var t=document.getElementById("presbody");
			//alert(t);
			var row = t.insertRow(serial);
			
			
			//form_dept.appendChild(remove_dept);

			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			
			cell1.innerHTML=Serial;
			cell2.innerHTML=remark;
			cell3.innerHTML=pres;
			cell4.innerHTML=doctor;
			cell5.innerHTML=s;
			
			//cell12.innerHTML=Remarks;
	
	
	
	
	
	} //end of function
	
	function prescriptioncontent()
	{
	 //alert("wait i will zoo it");
	 var selected_patient_row=event.currentTarget;
	 var child_nodes=selected_patient_row.parentNode.parentNode.childNodes;
	 var prescription_id=child_nodes[2].innerHTML;
	 
			//alert(small_patient_row);
	 document.getElementById("modal-display1").innerHTML="";
	 
	 var display_modal_body=document.getElementById("modal-display1");

	event.currentTarget.setAttribute("data-toggle", "modal");
		event.currentTarget.setAttribute("data-target", "#myModal1");
		
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
	xhr.open("GET","show_prescription.php?prescription_id="+prescription_id, true);
	xhr.send();
	}
	 
	 
			/*$.ajax(
					{
						url: 'show_prescription.php?prescription_id='+prescription_id ,
						dataType: 'json' ,                                
						success: function(data)
										{
											//alert('in success');
											$.each(
													data,function(i,item)
													{
														$('#modal-display1').append(item.Data);
													}
												);
										} ,
						error: function()
										{
											alert('error');
										}
					}
				  );*/
			//document.getElementById('light').style.display='block';
			//document.getElementById('fade').style.display='block';
		
		
		function fun_reports()
		{
		 //alert(" reports  functiooon   called");
		<?php include('php_reports.php'); ?>
		global_reports++;
		if(global_reports==1)			//so that query is not executed again
		{
		count=parseInt(<?php echo json_encode($count_appointment2);?>);
		//alert(count+1);
		if(count == 0)
			alert("no report for you !!! Y are fit and fine !!");
		else
		{	
			slno_got=String(<?php echo json_encode($slno);?>);
			labname_got=String(<?php echo json_encode($labname);?>)
			slno_array=slno_got.split(",");
			labname_array=labname_got.split(",");
			for(i=0;i<count;i++)
				{
				 report_list_generator(i,slno_array[i],labname_array[i]," <a style=\"cursor:pointer;\" onclick=\"reportcontent()\" data-toggle=\"modal\" data-target=\"#myModal1\">click here</a>");
				}
		}	
		
	 }
	} //end of function to add report info
	
	function report_list_generator(serial,reportno,labname,SEE)
	{
			//alert("prescripron list geberatot called");
			Serial=serial+1;
			var t=document.getElementById("reportbody");
			var row = t.insertRow(serial);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			cell1.innerHTML=Serial;
			cell2.innerHTML=reportno;
			cell3.innerHTML=labname;
			cell4.innerHTML=SEE;
	}
	
	function reportcontent()
	{
	 //alert("wait i will zoo it");
	 var selected_patient_row=event.currentTarget;
	 var child_nodes=selected_patient_row.parentNode.parentNode.childNodes;
	 var reportno=child_nodes[1].innerHTML;
	 document.getElementById("modal-display1").innerHTML="";
	 //document.getElementById("modal-display1").innerHTML="";
	 
	 var display_modal_body=document.getElementById("modal-display1");

		event.currentTarget.setAttribute("data-toggle", "modal");
		event.currentTarget.setAttribute("data-target", "#myModal1");
		
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
			
		}//end of function
	xhr.open("GET","show_reports.php?slno="+reportno, true);
	xhr.send();
	 
	 
	 
	 /*
	 $.ajax(
	{
						url: 'show_reports.php?slno='+prescription_id ,
						dataType: 'json' ,                                
						success: function(data)
										{
											//alert('in success');
											$.each(
													data,function(i,item)
													{
														$('#modal-display1').append(item.Data);
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
	
	
	 */
	 
	} //end of function
	
	function display_profile()
	{
	//alert("handler");
	<?php include ('profile.php');?>
	var name=document.getElementById("profile_name").value=String(<?php echo json_encode($name);?>);
	//alert(name);
	var name=document.getElementById("profile_age").value=String(<?php echo json_encode($age);?>);
	var name=document.getElementById("profile_bgroup").value=String(<?php echo json_encode($bgroup);?>);
	var name=document.getElementById("profile_phone").value=String(<?php echo json_encode($phone);?>);
	var name=document.getElementById("profile_address").value=String(<?php echo json_encode($address);?>);
	}
	
	
	
	
	
	function fun_appointment()
	{
	 
	 // alert("function called");
	 //alert(global_appointment);
			global_appointment++;
		if(global_appointment==1)			//so that query is not executed again
		{
		 <?php include('php_appointments.php'); ?>
		 //alert("Inside");

		count=parseInt(<?php echo json_encode($count_appointment4);?>);
		//alert(count);
		//alert(count+1);
		if(count == 0)
			alert("You have no appointment schedules with us !! To book an appointment go to search doctor tab !!");
		else
		{	
			presid_got=String(<?php echo json_encode($presid);?>);
			adate_got=String(<?php echo json_encode($adate);?>);
			atime_got=String(<?php echo json_encode($atime);?>)
			docname_got=String(<?php echo json_encode($docname);?>)
			presid_array=presid_got.split(",");
			adate_array=adate_got.split(",");
			atime_array=atime_got.split(",");
			docname_array=docname_got.split(",");
			for(i=0;i<count;i++)
				{
				 appointment_list_generator(i,presid_array[i],adate_array[i],atime_array[i],docname_array[i]," <a onclick=\"deleteappointment()\" >Cancel </a>");
				}
		}	
		
	 }//end of if
	
	}
	
	function appointment_list_generator(serial,presid,adate,atime,docname,s)
	{
			var t=document.getElementById("appointmentbody");
			var row = t.insertRow(serial);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			var cell6 = row.insertCell(5);
			cell1.innerHTML=serial+1;
			cell2.innerHTML=presid;
			cell3.innerHTML=adate;
			cell4.innerHTML=atime;
			cell5.innerHTML=docname;
			var today=new Date();
			var dget=new Date(adate);			//date got
			if (dget>=today)
				cell6.innerHTML=s;
			else
				cell6.innerHTML="DONE";
	}
    function deleteappointment()
    {
	 //var r=prompt("Are you sure to want to delete the appointment
	 var x;
    	if (confirm("Are your sure that you want to cancel this appointment !!\n You may need to wait for long to get another appointment !!") == true) 
		{
			var selected_wait_row=event.currentTarget;
			var child_nodes=selected_wait_row.parentNode.parentNode.childNodes;
			var presid=child_nodes[1].innerHTML;
			//alert(presid);
			alert("deleted");
			var xmlhttp = new XMLHttpRequest();
			var count_ajax=0;
			xmlS.onreadystatechange=function(){
				//if(this.readyState==4 and this.status ==200)
				//{
					//var response=this.responseText;
					//alert(response);
				}
			
			
			xmlhttp.open("GET","remove_app.php?presid="+presid,true);
			xmlhttp.send();
		} //end of if  
		else {
				alert("not deleted");
	
		}
		document.location.href="patient.php";
		//location.hash = '#Patient_homepage';
		//document.getElementById("appointmentbody").innerHTML="";
		//global_appointment=0;
	} 
	
	function display_doctor_start()
	{
	 var choice=document.getElementById("method_selected").value;
	 if(choice == "none")
		alert("please select a method first");
	 else if(choice=="name")
	  display_doctor1();
	 else
	  display_doctor2();
	  
	}
	function display_doctor1()
		{
			//alert("hello");
			//var x=document.getElementById("patient_list_body");
			var x=document.getElementById("searchdocbody"); 
			 x.innerHTML="";
			var doctor_name=document.getElementById("enteredname").value;
			if (doctor_name=="")
				alert(" plzz Enter the name of Doctor");
			else
			{
			//'alert(patient_name);
			//Ajax method for search
			$.ajax(
					{
						url: 'dynamic_doctor.php?dname='+doctor_name ,
						dataType: 'json' ,                                
						success: function(data)
										{
											//alert(data);
											$.each(
													data,function(i,item)
													{
														$('#searchdocbody').append("<tr><td>"+(i+=1)+"</td><td>"+item.docname+"</td><td>"+item.did+"</td><td><a onclick=\"bookanappointment()\">click here</a></td></tr>");
													}
												);
										} ,
						error: function()
										{
											alert('No doctor found with the given name');
										}
					}
					);
			}// end of else
		}
		
		function display_doctor2()
		{
		 //alert("hello2");
		  var x=document.getElementById("searchdocbody"); 
			 x.innerHTML="";
			var dept_name=document.getElementById("enteredname").value;
			//alert(dept_name);
			if (dept_name=="")
				alert(" plzz Enter the department name of Doctor !!");
			else
			{
			//'alert(patient_name);
			//Ajax method for search
			$.ajax(
					{
						url: 'dynamic_doctor2.php?dname='+dept_name ,
						dataType: 'json' ,                                
						success: function(data)
										{
											//alert(data);
											$.each(
													data,function(i,item)
													{
														$('#searchdocbody').append("<tr><td>"+(i+=1)+"</td><td>"+item.docname+"</td><td>"+item.did+"</td><td><a onclick=\"bookanappointment()\">click here</a></td></tr>");
													}
												);
										} ,
						error: function()
										{
											alert('No doctor found with the given name');
										}
					}
					);
			}// end of else
		 
		 
		 
		 
		}
		function bookanappointment()
		{
		 alert("your appointment will be booked");
		 var selected_wait_row=event.currentTarget;
		 var child_nodes=selected_wait_row.parentNode.parentNode.childNodes;
	     var doctor_id=child_nodes[2].innerHTML;
		 //alert(doctor_id);
		 alert("PLEASE CHECK YOUR Appointment LIST !! For any questions contact us !!");
		 //var myform=document.createElement("form");
		 //var myinput=document.createElement("input");
		 //myinput.type="text";
		 
		 
		 //myform.method="POST";
		 //myform.action="time1.php?id='1'";
		 //myform.submit();
		 
		 //var wait_hidden=document.getElementById("wait_hidden");
			//wait_hidden.value=wait_patient_name;
			//alert(app_hidden1.value);
			//var wait_form=document.getElementById("wait_form");
			//wait_form.action="time_test.php";
			//wait_form.submit();
		//document.location.href="time_test2.php?docid=1";
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
		 //if(this.readyState==4 and this.status ==200)
			//{
				//var response=this.responseText;
				//alert(response);
			//}
		}
		xmlhttp.open("GET","time_test2.php?docid="+doctor_id,true);
		xmlhttp.send();
		location.reload(true);
		}
		//location.reload(true);
		
		function stopit()
	 {
	  var myvideo=document.getElementById("myvideo1");
	  myvideo.pause();
	 
	 }
		
	</script>
	
</html>
			