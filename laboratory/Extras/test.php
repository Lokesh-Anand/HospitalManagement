<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
	
    
    
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

		<script src="jquery-1.11.2.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<style type="text/css">
			{
				.bs-example
				margin: 20px;
	     	}
		</style>	

	
	

 </head>

  
  
  
  
  
  
  
  <body >
		<!--Side Nav for Dept  -->
		<div id="AddDept" class="tab-pane fade in active">
            <h1 class="sub-header" >Manage Department</h1><br>
		  
		 <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab"  href="#list_dept"><span class="glyphicon glyphicon-list"></span> Department List</a></li>
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
		  
		
  </body>
</html>
			