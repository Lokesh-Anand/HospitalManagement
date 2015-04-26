<!-- This is part of hospital management module called nursing module 
     
      Which has list of patients and respective details like room number 
      
      A nurse is assigned Shift timings for each to cater for that patient 
      
      Nurse can work according to instructions given in prescription by doctor

    -->
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
    
    

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="dashboard.css" rel="stylesheet">

    
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    
  <!-- script for searching -->
   <script>
    xmlhttp=new XMLHttpRequest();
    
      xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      var t=document.getElementById('patable');
      var data = JSON.parse(xmlhttp.responseText);
      ff = ' <thead>                <tr>                  <th>#</th>                  <th>Patient Name</th>                  <th>Age</th>                  <th>sex </th>                  <th>Blood group</th>                  <th>Room number</th>                  <th>Type</th>                  <th>Allotment date</th>                  <th>Discharge date</th>                </tr>              </thead>              <tbody id="dept_table_body">'     ; 

      for(i = 0; i < data.length; i++)
       {
    
      //  t.innerHTML='<thead><tr><th>#</th> <th>Patient Name</th>    <th>Remarks</th>   <th>Prescription</th>   <th>Date</th>    </tr> </thead><tbody id="patient_details_table"><tr><td>'+data[i][2]+'</td><td>'+data[i][2]+'</td><td>'+data[i][1]+'</td><td>'+data[i][3]+'</td><td>'+data[i][4]+'</td><td><div class="modal fade" id="myModal'+i+' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"> <div class="modal-content">   <div class="modal-header">       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        <h4 class="modal-title" id="myModalLabel">Prescription</h4>     </div>      <div class="modal-body" id="modal-display">        '+        data[0][3]        +'     </div>     <div class="modal-footer">       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>            </div>   </div> </div></td></tr></tbody>'; 
  
            ff=ff+'  <tr><td>'+(i+1)+'</td><td>'+data[i][1]+'</td><td>'+data[i][2]+'</td><td>'+data[i][10]+'</td><td>'+data[i][3]+'</td><td>'+data[i][12]+'</td><td>'+data[i][11]+'</td><td>'+data[i][14]+'</td><td>'+data[i][15]+'</td></tr>';
        
            }
            t.innerHTML=ff+'</tbody></table>';

               }

                }

     function paclick()
  {
    fs=document.getElementById('patext');
    
    xmlhttp.open("GET","https://www.hospital.dev/nurse/search_manage_medicine.php?search_value="+fs.value,true);
    xmlhttp.send();

  }

</script>

<!-- script for checking -->

   <script>
    xmlhttp1=new XMLHttpRequest();
    
      xmlhttp1.onreadystatechange=function()
    {
    if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {

      var t=document.getElementById('chtable');
      var data = JSON.parse(xmlhttp1.responseText);
      ff = ' <thead>                <tr>                  <th>#</th>                  <th>Patient name</th>                  <th>Bed no</th>                  <th>Food and supplements</th>                  <th>Shift start</th>                  <th>Shift end</th>                                  </tr>              </thead>   '  ; 

      for(i = 0; i < data.length; i++)
       {
    
      //  t.innerHTML='<thead><tr><th>#</th> <th>Patient Name</th>    <th>Remarks</th>   <th>Prescription</th>   <th>Date</th>    </tr> </thead><tbody id="patient_details_table"><tr><td>'+data[i][2]+'</td><td>'+data[i][2]+'</td><td>'+data[i][1]+'</td><td>'+data[i][3]+'</td><td>'+data[i][4]+'</td><td><div class="modal fade" id="myModal'+i+' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"> <div class="modal-content">   <div class="modal-header">       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        <h4 class="modal-title" id="myModalLabel">Prescription</h4>     </div>      <div class="modal-body" id="modal-display">        '+        data[0][3]        +'     </div>     <div class="modal-footer">       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>            </div>   </div> </div></td></tr></tbody>'; 
  
            ff=ff+'  <tr><td>'+(i+1)+'</td><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td>'+data[i][4]+'</td><td>'+data[i][3]+'</td><td>'+data[i][2]+'</td></tr>';
        
            }
            t.innerHTML=ff+'</tbody></table>';

               }

                }

     function chclick()
  {
    fs=document.getElementById('chtext');
   
    xmlhttp1.open("GET","https://www.hospital.dev/nurse/search_manage_medicine1.php?search_value="+fs.value,true);
    xmlhttp1.send();

  }

</script>


<script>

