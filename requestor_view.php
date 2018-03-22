<?php include('header.php');

$mnid=$_SESSION["id"]; 





if($_SESSION["id"] == " "){
?>

<script>
window.top.location.href = "http://portal.progressive.in/web/guest/home?p_p_state=maximized&p_p_mode=view&saveLastPath=0&_58_struts_action=%2Flogin%2Flogin&p_p_id=58&p_p_lifecycle=0&_58_redirect=%2Fweb%2Fprocare%2Farf";
</script> 
<?php 

}
//$mnid=$_SESSION["id"]; 

?>
<script>
function showView(str){
	
	if(str==""){
		
		document.getElementById("view_pending").innerHTML = "";
	} else {
		
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("view_pending").innerHTML = this.responseText;	
			}
		};
		xmlhttp.open("GET","view.php?q="+str, true);
		xmlhttp.send();
		
	}
}
</script>
<style type="text/css">
.md{padding:10px; background-color:#cce6ff; border:1px solid #000; margin-top:5; margin-bottom:5px;}
.cd{ background-color:#DCDCDC;}
.cost{ background-color:#F8F8FF; background-color:#737373;}
.container{background-color: #f7f5ee;}
#show_table{width: 15%; background-color: #d9d9d9;
    color: white;
    padding: 5px 10px;
    margin: 5px 0;
    border: none;
    border-radius: 4px;
	cursor: pointer; }
#status{width: 20%;
    padding: 3px 20px;
    margin: 3px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
box-sizing: border-box;}
input, select, textarea {
    width: 60%;
    padding: 3px 20px;
    margin: 3px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 80%;
    background-color: #4286f4;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    
}
//#d4d4d4//
</style>
	


	<div class="container">
		<div class="row">
			<div class="col-md-3"><b><u>Manager View</u></b></div>
			<div class="col-md-9"></div>
			<!--<div class="col-md-1"><a href="tl_emp_view.php?reqid=<?php echo $mnid;?>"><img src="images/3.jpg" title="HR Section" width="64" height="58" /></a></div>
			<div class="col-md-1"><a href="arf_form.php?mnid=<?php echo $mnid;?>"><img src="images/1.jpg" title="New ARF" width="64" height="58" /></a></div>-->
		</div>
		<!--<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-10">Search &nbsp <select name="status" id="status" onchange="showView(this.value)">
									
									<option value="Pending">Pending</option>
									<option value="Approved">Approved</option>
									<option value="Rejected">Rejected</option>
									<option value="Cancelled">Cancelled</option>
								</select>
			</div>
		</div>-->
	</div>
	<!--<div id="view_pending" style="display:block;">-->
		<div class="maintable5">

<div class="datagrid">

<table>
			<div class="row">
		
			<thead>
				<tr>
					<th>Serial No.</th>
					<th>Associate Code</th>
					<th>Associate Name</th>
					<th>Client/Project</th>
					<th>Location</th>
					<th>Contact No.</th>
					
				</tr>
			</thead>
		
	</div>
	<tbody>
	<?php
						
				$sql="SELECT * FROM user_directory INNER JOIN user_erp ON user_directory.empid=user_erp.Emp_Id WHERE user_directory.manager='$mnid' AND
					user_erp.Emp_Status='E' ORDER BY `user_directory`.`site_name` ASC";
				$qry=mysql_query($sql);
				$i=1;
				if(mysql_num_rows($qry)>0){
					while($row=mysql_fetch_assoc($qry)){
						
							?><div class="row">
								
								<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $row['empid']; ?></td>
								
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['site_name']; ?></td>
								<td><?php echo $row['location']; ?></td>
								
								<td><?php echo $row['contact_no']; ?></td>
								</tr></div>
								<?php 
								$i++;
							}
						}
						
				?>
				
				
				</tbody>
				</table>
				</div>
			</div>
		</div>
				
				
	
				
	
</body>
</html>
<?php

 mysql_close($conn);
?>