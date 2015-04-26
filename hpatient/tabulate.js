	count =0;
	    function refresh_table()
		{
			var table = document.getElementById("patient_tab");
			for(var i = 1; i < table.rows.length;)
			{   
			 table.deleteRow(i);
			}
		
		}
		function add_row(q,w,e,r,t)
		{   
		    
			var table = document.getElementById("patient_tab");
			if((count)%10==0)
				{
				 refresh_table(table);
				 
				} 
		    if(count==26)
			 return;
			var row = table.insertRow((count%10)+1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			var cell6 = row.insertCell(5);
			
			cell1.innerHTML = count;
			cell2.innerHTML = q;
			cell3.innerHTML = w;
			cell4.innerHTML = e;
			cell5.innerHTML = r;
			cell6.innerHTML = t;
           count++;
        }
		//We will write php code to fetch data from db and then store them in -->
		//<!--these 5 variables and then this will be done -->
		function fetch()     //it is simulating the working of extraction of data
		{
		var h="dga";
		var i="dga";
		var j="dga";
		var k="dga";
		var l="dga";
		add_row(h,i,j,k,l);
		add_row("hello","i","am","an","indian");
		add_row("hello","i","am","an","indian");
		add_row("hello","i","am","an","indian");
		add_row("hello","i","am","an","indian");
		add_row("hello","i","am","an","indian");
		add_row("hello","i","am","an","indian");
		add_row("hello","i","am","an","indian");
		add_row("hello","i","am","an","indian");
		add_row("hello","i","am","an","indian");
		
		}
	    fetch();