xmlhttp1=new XMLHttpRequest();
    
      xmlhttp1.onreadystatechange=function()
    {
    if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {

      var t=document.getElementById('reptab');
      var data = JSON.parse(xmlhttp1.responseText);
      ff = ' <thead>                <tr>                  <th>#</th>                  <th>Patient name</th>                  <th>Bed no</th>                  <th>Food and supplements</th>                  <th>Shift start</th>                  <th>Shift end</th>                                  </tr>              </thead>   '  ; 

      for(i = 0; i < data.length; i++)
       {
    
      //  t.innerHTML='<thead><tr><th>#</th> <th>Patient Name</th>    <th>Remarks</th>   <th>Prescription</th>   <th>Date</th>    </tr> </thead><tbody id="patient_details_table"><tr><td>'+data[i][2]+'</td><td>'+data[i][2]+'</td><td>'+data[i][1]+'</td><td>'+data[i][3]+'</td><td>'+data[i][4]+'</td><td><div class="modal fade" id="myModal'+i+' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"> <div class="modal-content">   <div class="modal-header">       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        <h4 class="modal-title" id="myModalLabel">Prescription</h4>     </div>      <div class="modal-body" id="modal-display">        '+        data[0][3]        +'     </div>     <div class="modal-footer">       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>            </div>   </div> </div></td></tr></tbody>'; 
  
            ff=ff+'  <tr><td>'+(i+1)+'</td><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td>'+data[i][4]+'</td><td>'+data[i][3]+'</td><td>'+data[i][2]+'</td></tr>';
        
            }
            t.innerHTML=ff+'</tbody></table>';

               }

                }

     function chclick()
  {
    fs=document.getElementById('reptab2');
   
    xmlhttp1.open("GET","https://www.hospital.dev/nurse/search_manage_medicine1.php?search_value="+fs.value,true);
    xmlhttp1.send();

  }
