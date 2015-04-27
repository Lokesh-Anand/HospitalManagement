<!DOCTYPE html>
<html>
	<head>
		<title>Sample search</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
		function handler()
		{
			var patient_name=document.getElementById("patient").value;
			alert(patient_name);
			$.ajax({
				   
					url: 'dynamic_patient.php?patient_name='+patient_name ,
								dataType: 'json' ,                                
								success: function(data){
										alert('in success');
										$.each(data,function(i,item){
												$('#patient11').append("<tr><td>'"+item.Patient_Name+"'</td><td>'"+item.Age+"'</td><td>'"+item.Phone_No+"'</td><td>'"+item.Type+"'</td><td>'"+item.Room_No+"'</td></tr>");
												



										});
								} ,
								error: function(){
									alert('error');
								}
						});
				//});
		}
		</script>
	</head>
	<body>
		<label>Search :</label><input type="search" name="patient" id="patient" />
		                       <input type="submit" name="sub" id="sub" onclick="handler()"/>
		<table id="patient_table_body">
			<thead>
				<tr>
					<th>#</th>
					<th>Patient Name</th>
					<th>Age</th>
					<th>Phone No</th>
					<th>Blood Group</th>
					<th>Type</th>
					<th>Room No</th>
				</tr>
			</thead>
			<tbody id="patient11">
			</tbody>
		</table>
	</body>
</html>