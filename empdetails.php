<?php
include("header.php");
include("conn.php");
session_start();
$reason = $_GET['q'];
$mnid=$_SESSION['id'];
$_SESSION['reason']=$reason;
if($reason=="Attrition" || $reason=="Replacement"){
	?><br><br>
	<div class="cd col-md-12">
		<?php if($reason=="Attrition"){ ?>
		<b><span class="title">Details of ARF(Applicable in case of Attrition)</span></b><br><br>
		<?php } else { ?>
		<b><span class="title">Details of ARF(Applicable in case of Replacement)</span></b><br><br>
		<?php } ?>
		<div class="row">
			<div class="col-md-4"></div>
			<?php if($reason=="Attrition"){ ?>
			<div class="col-md-4">
				<b><u> Details of Resigned Associate</u></b>
			</div>
			<?php } else { ?>
			<div class="col-md-4">
				<b><u> Details of Current Associate</u></b>
			</div>
			<?php } ?>
			<div class="col-md-4">
				<b><u>Details of Required Associate</u></b>
			</div>
		</div>
	</div><br><br>
	
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-4">
				<b>Name</b>
			</div>
			<div class="col-md-4"><select name="emp" id="emp" onchange="showHint(this.value)" required><option>---SELECT---</option>
			<?php
				if($reason=="Attrition"){
					$cur_date=date("d/m/Y");
					$date=date_create(date("Y/m/d"));
					date_sub($date,date_interval_create_from_date_string("90 days"));
					$fn_date=date_format($date,"d/m/Y");
					$manager_check="SELECT * FROM `user_regination` WHERE `manager_id`='$mnid'  AND STR_TO_DATE(`req_date`, '%d/%m/%Y')  BETWEEN STR_TO_DATE('$fn_date', '%d/%m/%Y') AND STR_TO_DATE('$cur_date', '%d/%m/%Y') ORDER BY `name` ASC";
				$res_check=mysql_query($manager_check);
				if(mysql_num_rows($res_check)>0){
					while($row=mysql_fetch_assoc($res_check)){
					   if($row['reg_status']=="Pending" || $row['reg_status']=="Approved"){
						$empid=$row['empid'];
						$status_check="SELECT status FROM arf_associate_data WHERE emp_code='".$empid."'";
						$qrl_check=mysql_query($status_check);
						if(mysql_num_rows($qrl_check)>0){}
						else{
	
							?><option value="<?php echo $row['empid']; ?>"><?php echo $row['name']." (".$row['empid'].")"; ?></option>
									<?php
								}
							}
				
						}
					}

				} else {
			
				$manager_check="SELECT * FROM user_directory INNER JOIN user_erp ON user_directory.empid=user_erp.Emp_Id WHERE user_directory.manager='$mnid' AND
					user_erp.Emp_Status='E' ORDER BY `user_directory`.`name` ASC";
				$res_check=mysql_query($manager_check);
				if(mysql_num_rows($res_check)>0){
					while($row=mysql_fetch_assoc($res_check)){
						$empid=$row['empid'];
						$status_check="SELECT status FROM arf_associate_data WHERE emp_code='".$empid."'";
						$qrl_check=mysql_query($status_check);
						if(mysql_num_rows($qrl_check)>0){}
						else{
	
							?><option value="<?php echo $row['empid']; ?>"><?php echo $row['name']." (".$row['empid'].")"; ?></option>
									<?php
								}
				
						}
					}
				}	
			?>
			</select>
			</div>
		
	
			<div class="col-md-4">
				<input type="hidden" name="new_emp" hidden>
			</div>
		</div>
	</div>
	<div class="row"></div>
	<div id="emp_code">
		
	
	</div>

	<?php
		}
		else if($reason=="New")
		{ 
	 ?> 
 <br>
<div class="cd col-md-12">
		<span class="title">Details of New Requirement/Project</span><br><br>
	<div class="row">
		<div class="col-md-4"></div>
		
		<div class="col-md-4">
			<b><u>Details of Required Associate</u></b>
		</div>
	</div>
	</div><br><br>
	<div class="row">
		<div class="col-md-4"><b>Department (Cost Center)<font color="red">*</font></b></div>
		<div class="col-md-4">
			<select name="new_emp_dept"  id="new_emp_dept" required >
				
				<?php
				
					$sql="SELECT DISTINCT department FROM user_directory INNER JOIN user_erp ON user_directory.empid=user_erp.Emp_Id WHERE user_directory.manager='$mnid' AND
					user_erp.Emp_Status='E' ORDER BY department ASC";
					$qry=mysql_query($sql);
					if(mysql_num_rows($qry)>0){
						while($dept=mysql_fetch_assoc($qry)){
							if($dept['department']==$row['department']){
								?><option value="<?php echo $row['department'];?>"><?php echo $row['department'];?></option><?php
							}
							elseif($dept['department']!=NULL){
							?><option value="<?php echo $dept['department'];?>"><?php echo $dept['department'];?></option><?php
							}
						}
					}
				?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Position for ARF (Designation)<font color="red">*</font></b></div>
		<div class="col-md-4"><select name="new_emp_desig" required onchange="othersData(this.value)">
			
		<?php

					$sql="SELECT DISTINCT designation FROM user_directory INNER JOIN user_erp ON user_directory.empid=user_erp.Emp_Id WHERE user_directory.department='".$_SESSION['mn_dept']."' AND
					user_erp.Emp_Status='E' ORDER BY designation ASC";
					$qry=mysql_query($sql);
					if(mysql_num_rows($qry)>0){
						while($dept=mysql_fetch_assoc($qry)){
							if($dept['designation']!=NULL){
							?><option value="<?php echo $dept['designation'];?>"><?php echo $dept['designation'];?></option><?php
						}
						}
					}
				?>
							<option value="Others">Others</option>
			</select>
		</div>
		<div class="col-md-4"><div id="selectField" style="display:none;"><input type="text" name="new_emp_desig1"></div></div>
	</div>
	
	<div class="row">
		<div class="col-md-4"> <b>Grade<font color="red">*</font></b></div>
		<div class="col-md-4"><select name="new_emp_grade" required>
			
			<?php
					$sql="SELECT DISTINCT grade FROM user_directory INNER JOIN user_erp ON user_directory.empid=user_erp.Emp_Id WHERE user_erp.Emp_Status='E' ORDER BY grade ASC";
					$qry=mysql_query($sql);
					if(mysql_num_rows($qry)>0){
						while($dept=mysql_fetch_assoc($qry)){
							if($dept['grade']!=NULL){
							?><option value="<?php echo $dept['grade'];?>"><?php echo $dept['grade'];?></option><?php
						}
						}
					}
				?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"> <b>Client/Project Name/site<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="text" name="new_emp_site" required placeholder="Client/Project Name/site"></div>
	</div>
	<div class="row">
		<div class="col-md-4"> <b>Progressive Branch Office<font color="red">*</font></b></div>
		<div class="col-md-4"><select name="new_emp_branch" onchange="complianceUpdate(this.value)" required>
			
			<?php
				$sql="SELECT DISTINCT location FROM user_directory ORDER BY location";
					$qry=mysql_query($sql);
					if(mysql_num_rows($qry)>0){
						while($dept=mysql_fetch_assoc($qry)){
							if($dept['location']!=NULL){
							?><option value="<?php echo trim($dept['location']);?>"><?php echo trim($dept['location']);?></option><?php
						}
						}
					}
			?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"> <b>Job Location<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="text" name="new_emp_job_loc" required placeholder="Job Location"></div>
	</div>
	<div class="row">
		<div class="col-md-4"> <b>Work Experience<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="text" name="new_emp_exp" required placeholder="min - max"></div>
	</div>
	<div class="row">
		<div class="col-md-4"> <b>Qualification<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="text" name="new_emp_qualification" required placeholder="Qualification"></div>
	</div>
	<div class="row">
		<div class="col-md-4"> <b>Skill Level<font color="red">*</font></b></div>
		<div class="col-md-4"><select name="new_emp_skill_level" required>
			<option value="L1">L1</option>
			<option value="L2">L2</option>
			<option value="L3">L3</option>
			</select>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-4"><b>Gender<font color="red">*</font></b></div>
		<div class="col-md-4"><select name="new_emp_gender"  required>
				<option value="MALE">MALE</option>
				<option value="FEMALE">FEMALE</option>
				<option value="Any">Any</option>
			</select>
		</div>
	</div>
	<div class="cost col-md-12">
		<div class="col-md-12"></div>
		<div class="col-md-12"></div>
		<div class="row">
			<div class="col-md-12"><b>Cost/Budget :</b></div>
		</div>
		<div class="col-md-12"></div>
		<div class="col-md-12"></div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Fixed Salary(Monthly)<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="text" name="new_emp_fixed" required placeholder="min - max"></div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Quaterly Variable (3 Month)<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="text" name="new_emp_quaterly" required placeholder="min - max"></div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Half Yearly Variable (6 Month)<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="text" name="new_emp_hly" required placeholder="min - max"></div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Annual Variable (12 Month)<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="text" name="new_emp_annual" required placeholder="min - max"></div>
	</div>
	<div class="cost col-md-12">
		<div class="col-md-12"></div>
		<div class="col-md-12"></div>
		<div class="row">
			<div class="col-md-12"></div>
		</div>
		<div class="col-md-12"></div>
		<div class="col-md-12"></div>
	</div>
	<div class="cost col-md-12">
		<div class="col-md-12"></div>
		<div class="col-md-12"></div>
		<div class="row">
			<div class="col-md-12"></div>
		</div>
		<div class="col-md-12"></div>
		<div class="col-md-12"></div>
	</div>
	<!--<div class="row">
		<div class="col-md-4"><b><u>Reason:</u><p> if Proposed Cost > Replacement/Approved Cost</p></b></div>
		<div class="col-md-4"><textarea name="new_emp_propsed_cost" rows="3" cols="50" placeholder="maximum Character Limit: 200"></textarea></div>
	</div>
	<div class="row">
		<div class="col-md-4"><b><u>Reason:</u><p> if ARF submission date is not within 15 days of Resignation date</p></b></div>
		<div class="col-md-4"><textarea name="new_emp_submission_date" rows="3" cols="50" placeholder="maximum Character Limit: 200"></textarea></div>
	</div>-->
	<div class="row">
		<div class="col-md-4"><b><u>Client Working Days<font color="red">*</font></u><p>(5 days/6 days)</p></b></div>
		<div class="col-md-4"><input type="number" name="new_emp_working_days" min="5" max="6" required placeholder="Client Working Days"></div>
	</div>
	<div class="row">
		<div class="col-md-4"><b><u>Client Shift Timing<font color="red">*</font></u><p>(24*7 shift, 9AM - 6PM, 8AM - 5 PM), If other specify</p></b></div>
		<div class="col-md-4"><input type="text" name="new_emp_shift_timing" required placeholder="Client Shift Timing"></div>
	</div>
	<div class="row">
		<div class="col-md-4"><b><u>Compliance Mandatory<font color="red">*</font></u><p>(Yes/No)</p></b></div>
		<div class="col-md-4"><div id="compConsdiv" style="display:block;"><select name="new_emp_compliance" required>
									<option value="Regular">Regular</option>
									<option value="Consultant">Consultant</option>
								</select>
							</div>
							<div id="compConsdiv1" style="display:none;"><select name="new_emp_compliance" required>
									<option value="Regular">Regular</option>
								</select>
							</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Head Count<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="number" name="new_emp_head_count"min="1" required placeholder="Head Count"></div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Job Description/Skills required:</b></div>
		<div class="col-md-4"><textarea name="new_des" rows="3" cols="50" maxlength="1000" placeholder="Character Limit: 1000"></textarea></div>
	</div>
	<div class="cost col-md-12">
	<div class="col-md-12"></div>
	<div class="col-md-12"></div>
	<div class="row">
		<div class="col-md-12"><input type="hidden"></div>
	</div>
	<div class="col-md-12"></div>
	<div class="col-md-12"></div>
	</div>
	<?php
		
		$sqlsnd="SELECT * FROM `arf_master_data` WHERE `rm_code`='$mnid'";
		$qrysnd=mysql_query($sqlsnd);
		//$sql_mng="SELECT `mn_code` FROM `arf_master_data` WHERE `mn_code`='$mnid'";
		
		if(($mnid=='000001') || ($mnid=='000004')){
		?>
	
		<div class="row">
			<div class="col-md-4"><b>Recruiter<font color="red">*</font></b></div>
			<div class="col-md-4"><select name="recruiter_id">
				<?php
				$sql4talent="SELECT tl_talent_id FROM `arf_master_data`";
				$qry4talent=mysql_query($sql4talent);
				while($rw4talent=mysql_fetch_assoc($qry4talent)){
					$talent_id=$rw4talent['tl_talent_id'];
					$sql4talent1="SELECT name FROM `user_directory` WHERE `empid`='$talent_id'";
					$qry4talent1=mysql_query($sql4talent1);
					while($rw4talent1=mysql_fetch_assoc($qry4talent1)){
						$talent_nm=$rw4talent1['name'];
						?><option value="<?php echo $talent_id; ?>"><?php echo $talent_nm; ?></option><?php
					}
				}
				?>
						</select>
			</div>
		</div>
		<div class="row">
		<div class="col-md-4"><b>Expected Hire Date<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="text" name="req_hiring_date" placeholder="DD-MM-YYYY" required></div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Criticality<font color="red">*</font></b></div>
		<div class="col-md-4"><select name="req_criticality" required>
								<option value="Urgent">Urgent</option>
								<option value="High">High</option>
								<option value="Medium">Medium</option>
								<option value="Low">Low</option>
							</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Remarks<font color="red">*</font></b></div>
		<div class="col-md-4"><textarea name="req_sdm_remarks" rows="4" cols="50" maxlength="200" placeholder="Character Limit: 200" required></textarea></div>
	</div>
		
		<?php } else if(mysql_num_rows($qrysnd)>0){ ?>
		<div class="row">
			<div class="col-md-4"><b>Management<font color="red">*</font></b></div>
			<div class="col-md-4"><?php
				$sql4mn="SELECT mn_code,mn_name FROM `arf_master_data` WHERE `rm_code`='$mnid'";
				$qry4mn=mysql_query($sql4mn);
				$rw4mn=mysql_fetch_assoc($qry4mn)
					?><input type="hidden" name="mn_code" value="<?php echo $rw4mn['mn_code']; ?>" readonly><input type="text" name="mn_name" value="<?php echo $rw4mn['mn_name']; ?>" readonly>
			</div>
		</div>
		<div class="row">
		<div class="col-md-4"><b>Expected Hire Date<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="text" name="mn_hiring_date" placeholder="DD-MM-YYYY" required></div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Criticality<font color="red">*</font></b></div>
		<div class="col-md-4"><select name="mn_criticality" required>
								<option value="Urgent">Urgent</option>
								<option value="High">High</option>
								<option value="Medium">Medium</option>
								<option value="Low">Low</option>
							</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Remarks<font color="red">*</font></b></div>
		<div class="col-md-4"><textarea name="mn_sdm_remarks" rows="4" cols="50" maxlength="200" placeholder="Character Limit: 200" required></textarea></div>
	</div>
	<?php } else { ?>
	<div class="row">
		<div class="col-md-4"><b>Expected Hire Date<font color="red">*</font></b></div>
		<div class="col-md-4"><input type="text" name="req_hiring_date" placeholder="DD-MM-YYYY" required></div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Criticality<font color="red">*</font></b></div>
		<div class="col-md-4"><select name="req_criticality" required>
								<option value="Urgent">Urgent</option>
								<option value="High">High</option>
								<option value="Medium">Medium</option>
								<option value="Low">Low</option>
							</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"><b>Remarks<font color="red">*</font></b></div>
		<div class="col-md-4"><textarea name="req_sdm_remarks" rows="4" cols="50" maxlength="200" placeholder="Character Limit: 200" required></textarea></div>
	</div>
	<?php } ?>
	<?php 
		if(($mnid=='000001') || ($mnid=='000004')){ ?>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4"><input type="submit" name="mn_arf_new_submit" value="Submit"></div>
	</div>
	<?php }else{ ?>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4"><input type="submit" name="new_form_submit" onclick="arf_new_alert()" class="form-control" value="Submit"></div>
		
	</div>
	<?php } ?>
</div>
<?php
}
?>