</script>

  
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


  <!-- Database connection and query starts here  -->
    <?php

  $con = mysqli_connect('localhost','root','','hospital_management');
  
  $pid=$_SESSION['user']['id'];
  $sql0 = "SELECT * FROM patient";
  
  $sql2="SELECT patient.p_name, patient.room_no,nurse_work.shift_start,  nurse_work.shift_end,nurse_work.food
          FROM patient
          INNER JOIN nurse_work
          on patient.patient_id=nurse_work.patient_id and nurse_id=$pid";
 
 $sql7="SELECT DISTINCT p_name,a_date,remarks,prescription 
        FROM patient,consultation
        WHERE consultation.patient_id=patient.patient_id and patient.patient_id=5001";
  $sql1 = mysqli_query($con,$sql0);
  $sql3 = mysqli_query($con,$sql2);
  $sql6 = mysqli_query($con,$sql7);
  $sql8 = mysqli_query($con,$sql7);

  mysqli_close($con);

  ?>
  
  <!-- Database connection and query ends here  -->
  

 </head>

  
  
  
  
  
  
  
  <body>
                
                <!-- Navigation bar starts here  -->


    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">NURSE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="Nursemod.php.php">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="../logout.php">LogOut</a></li>
          </ul>
        </div>
      </div>
    </nav>


              <!-- Navigation bar ends here  -->


              <!-- Sidebar starts here -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
			
              <li class="active"><?php
			  $pid=$_SESSION['user']['id'];
        $con=mysqli_connect("localhost","root","","hospital_management");
        $pic="SELECT picture from nurse where nurse_id=$pid";

        $one=mysqli_query($con,$pic);
        while($row=mysqli_fetch_array($one))
        {
        echo '<img class = "img-circle" src="data:image/png;base64,' . base64_encode($row['picture']) . '" height="220px" width="180px"/>';
        } 
        ?></li>
            </ul>
          
      
          <ul class="nav nav-sidebar">
            <ul class="nav nav-tabs nav-stacked">
                <li id="link1" class="active"><a data-toggle="tab" href="#Nurse">Dashboard</a></li>
                <li id="link2" ><a data-toggle="tab" href="#Patient">Patient</a></li>
                <li id="link9"><a data-toggle="tab" href="#Checking">Checking</a></li>
                <li id="link5"><a data-toggle="tab" href="#Report">Report</a></li>
                 <li id="link9"><a data-toggle="tab" href="#Profile">Profile</a></li>

            </ul>
        </ul> 
        </div>
                 <!-- Sidebar ends here -->
        
  

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="tab-content">
				<div id="Nurse" class="tab-pane fade in active">
                  <h1 class="page-header" style="font-family:Segoe UI"> Nurse Dashboard </h1>
                   <div class="table-responsive">
								<ul class="nav nav-pills" role="tablist" >
									<div class="col-lg-4 col-sm-6 text-center">
										<a onclick="nav_set(2)" data-toggle="tab" href="#Patient" ><img class="img-circle img-responsive img-center" src="patient.png" alt="" height="220px" width="170px"></a>
										<h3>Patient</h3>
									</div>
									<div class="col-lg-4 col-sm-6 text-center">
										<a onclick="nav_set(9)" data-toggle="tab" href="#Patient" ><img class="img-circle img-responsive img-center" src="checking.jpg" alt="" height="220px" width="170px"></img></a>
										<h3>Checking</h3>
									</div>
									<div class="col-lg-4 col-sm-6 text-center">
										<a onclick="nav_set(5)" data-toggle="tab" href="#Patient" ><img class="img-circle img-responsive img-center" src="Report.jpg" alt="" height="220px" width="170px"></img></a>
										<h3>Report</h3>
									</div>
									
									
									<br><br>
								</ul>  
							</div>
				   
				   
				   
				   <iframe height="500px" width="1000px" style="border:none" src="index.html" align="center"></iframe> 
                    </div>   <!-- cloes first tab -->
                      
                    
                    

          
          <!-- Tab 1 Patient list starts here which contains deatils of patient in tabular format -->

                  <div id="Patient" class="tab-pane fade">
                  <h1 class="sub-header" style="font-family: "Segoe UI"" >Patient Details</h1><br>
              
                  <ul class="nav nav-pills">
                  <li class="active"><a data-toggle="tab" href="#list_dept"><span class="glyphicon glyphicon-list"></span> Patient List</a></li>
                  </ul>
  
          <!-- Patient details table starts here  -->
                  <div class="tab-content">
                      <div id="list_dept" class="tab-pane fade in active">
           
                      <label>Search: <input type="search" id="patext" class="form-control"></input> <button type="button" id="pabutton" onclick="paclick()" class="btn btn-default" >Search</button> </label><br><br>
                      <div class="table-responsive">
                        <table id="patable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient Name</th>
                            <th>Age</th>
                  
                            <th>Blood group</th>
                            <th>Room number</th>
                            <th>Type</th>
                            <th>Allotment date</th>
                            <th>Discharge date</th>
                        </tr>
                        </thead>
                        <tbody id="dept_table_body">
                
                        <?php
                          $i=0;
                          while($r=mysqli_fetch_array($sql1))  
                          {
   
                                        $i=$i+1;
                                         echo "
                            <tr>
                              <td>".$i."</td>
                              <td>".$r[1]."</td>
                              <td>".$r[2]."</td>
                              
                              <td>".$r[3]."</td>
                              <td>".$r[12]."</td>
                              <td>".$r[11]."</td>
                              <td>".$r[14]."</td>
                              <td>".$r[15]." </td>
                            </tr>";
                    
                            }

                          ?>
                      </tbody>
                    </table>
                </div>
          <!-- Patient details table ends here  -->
        </div>

        <!-- Patient tab ends here  -->

        
    </div>
      
      <!-- Checking tab starts here  -->
					</div>   <!-- closes 2nd tab-->
                                    


                                    <div id="Checking" class="tab-pane fade">
                                            <h1 class="sub-header" style="font-family: "Segoe UI"" >Checking </h1><br>
                                      
                                            <ul class="nav nav-pills">
                                        <li class="active"><a data-toggle="tab" href="#list_doc"><span class="glyphicon glyphicon-list"></span>List</a></li>
                                        <!-- <li><a data-toggle="tab" href="#add_doc"><span class="glyphicon glyphicon-plus"></span> Add Allotment</a></li>
                                         -->
                                       </ul>
                                        <div class="tab-content">
                                            <div id="list_doc" class="tab-pane fade in active">
                                           
                                            <label>Search: <input type="search" id="chtext" class="form-control"><!-- </input><button type="button" id="chbutton" onclick="chclick()" class="btn btn-default" >Search</button> --></label><br><br>
                                            <div class="table-responsive">
                                                <table id="chtable" class="table table-striped">
                                                        <thead>
                                                          <tr>
                                                            <th>#</th>
                                                            <th>Patient name</th>
                                                            <th>Bed no</th>
                                                            <th>Food and supplements</th>
                                                            <th>Shift start</th>
                                                            <th>Shift end</th>
                                                            <!-- tab content  -->
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                                                <?php
                                                                                $i=0;
                                                                              while($r=mysqli_fetch_array($sql3))  
                                                                              {
                                                         
                                                                      $i=$i+1;
                                                                      echo "<tr>
                                                                        <td>".$i."</td>
                                                                        <td>".$r[0]."</td>
                                                                        <td>".$r[1]."</td>
                                                                        <td>".$r[4]."</td>
                                                                        <td>".$r[2]."</td>
                                                                        <td>".$r[3]."</td>
                                                                        
                                                                      </tr>";
                                                                    }
                                                                      ?>
                                                                      
                                                           </tbody>
                                                  </table>
                                              </div>
                                        </div>

                                        <!-- checking ends here  -->
                                        <div id="add_doc" class="tab-pane fade">
                                           <form class="form-signin" method="POST"  action="Admin.html">
                                        <h2 class="form-signin-heading">Add Bed Allotment</h2>
                                    
                                    
                                        <input type="text"  class="form-control" placeholder="Bed Number" >
                                        <input type="text"  class="form-control" placeholder="Patient" >
                                        <input type="text"  class="form-control" placeholder="Allotment date" >
                                        <input type="text"  class="form-control" placeholder="Discharge date" >
                                        
                                    <br>
                                    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Add Allotment" ></input>
                                      </form>
                                        </div>
                                        
                                    </div>
                                        </div>
    
    <div id="Report" class="tab-pane fade">
            <h1 class="sub-header" style="font-family: "Segoe UI"">Report</h1><br>
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_nurse"><span class="glyphicon glyphicon-list"></span> Report List</a></li>
        
        
    </ul>
  <div class="tab-content">
        <div id="list_nurse" class="tab-pane fade in active">
      <label>Search: <input type="search" id="reptab2" class="form-control"><!-- </input><button type="button" id="chbutton" onclick="chclick()" class="btn btn-default" >Search</button>--></label><br><br>
          <div class="table-responsive">
            <table class="table table-striped" id="reptab">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Patient Name</th>
              <th>Remarks</th>
                  <th>Prescription</th>
                  
                  <th>Date</th>
                  
                </tr>
              </thead>
              <tbody id="patient_details_table">
                  <?php
                $i=0;
                
              while($r=mysqli_fetch_array($sql6))  
              {
                 
                $i=$i+1;

                echo '<tr>
                  <td>'.$i.'</td>
                  <td>'.$r[0].'</td>
                  <td>'.$r[2].'</td>
                  <td data-toggle="modal" data-target="#myModal'.$i.'"><button type="button" id="btn'.$i.'" class="btn btn-default" data-dismiss="modal">Show</button></td>
                  
                  <td>'.$r[1].'</td>
                  
                  
                </tr>';
      echo '<div class="modal fade" id="myModal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Prescription</h4>
      </div>
      <div class="modal-body" id="modal-display">

        <pre>'.$r[3].'<pre>

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
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Prescription</h4>
      </div>
      <div class="modal-body" id="modal-display">

        <?php
        echo $pres[2]; 
        ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
        <div id="add_nurse" class="tab-pane fade">
      <form class="form-signin" method="POST"  action="Admin.html">
        <h2 class="form-signin-heading">Add Report</h2>
    
    <select id="drop3" class="form-control" value="Type">
      <option default>Type</option>
      <option>Operation</option>
      <option>Birth</option>
      <option>Death</option>
      <option>Other</option>
    </select>
        <input type="text"  class="form-control" placeholder="Description" >
        <select id="drop4" class="form-control" placeholder="Doctor">
          <option default>Doctor</option>
      <option>Spongebob</option>
      <option>Donald</option>
      
    </select>
    <select id="drop5" class="form-control" placeholder="Patient">
      <option default>Patient</option>
      <option>Mario</option>
      <option>Mickey</option>
      
    </select>
        <input type="text"  class="form-control" placeholder="Date dd/mm/yyyy" >
       
        <br>
    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Add Report" ></input>
      </form>
        </div>
        
    </div>
    
        </div>
    <div id="AddPharmacist" class="tab-pane fade">
            <h1 class="sub-header" style="font-family: "Segoe UI"">Manage Pharmacist</h1><br>
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#list_pharmacist"><span class="glyphicon glyphicon-list"></span>  Pharmacist List</a></li>
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
    <!-- Prifle tab starts here  -->
        </div>
    <div id="Profile" class="tab-pane fade">
            <h1 class="sub-header" style="font-family: "Segoe UI"">Manage Profile</h1><br>
      <ul class="nav nav-pills">
        <!-- <li class="active"><a data-toggle="tab" href="#list_profile"><span class="glyphicon glyphicon-wrench"></span>  Manage Profile</a></li> -->
        <li ><a data-toggle="tab" href="#change_pass"><span class="glyphicon glyphicon-lock"></span>  Change Password</a></li>
        
    </ul>
    <div class="tab-content">
        <!--<div id="list_profile" class="tab-pane fade in active">
			<div class="table-responsive">
            <form class="form-signin" method="POST"  action="submit.php">
			<input type="text" name="n_name" class="form-control" value="Nurse" >
			<input type="email" name="n_email" class="form-control" value="Nurse@xyz.com" >
			<input type="text"  class="form-control" value="India" > 
			<input type="tel" name="n_tel"  class="form-control" value="3141592653" >
			<br>
			<input type="submit" class="btn btn-lg btn-primary btn-block" value="Update Profile" ></input>
			</form>
          </div>
        </div> -->
        <div id="change_pass" class="tab-pane fade">
      <form class="form-signin" method="POST"  action="Admin.html">
        
    
           
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
    

    
      
      
      
      
     <!-- Profile tab ends here  -->
     
      
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



<!-- Finally the module ends here -->