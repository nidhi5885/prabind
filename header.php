<!doctype html>
<html>
<head>
<title>Associate Requisition Form</title>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>-->



<link href="css/layout.css" rel="stylesheet" />
<link href="css/bootstrap.css" rel="stylesheet" />

  
  <link rel="stylesheet" href="jsview/bootstrap.min.css" />
  <script src="jsview/angular.js"></script>
 
  <script src="jsview/script.js?version=1"></script>
  <script src="jsview/dirPagination.js"></script>
   <script type="text/javascript" src="jsview/moment.min.js"></script>
	
<script language="javascript">
var isNS = (navigator.appName == "Netscape") ? 1 : 0;
  if(navigator.appName == "Netscape")
     document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
  function mischandler(){
   return false;
 }
  function mousehandler(e){
     var myevent = (isNS) ? e : event;
     var eventbutton = (isNS) ? myevent.which : myevent.button;
    if((eventbutton==2)||(eventbutton==3)) return false;
 }
 document.oncontextmenu = mischandler;
 document.onmousedown = mousehandler;
 document.onmouseup = mousehandler;
function killCopy(e){
    return false
}
function reEnable(){
    return true
}

function golink(t){
	window.location.href=t;
}

</script>

    <!--[if lt IE 9]>
    <script type="text/javascript" src="es5-shim.min.js"></script>
    <![endif]-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<title>Associate Requisition Form</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="jsview/bootstrap.min.css">
<script src="jsview/bootstrap.min.js"></script>
<script src="jsview/ui-bootstrap-tpls-0.7.0.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!--FOR MANAGEMENT SUBMISSION-->


<!--FOR MANAGEMENT SUBMISSION-->

<script>
function recSubmit(el) {
    if(jQuery(el).is(':checked'))
        {

		document.getElementById('div1').style.display = "none";
		document.getElementById('div2').style.display = "block";
		return false;      
		 
        }
    else
        {
	       document.getElementById('div1').style.display = "block";
	       document.getElementById('div2').style.display = "none";
		return false;
        }
}
</script>

<script>

function othersData(val){
	if(val=='Others'){
		document.getElementById('selectField').enabled=true;
		document.getElementById('selectField').style.display = "block";
	}else{
		document.getElementById('selectField').disabled=true;
		document.getElementById('selectField').style.display = "none";
	}

} 

</script>
<script>

function othersRepData(reason){
	if(reason=='Others'){
		document.getElementById('rsn_replacement_others').enabled = true;
		document.getElementById('rsn_replacement_others').style.display = "block";
	}else{
		document.getElementById('rsn_replacement_others').style.display = "none";
		document.getElementById('rsn_replacement_others').disabled = true;
	}
}



function complianceUpdate(str){
	 //var x = document.getElementById("new_emp_branch").value;
	//document.write(str);
	
	
	if(str=='BHOPAL' || str=='CHENNAI' || str=='AHMEDABAD' || str=='CHANDIGARH' || str=='HYDERABAD' || str=='JAIPUR'){
		//document.write("lalu");
			
			document.getElementById('compConsdiv1').style.display = "block";
			document.getElementById('compConsdiv').style.display = "none";
	} else{
		document.getElementById('compConsdiv1').style.display = "none";
			document.getElementById('compConsdiv').style.display = "block";
	}
		
	
}


 
</script>
<script>

	


function showEmpDetail(str){
	if(str.length==0){
		document.getElementById("emp_detail").innerHTML="";
		return;
	} else {
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("emp_detail").innerHTML = this.responseText;
				showDatePicker();
				arf_new_alert();
					}		
		};
		xmlhttp.open("GET","empdetails.php?q="+str, true);
		xmlhttp.send();
	}
	
	
}

function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("emp_code").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				
                document.getElementById("emp_code").innerHTML = this.responseText;
				showDatePicker();
				showDatePicker1();
		            }
        };
        xmlhttp.open("GET","getempcode.php?q="+str, true);
        xmlhttp.send();
    }
}
function showDept(str) {
	if (str.length == 0) { 
        document.getElementById("show_dept").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("show_dept").innerHTML = this.responseText;
		
            }
        };
        xmlhttp.open("GET","getedept.php?qa="+str, true);
        xmlhttp.send();
    }
}

function showDes(str){
	if (str.length == 0) { 
        document.getElementById("show_des").innerHTML = "";
        return;
    } else {
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("show_des").innerHTML = this.responseText;
		
            }
        };
        xmlhttp.open("GET","getedes.php?des="+str, true);
        xmlhttp.send();
    }
}

