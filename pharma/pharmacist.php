<?php
session_start();
 if(empty($_SESSION['user'])) 
    { 
        
        header("Location: ../login.php"); 
         
        
        
        die("Redirecting to login.php"); 
    } 
?>



<!-- this page is the main page for the pharmacist.this contains the list of medicine and their description.also it contains more details of every medicine which you can search by name,details like expiry date and stock available.
  you also have a page to add new medicine which come in the stock.the next module manages the precription given by the doctor.it also has a module to calculate the cost of medicine sold and to update the stocks-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
	<link rel="shortcut icon" href="images/logo.png" type="imag/icon"/>
    
    <title>PHARMACIST</title>

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
    font-family: "Segoe UI";
    font-weight: 200;
    src: local("Segoe UI Light");
   }
   
   .form-signin .form-control:focus 
   {
    z-index: 2;
   }
   .form-signin .form-signin-heading
   {
    font-family: "Segoe UI";
    font-weight: 200;
    src: local("Segoe UI Light");
   }
   h1{
    font-family: "Segoe UI";
    font-weight: 200;
    src: local("Segoe UI Light");
   }

	</style>

  <script>

i=1;
function ajax_function()//this ajax function is to search the medicine from the db asynchronously.
{
      document.getElementById("table_body").innerHTML="";
      var search_value=document.getElementById("search").value;
     $.ajax({
           
          url: 'search_manage_medicine.php?search_value='+search_value ,
                dataType: 'json' ,                                
                success: function(data){
                    $.each(data,function(i,item){
                        $('#table_body').append("<tr><td>"+(i+1)+"</td><td>"+item.medicine_name+"</td><td>"+item.category+"</td><td>"+item.description1+"</td><td>"+item.cost+"</td><td>"+item.date_manufacture+"</td><td>"+item.date_expiry+"</td><td>"+item.manufacturing_company+"</td><td>"+item.stock_available+"</td><td><a onclick=\"removeMethod()\">Remove</a></td></tr>");
                        



                    });
                } ,
                error: function(){
                  alert('error');
                }
            });
      
}
function removeMethod()//this function calls remove_medicine to erase an medicine from db
{
  
  var selected_row = event.currentTarget;
  var childnodes = selected_row.parentNode.parentNode.childNodes;
  var medicine_name = childnodes[1].innerHTML;
 
   xhr = new XMLHttpRequest();
   xhr.onreadystatechange = print_alert;
   var query_string = "?medicine_name=" + medicine_name;
   xhr.open("GET","remove_medicine.php"+query_string,true);
   xhr.send(null);


  selected_row.parentNode.parentNode.innerHTML ="";
}

function print_alert()
{
  if(xhr.readyState == 4 && xhr.status == 200)
  {
  }
}

function addrow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	if(rowCount < 5){                            // limit the user from creating fields more than your limits
		var row = table.insertRow(rowCount);
		
		//row.childNodes[2].childNodes[0].value =""
        //row.childNodes[6].childNodes[0].value = 0;
		var colCount = table.rows[0].cells.length;
		for(var i=0; i<colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		}
	}else{
		 alert("Maximum allowed is 5");
			   
	}
}
function remrow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	if(rowCount>1)
	table.deleteRow(rowCount-1);
}


