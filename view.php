<?php 
//include('header.php');
session_start();
  include('conn.php');
  $mnid=$_SESSION["id"];
  $status=$_GET['q'];
?>
<div class="maintable5">

<div class="datagrid">

<table>
			<div class="row">
		
			<thead>
				<tr>
					<th>Arf No.</th>
					<th>Prog Location</th>
					<th>Requestor</th>
					<th>Client/Project</th>
					<th>Reason</th>
					<th>Hiring Against</th>
					<th>Position</th>
					<th>Expected Hire Date</th>
					<th>Recruiter</th>
					<th>Status</th>
				</tr>
			</thead>
		
	</div>
	<tbody>
	<?php
				if($status == "Pending"){		
				$sql="SELECT * FROM `arf_associate_data` WHERE `requestor_code`='$mnid'";
				$qry=mysql_query($sql);
				if(mysql_num_rows($qry)>0){
					while($row=mysql_fetch_assoc($qry)){
						if($row['status']=="RM-Pending" || $row['status']=="TL-Pending"){
							?><div class="row">
								
								<tr>
								<td><a href="form_requestor_view.php?arf_no=<?php echo $row['arf_no']; ?> "><?php echo "ARF-00".$row['arf_no']; ?></a></td>
								<td><?php echo $row['new_emp_branch']; ?></td>
								<?php
									$sqlry="SELECT name FROM user_directory WHERE `empid`='$mnid'";
									$qry1=mysql_query($sqlry);
									$row1=mysql_fetch_assoc($qry1);
									?>
								<td><?php echo $row1['name']; ?></td>
								<td><?php echo $row['new_emp_site']; ?></td>
								<td><?php echo $row['reason_for_hiring']; ?></td>
								<?php if($row['emp_name']==NULL){ ?>
								<td>NA</td><?php } else { ?>
								<td><?php echo $row['emp_name']; ?></td> <?php } ?>
								<td><?php echo $row['new_emp_desig']; ?></td>
								<td><?php echo $row['hiring_date']; ?></td>
								<td>NA</td>
								<td><?php echo $row['status']; ?></td>
								</tr></div>
								<?php
							}
						}
					}
				} else if($status == "Approved"){
					$sql="SELECT * FROM `arf_associate_data` WHERE `requestor_code`='$mnid'";
					$qry=mysql_query($sql);
					if(mysql_num_rows($qry)>0){
					while($row=mysql_fetch_assoc($qry)){
						if($row['status'] == "RM-Approved" || $row['status']=="MN-Pending" || $row['status']=="MN-Approved" || $row['status'] == "TL-Assigned" || $row['status'] == "TL-CWH" || $row['status'] == "TL-ON-HOLD"){
							?><div class="row">
								
								<tr>
								<td><?php if($row['status']=="MN-Pending"){ ?>
									<a href="arf_rm_form.php?arf_no=<?php echo $row['arf_no']; ?> "><?php echo "ARF-00".$row['arf_no']; ?></a>
								<?php } else if($row['status'] == "TL-Assigned" || $row['status'] == "TL-CWH" || $row['status'] == "TL-ON-HOLD" || $row['status']=="MN-Approved"){ ?>
								<a href="form_rm_view.php?arf_no=<?php echo $row['arf_no']; ?> "><?php echo "ARF-00".$row['arf_no']; ?></a>
								<?php } else { ?>
								<a href="form_requestor_view.php?arf_no=<?php echo $row['arf_no']; ?> "><?php echo "ARF-00".$row['arf_no']; ?></a><?php } ?></td>
								<td><?php echo $row['new_emp_branch']; ?></td>
								<?php
									$sqlry="SELECT name FROM user_directory WHERE `empid`='$mnid'";
									$qry1=mysql_query($sqlry);
									$row1=mysql_fetch_assoc($qry1);
									?>
								<td><?php echo $row1['name']; ?></td>
								<td><?php echo $row['new_emp_site']; ?></td>
								<td><?php echo $row['reason_for_hiring']; ?></td>
								<?php if($row['emp_name']==NULL){ ?>
								<td>NA</td><?php } else { ?>
								<td><?php echo $row['emp_name']; ?></td> <?php } ?>
								<td><?php echo $row['new_emp_desig']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($row['hiring_date'])); ?></td>
								<?php
									$recruiter_id = $row['recruiter_id'];
									$sqlry1="SELECT name FROM user_directory WHERE `empid`='$recruiter_id'";
									$qry2=mysql_query($sqlry1);
									$row2=mysql_fetch_assoc($qry2);
									
									if($row['status']=="MN-Pending" || $row['status']=="MN-Approved" || $row['status'] == "TL-CWH" || $row['status'] == "TL-ON-HOLD"){
									?>
									<td>NA</td>
									<?php } else { ?>
								<td><?php echo $row2['name']; ?></td><?php } ?>
								<td><?php echo $row['status']; ?></td>
								</tr></div>
								<?php
							}
						}
					}
				}else if($status == "Rejected"){
					$sql="SELECT * FROM `arf_associate_data` WHERE `requestor_code`='$mnid'";
					$qry=mysql_query($sql);
				if(mysql_num_rows($qry)>0){
					while($row=mysql_fetch_assoc($qry)){
						if($row['status'] == "RM-Rejected" || $row['status'] == "MN-Rejected" || $row['status'] == "TL-Rejected"){
							?><div class="row">
								
								<tr>
								<?php if($row['status'] == "MN-Rejected" || $row['status'] == "RM-Rejected"){ ?>
								<td><a href="form_rm_view.php?arf_no=<?php echo $row['arf_no']; ?>"><?php echo "ARF-00".$row['arf_no']; ?></a></td>
								<?php } else { ?>
								<td><a href="form_requestor_view.php?arf_no=<?php echo $row['arf_no']; ?> "><?php echo "ARF-00".$row['arf_no']; ?></a></td><?php } ?>
								<td><?php echo $row['new_emp_branch']; ?></td>
								<?php
									$sqlry="SELECT name FROM user_directory WHERE `empid`='$mnid'";
									$qry1=mysql_query($sqlry);
									$row1=mysql_fetch_assoc($qry1);
									?>
								<td><?php echo $row1['name']; ?></td>
								<td><?php echo $row['new_emp_site']; ?></td>
								<td><?php echo $row['reason_for_hiring']; ?></td>
								<?php if($row['emp_name']==NULL){ ?>
								<td>NA</td><?php } else { ?>
								<td><?php echo $row['emp_name']; ?></td> <?php } ?>
								<td><?php echo $row['new_emp_desig']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($row['hiring_date'])); ?></td>
								
									<td>NA</td>
									<td><?php echo $row['status']; ?></td>
								</tr></div>
								<?php
							}
						}
					}
				}else if($status == "Cancelled"){
					$sql="SELECT * FROM `arf_cancelled_data` WHERE `requestor_code`='$mnid'";
					$qry=mysql_query($sql);
				if(mysql_num_rows($qry)>0){
					while($row=mysql_fetch_assoc($qry)){
						if($row['status']=="REQ-Cancelled"){
							?><div class="row">
								
								<tr>
								<td><a href="form_requestor_cancelled_view.php?arf_no=<?php echo $row['arf_no']; ?> "><?php echo "ARF-00".$row['arf_no']; ?></a></td>
								<td><?php echo $row['new_emp_branch']; ?></td>
								<?php
									$sqlry="SELECT name FROM user_directory WHERE `empid`='$mnid'";
									$qry1=mysql_query($sqlry);
									$row1=mysql_fetch_assoc($qry1);
									?>
								<td><?php echo $row1['name']; ?></td>
								<td><?php echo $row['new_emp_site']; ?></td>
								<td><?php echo $row['reason_for_hiring']; ?></td>
								<?php if($row['emp_name']==NULL){ ?>
								<td>NA</td><?php } else { ?>
								<td><?php echo $row['emp_name']; ?></td> <?php } ?>
								<td><?php echo $row['new_emp_desig']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($row['hiring_date'])); ?></td>
								<td>NA</td>
								<td><?php echo $row['status']; ?></td>
								</tr></div>
								<?php
							}
						}
					}
				}


				?>
		</tbody>
</table>
</div>
</div>			