function showDatePicker(){
	setTimeout(function(){$( "input[name='rep_tl_hiring_date'],input[name='mng_rep_tl_hiring_date'],input[name='hiring_date'],input[name='mn_hiring_date'],input[name='req_hiring_date'],input[name='expected_joining_date']" ).datepicker({
		changeYear: true,
		changeMonth: true,
		dateFormat: 'dd-mm-yy',
		minDate : new Date()
	});},500);	
}
function showDatePicker1(){
	setTimeout(function(){$( "input[name='resign_date']" ).datepicker({
		changeYear: true,
		dateFormat: 'dd-mm-yy',
		changeMonth: true
	});},500);	
}
</script>

<script language="javascript">
				function arf_new_alert(){
	
$.confirm({
    title: 'ARF',
    content: 'Do you want to submit ARF ?',
    //autoClose: 'cancelAction|5000',
    buttons: {
        Yes: function(){
            //window.location.href = "arf_form_requestor_update.php?arf_no=<?php echo $arf_no; ?>";
			$("#arf_form").submit();
        },
        No: function(){
            //return false;
        }
		/*cancelAction: function () {
			$("#arf_form").submit();
		}*/
    }	
	
    
});
}
</script>
<script language="javascript">
function cancel_alert(){
	/*$('a.Cancel').confirm({
    content: "...",
});
$('a.Cancel').confirm({
    buttons: {
        hey: function(){
            location.href = this.$target.attr('href');
        }
    }
});*/
$.confirm({
    title: 'Cancel',
    content: 'Do you want to cancel request:'+''+
    '<form action="cancel_submit.php" method="POST" class="formName" id="cancel_submit">' +
    '<div class="form-group">' +
    '<label>Please Enter Remarks to cancel :</label>' +
    '<textarea rows="3" cols="1000"  placeholder="Please Enter Remarks to cancel" name="cancel_remarks" class="name form-control" required />' +'</textarea>'+
    '</div>' +
    '</form>',
    autoClose: 'cancelAction|1000',
    buttons: {
		formSubmit: {
            text: 'Yes',
            btnClass: 'btn-blue',
            action: function () {
				var name = this.$content.find('.name').val();
				if(!name){
                    $.alert('Provide a valid remarks');
                    return false;
                }
				else{
				$("#cancel_submit").submit();
                //window.location.href = "cancel_submit.php?cancel_remarks=name";
				}
            }
        },
        
        No: function(){
            
        }
		
    }	
	
    
});
}
</script>


<!-- Date Picker -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#hiring_date").datepicker({
		changeYear: true,
		changeMonth: true,
		dateFormat: 'dd-mm-yy',
		minDate : new Date()
	});
  } );
  </script>

  <script>
  $( function() {
    $( "input[name='tl_emp_hiring_date']").datepicker({
		changeYear: true,
		changeMonth: true,
		dateFormat: 'dd-mm-yy',
		minDate : new Date()
	});
  } );
  </script>
  
<script>
  $( function() {
    $( "#resign_date" ).datepicker({
		changeYear: true,
		changeMonth: true,
		dateFormat: 'dd-mm-yy'
		//minDate : new Date()
	});
  } );
  </script>

<script>
  $( function() {
    $( "#mn_hiring_date,#expected_joining_date" ).datepicker({changeYear: true,
		changeMonth: true,
		dateFormat: 'dd-mm-yy',
		minDate : new Date()
	});
  } );
  </script>


<script>
  $( function() {
    $( "12").datepicker({changeYear: true,
		changeMonth: true,
		dateFormat: 'dd-mm-yy',
		minDate : new Date()
	});
  } );
  </script> 
  

  
<style type="text/css">
.md{padding:10px; background-color:#cce6ff; border:1px solid #000; margin-top:5px; margin-bottom:5px;}
.cd{ background-color:#DCDCDC;}
.cost{ background-color:#DCDCDC;}
.container{width:100%;}
input, select, textarea {
    width: 100%;
    padding: 6px 8px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=radio], input[type=checkbox] {
    margin: 15px 0 20px 20px;
    margin-top: 1px \9;
    line-height: normal;
}
input[type=submit],input[type=button] {
    width: 35%;
    background-color: #2e427f;
    color: white;
    padding: 10px 5px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: normal;
    text-shadow: none;
    font-size: 16px;
}
input[type=submit]:hover {
    
}
body{
	overflow: scroll;
}
</style>
	<script type="text/javascript">
function goBeforeConfirm(){
golink('requestor_view.php?id=<?php echo $id;?>');
}
</script>

</head> 

<body>
<?php session_start(); ?>
<?php
include("conn.php");


?>
<div class="middleroung">