</script>  
 <?php
  $con = mysqli_connect('localhost','root','','hospital_management');
  $sql0 = "select * from pharmacy";
  $manmed1 = mysqli_query($con,$sql0);
  $sql3 ="select distinct patient.p_name,patient.patient_id,doctor.name,consultation.prescription from patient,doctor,consultation where patient.patient_id=consultation.patient_id and doctor.doctor_id=consultation.doctor_id";
  $prescptn = mysqli_query($con,$sql3);
  $showp = mysqli_query($con,$sql3);
  mysqli_close($con);
  ?>
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
                <a class="navbar-brand" href="#">PHARMACIST</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="pharmacist.php">Home</a></li>
                  <li><a href="../logout.php">LogOut</a></li>
                </ul>
          </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
              <ul class="nav nav-sidebar">
                  <li class="active">
				  <?php
				$pid=$_SESSION['user']['id'];
				$con=mysqli_connect("localhost","root","","hospital_management");
				$pic="SELECT picture from staff where s_id=$pid";

				$one=mysqli_query($con,$pic);
				while($row=mysqli_fetch_array($one))
				{
				echo '<img class = "img-circle" src="data:image/png;base64,' . base64_encode($row['picture']) . '" height="220px" width="180px"/>';
				} 
        ?>
				  
				  
				  </li>
              </ul>
          
		          <ul class="nav nav-sidebar">
		            <ul class="nav nav-tabs nav-stacked">
				          <li id="link1" class="active"><a data-toggle="tab" href="#dash">Dashboard</a></li>
				          <li id="link2" ><a data-toggle="tab" href="#med">Medicine Category</a></li>
				          <li id="link5"><a data-toggle="tab" href="#manmed">Manage Medicine</a></li><li id="link9"><a data-toggle="tab" href="#p">Prescription</a></li>
			         </ul>
		          </ul>	
          </div>
		      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		        <div class="tab-content">
              <div id="dash" class="tab-pane fade in active">
                <h1 class="page-header" style="font-family: "Segoe UI"">Pharmacy Dashboard</h1>
                <div>
                  <ul class="nav nav-pills" role="tablist" >
                    <a onclick="nav_set(2)" data-toggle="tab" href="#med">
                    <img src="medcat.png" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <a onclick="nav_set(5)" data-toggle="tab" href="#manmed">
                    <img src="med.jpg" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
                    <a onclick="nav_set(9)" data-toggle="tab" href="#p">
                    <img src="prescription.png" height="200px"></img></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <br>
                    <br>
                </div>
              </div>
              <!--to display the medicine & their discrption-->
              <div id="med" class="tab-pane fade">
                  <h1 class="sub-header" style="font-family: "Segoe UI"" >Manage Medicine</h1><br>
		              <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="tab" href="#list_med"><span class="glyphicon glyphicon-list"></span>Medicine List</a></li>
                    <!--<li><a data-toggle="tab" href="#add_med"><span class="glyphicon glyphicon-plus"></span>  Add Medicine</a></li>-->
                  </ul>
	                 <div class="tab-content">
                     <div id="list_med" class="tab-pane fade in active">
                      <br>
                      <br>
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Description</th>
                            </tr>
                          </thead>
                          <tbody id="dept_table_body">
                            <?php
                                $i=0;
                                while($r=mysqli_fetch_array($manmed1))  
                                {
   
                                    $i=$i+1;//to display index
                                    echo "<tr>
                                    <td>".$i."</td>
                                    <td>".$r[0]."</td>   
                                    <td>".$r[5]."</td>   
                                    </tr>";
                                }
                            ?>
                          </tbody>
                      </table>
                     </div>
                  </div>
                </div>
              </div>
              <!-- to display the the full details of the medicines available and also add new medicines-->
		            <div id="manmed" class="tab-pane fade">
                  <h1 class="sub-header" style="font-family: "Segoe UI"" >Manage Medicine</h1><br>
                  <ul class="nav nav-pills">
                    <li><a data-toggle="tab" href="#list_med1"><span class="glyphicon glyphicon-list"></span>Medicine Category List</a></li>
                    <li><a data-toggle="tab" href="#add_medcat"><span class="glyphicon glyphicon-plus"></span>  Add Medicine Category</a></li>      
                  </ul>
                  <div class="tab-content">
                    <div id="list_med1" class="tab-pane fade in active"> 
                      <table>
                        <tr><td><!-- to search the medicine -->
                        <label>Search: <input id ="search"  type="search" class="form-control"></input></td><td>&nbsp; &nbsp;<input type="submit" style="height:1;"  class="btn btn-sm btn-primary btn-block" value="Go" onclick="ajax_function()" id="ajax_function_id"></input></td></tr></label>
                      </table>
                      <br>
                      <br>
                      <div class="table-responsive">
                        <table class="table table-striped" id="manage_medicine_table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Medicine Name</th>
                              <th>Medicine Category</th>
                              <th>Description</th>
                              <th>Price</th>
                              <th>Manufacturing date</th>
                              <th>Expiry date</th>
                              <th>Manufacturing Company</th>
                              <th>Status</th>
                              <th>Manage</th>
                            </tr>
                          </thead>
                          <tbody id="table_body">
                          

                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- to add medicine -->
                    <div id="add_medcat" class="tab-pane fade">
                      <form class="form-signin" method="POST"  action="addmedcat.php">
                        <h2 class="form-signin-heading">Add Medicine Category</h2>
                        <input type="text"  class="form-control" placeholder="Medicine Name" name="medicine_name" id="medicine_name" required>
                        <input type="text"  class="form-control" placeholder="Medicine Category" name="medicine_category" id="medicine_category" required>
                        <input type="text"  class="form-control" placeholder="Description" name="description" id="description" required>
                        <input type="number"  class="form-control" placeholder="Price"  name="price" id="price" required>
                        <input type="date"  class="form-control" placeholder="Manufacturing Date" name="manufacturing_date" id="manufacturing_date" required>
                        <input type="date"  class="form-control" placeholder="Expiry Date"  name="expiry_date" id="expiry_date" required>
                        <input type="text"  class="form-control" placeholder="Manufacturing Company" name="manufacturing_company" id="manufacturing_company" required>
                        <input type="number"  class="form-control" placeholder="Status" name="status" id="status" required>
                        <br>  
                        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Add Medicine" ></input>
                      </form>
                    </div>
                  </div>
                </div>
                <div id="p" class="tab-pane fade">
                  <h1 class="sub-header" style="font-family: "Segoe UI"" >Manage Prescription</h1><br>
                  <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="tab" href="#list_p"><span class="glyphicon glyphicon-list"></span>Prescription List</a></li>
                    <li><a data-toggle="tab" href="#bill"><span class="glyphicon glyphicon-plus"></span>Billing</a></li>
                  </ul>
                  <div class="tab-content">
                    <div id="list_p" class="tab-pane fade in active">   
                      <br>
                    
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Doctor Name</th>
                              <th>Patient Name</th>
                              <th>Patient ID</th>
                              <th>Prescription</th>
                            </tr>
                          </thead>
                          <tbody><!--// to show doctors name patient n to display prescription-->
                              
                            <?php
                              $i=0;
                              while($r=mysqli_fetch_array($prescptn))  
                              {
   
                                $i=$i+1;
                                echo '<tr>
                                <td>'.$i.'</td>
                                <td>'.$r[2].'</td>
                                <td>'.$r[0].'</td>
                                <td>'.$r[1].'</td>
                                <td data-toggle="modal" data-target="#myModal'.$i.'"><button type="button" id="btn'.$i.'" class="btn btn-default" data-dismiss="modal">Show</button></td>
                                  </tr>';
                                //to show diff prescription for diff patient
                                echo '<div class="modal fade" id="myModal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <h4 class="modal-title" id="myModalLabel">Prescription</h4>
                                            </div>
                                            <div class="modal-body" id="modal-display">
                                           <pre>'.$r[3].'</pre>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>';
                              }

                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div> <!--to design modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Prescription</h4>
                        </div>
                        <div class="modal-body">
                          <?php 
                             $r=mysqli_fetch_array($showp);
                            echo '<p>'.$r[3].'</p>';
                          ?>
                        </div>
                        <div class="modal-footer">pharmacist   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="bill" class="tab-pane fade">
                      <h2 class="form-signin-heading">Billing</h2><br>
                        <button class="btn btn-lg btn-primary btn-block" style="width:50px;float:left;margin-right:520px;" onclick="addrow('billing_table')"><span class="glyphicon glyphicon-plus"></span></button>
                          <button class="btn btn-lg btn-primary btn-block" style="width:50px" onclick="remrow('billing_table')"><span class="glyphicon glyphicon-minus"></span> </button>
                          
						  
						  <div style="clear:left;"></div>
                            <br>
                            <form class="form-inline" method="POST"  action="billing.php">
                            <input type="text"  style="width:150px;" class="form-control" placeholder="Patient ID" name="pid" id="patient" style="margin-right:20px;margin-top:10px; " required/>
							<table id="billing_table">
                              <tbody>
                                <tr id="billing_row1"><!--<td><input type="text"  class="form-control" placeholder="Patient" name="pid[]" id="patient" style="margin-right:20px;margin-top:10px; " required/></td> -->   
                                <td><input type="text"  class="form-control" placeholder="Medicine" name="medicine[]" id="medicine[]" style="margin-right:20px;margin-top:10px;" required /></td>
                                <!--td><label for="sel1">Quantity:</label-->       
                               <td><input type = "number" min="0"  placeholder="quantity" name="quantity[]" style="margin-top:10px;"/></td></tr>
                              </tbody>
                            </table>
                            <br><br>
                            <input type="submit" class="btn btn-lg btn-primary btn-block"  style="width:150px" value="Confirm bill" ></input>
                            </form>
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
	b.classpharmacistactive="";
	a.className="";
	}
	</script>
  </body>
</html>
			
