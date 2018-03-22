// Code goes here

var myApp = angular.module('myApp', ['angularUtils.directives.dirPagination']);

function MyController($scope ,$http) {
  
   $scope.prop = {
    "type": "select", 
    "name": "status",
    "value": "Approved", 
    "values": [ "Approved", "Pending", "Postponed"] 
  };

    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.emps = [];
  //$scope.emps1 = [];
 
  $http.get('data.php').success(function(data) {  
 
     var dishes = data;
	 var sides = data;
	 for (var i = 1; i < dishes.length; i++) {
 
    var dish = dishes[i];
	//alert(dish.name)
    //var side = sides[i];
    $scope.emps.push(dish);
	//$scope.emps1.push(dish.id);
  }	
    });    

  
  $scope.pageChangeHandler = function(num) {
      console.log('emps page changed to ' + num);
  };
}

function OtherController($scope) {
  $scope.pageChangeHandler = function(num) {
    console.log('going to page ' + num);
  };
}

function clearconsole() { 
  console.log(window.console);
  if(window.console || window.console.firebug) {
   console.clear();
  }
}

function AssociateCtrl($scope ,$http) {
  
  

    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.associates = [];
	var cemp = $('#cempid').val();
	var rowid = $('#rowid').val();
	
	$scope.url = 'associatedata.php?id='+cemp+'&&row='+rowid; 
   
   $http.get($scope.url).success(function(data) {  
     // clearconsole();
     var alldata = data;
	 //alert(alldata[0].id)
	
    var details = alldata[0];
	
    $scope.associates.push(details);
	
 
    });  
  }
  
  function AssociateQuery($scope ,$http) {
  
  

    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.associates = [];
	var cemp = $('#cempid').val();
	$scope.url = 'associatequery.php?id='+cemp; 
   
    $http.get($scope.url).success(function(data) {  
     // clearconsole();
     var alldata = data;
	 //alert(alldata[0].id)
	
    var details = alldata[0];
	
    $scope.associates.push(details);
	
 
    });  
  }
  
  function AssociatedeatilCtrl($scope ,$http) {
      
	$scope.myFunccurrent = function() {
	
	
		        var sal = $( "#Fixed_salary" ).val();	
				var medical = $( "#cmedicalbym" ).val();	
			
				var tdssal = sal-medical;
				var tds = (tdssal*10)/100;
				var net = tdssal-tds;
				//alert(net)
				//alert(tds)
				$('#ctdsbym').val(tds);
				$('#cnetbym').val(net);
				
			    var salman = $( "#salary" ).val();	
				var medicalman = $( "#medicalbym" ).val();	
				
				var tdssalman = salman-medicalman;
				var tdsman = (tdssalman*10)/100;
				var netman = tdssalman-tdsman;
				//alert(net)
				//alert(tds)
				$('#tdsbym').val(tdsman);
				$('#netbym').val(netman);
				
				
				
	};

    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.associatesdetails = [];
	var cemp = $('#cempid').val();
	var rowid = $('#rowid').val();
	
	$scope.url = 'associate_app_data.php?id='+cemp+'&&row='+rowid; 
   
    $http.get($scope.url).success(function(data) {  
     // clearconsole();
     var alldataall = data;
	// alert(alldata[0].id)
	
    var detailsall = alldataall[0];
	
    $scope.associatesdetails.push(detailsall);
	
 
    });  
	
	
	$scope.master = {};
	
	
	
	$scope.myFunc = function() {

	            var sal = $( "#salary" ).val();	
				var medical = $( "#medicalbym" ).val();	
				
				var tdssal = sal-medical;
				var tds = (tdssal*10)/100;
				var net = tdssal-tds;
				//alert(net)
				//alert(tds)
				$('#tdsbym').val(tds);
				$('#netbym').val(net);
					//alert(sal)
					if(sal !=''){
					$('#postponed').css('pointer-events','none');
					$('#postponed').css('background','#ccc');
					}else{
					$('#postponed').css('pointer-events','auto');
					$('#salary').css('pointer-events','auto');
					$('#salary').addClass('colorfadeinput');
					$('#mobileexp').css('pointer-events','auto');
					$('#conveyance').css('pointer-events','auto');
					$('#amvariable').css('pointer-events','auto');
					$('#ymvariable').css('pointer-events','auto');
					$('#designation').css('pointer-events','auto');
					$('#designation').css('pointer-events','auto');
					//$('#postponed').css('background','auto');
					}
    };
	 
	$scope.appraisalapprovem = function(log) {
    
      var config = {
        params: {
          log: log
        }
      };
	  var etype = $('#metype').val();
	  log.etype = etype;
	 
	 if(log.changemanger ==null){
	 if(log.mcom_asignment ==null 
	  || log.mprof_tech_know ==null 
	  || log.mreporting ==null 
	  || log.mes_developement ==null 
	  || log.mas_creticisms ==null 
	  || log.mdep_appraise ==null 
	  || log.mcom_written ==null 
	  || log.mclient_rel ==null 
	  || log.mcom_verbal ==null 
	  || log.mtask_completion ==null
	  || log.comments_appraiser ==null
	  ){
	  
	  jQuery( "#dialogterms" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
						
					    }
					  }
					});
					return false;
		 }
		
		 
	if(log.postponedtime ==null){
	  if(log.salary ==null
	  || log.mobileexp ==null
	  || log.conveyance ==null
	  ){
	  
	  jQuery( "#dialogterms" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
						
					    }
					  }
					});
					return false;
		 }
	   }	 
	 } 
	 $http.post("appraisalpostupdate.php", null, config)
        .success(function (data, status, headers, config)
        {
			console.log(data)
         //alert(data.manager);
          if(data.empid!=null){
			  //alert(data.manager)
              if(data.manager!=''){
				
				jQuery( "#dialogchnagem" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
					$( this ).dialog( "close" );
					
					var url ='manager.php?id='+data.empid+'';
			 //confirm(url);
		             window.location.href = url;
					
					}
					}
					});
					return false;  
				  
			  }else{
					jQuery( "#dialogapprove" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
					$( this ).dialog( "close" );
					
					var url ='manager.php?id='+data.empid+'';
			 //confirm(url);
		             window.location.href = url;
					
					}
					}
					});
					return false;
			 
			  }  
		   }else{
		           jQuery( "#dialogtermsexit" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
						}
					  }
					});
					return false;
		   
		   }
         
		})
        .error(function (data, status, headers, config)
        {
          $scope[resultVarName1] = "SUBMIT ERROR";
        });
	}
	
	$scope.myFuncbyhod = function() {

	            var sal = $( "#salarybyhod" ).val();
                var medical = $( "#medicalbyhod" ).val();	
				//alert(medical)
				var tdssal = sal-medical;
				var tds = (tdssal*10)/100;
				var net = tdssal-tds;
				//alert(net)
				//alert(tds)
				$('#tdsbyhod').val(tds);
				$('#netbyhod').val(net);
				
				//alert(sal)
					if(sal !=''){
					$('#postponedbyhod').css('pointer-events','none');
					$('#postponedbyhod').css('background','#ccc');
					}else{
					$('#postponedbyhod').css('pointer-events','auto');
					$('#salarybyhod').css('pointer-events','auto');
					$('#salarybyhod').addClass('colorfadeinput');
					$('#mobileexpbyhod').css('pointer-events','auto');
					$('#conveyancebyhod').css('pointer-events','auto');
					$('#amvariablebyhod').css('pointer-events','auto');
					$('#ymvariablebyhod').css('pointer-events','auto');
					$('#datacardexpbyhod').css('pointer-events','auto');
					$('#designationbyhod').css('pointer-events','auto');
					//$('#postponed').css('background','auto');
					}
    };
	
	$scope.appraisalapprovehod = function(log) {
       var comments_hod = $( "#comments_hod" ).val();
	   var etype = $('#hetype').val();
	  log.etype = etype;
	log.comments_hod = comments_hod;
      var config = {
        params: {
          log: log
        }
      };
	//alert(log.comments_hod)
	if(log.mcom_asignment ==null 
	  || log.comments_hod =='' 
	  || log.mprof_tech_know ==null 
	  || log.mreporting ==null 
	  || log.mes_developement ==null 
	  || log.mas_creticisms ==null 
	  || log.mdep_appraise ==null 
	  || log.mcom_written ==null 
	  || log.mclient_rel ==null 
	  || log.mcom_verbal ==null 
	  || log.mtask_completion ==null
	  || log.comments_appraiser ==null
	  ){
	  
	  jQuery( "#dialogterms" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
						
					    }
					  }
					});
					return false;
		 }
	 if(log.postponedtimebyhod ==null){
	  if(log.salarybyhod ==null
	  || log.mobileexpbyhod ==null
	  || log.conveyancebyhod ==null
	  ){
	  
	  jQuery( "#dialogterms" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
						
					    }
					  }
					});
					return false;
		 }
	}
	 
	$http.post("appraisalpostupdatehod.php", null, config)
        .success(function (data, status, headers, config)
        {
			console.log(data);
         //alert(data.empid);
        // alert(data.comments_appraiserh);
          if(data.empid!=null){
              
					jQuery( "#dialogapprove" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
					$( this ).dialog( "close" );
					
					if(data.comments_appraiserh =='yes'){
					var url ='hod_pms.php?id='+data.empid+'';
					}else{
					var url ='manager.php?id='+data.empid+'';	
					}
			 //confirm(url);
		             window.location.href = url;
					
					}
					}
					});
					return false;
			 
			  
		   }else{
		           jQuery( "#dialogtermsexit" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
						}
					  }
					});
					return false;
		   
		   }
         
		})
        .error(function (data, status, headers, config)
        {
          $scope[resultVarName1] = "SUBMIT ERROR";
        });
	
	  
	}
	
	

		$scope.myFuncbyhr = function() {
         
	           /*Default Salary */
			    var sald = $( "#Fixed_salary" ).val();	
				var medicald = $( "#cmedicalbymh" ).val();	
				//alert(medicald)
				//alert(sald)
				var tdssald = sald-medicald;
				var tdsd = (tdssald*10)/100;
				var netd = tdssald-tdsd;
			
				$('#ctdsbym').val(tdsd);
				$('#cnetbym').val(netd);

				
				/*Manager Salary */
				var salm = $( "#salary" ).val();	
				var medicalm = $( "#medicalbym" ).val();	
				//alert(medical)
				var tdssalm = salm-medicalm;
				var tdsm = (tdssalm*10)/100;
				var netm = tdssalm-tdsm;
				//alert(net)
				//alert(tds)
				$('#tdsbym').val(tdsm);
				$('#netbym').val(netm);
				
				/*HOD Salary */
				var salh = $( "#salarybyhod" ).val();
                var medicalh = $( "#medicalbyhod" ).val();	
				//alert(medical)
				var tdssalh = salh-medicalh;
				var tdsh = (tdssalh*10)/100;
				var neth = tdssalh-tdsh;
				//alert(net)
				//alert(tds)
				$('#tdsbyhod').val(tdsh);
				$('#netbyhod').val(neth);
				
				
                /*HR Salary */
     			var sal = $( "#salarybyhr" ).val();	
	            var medical = $( "#medicalbyhr" ).val();	
				
				var tdssal = sal-medical;
				var tds = (tdssal*10)/100;
				var net = tdssal-tds;
			
				$('#tdsbyhr').val(tds);
				$('#netbyhr').val(net);
					if(sal !=''){
					$('#postponedbyhr').css('pointer-events','none');
					$('#postponedbyhr').css('background','#ccc');
					}else{
					$('#postponedbyhr').css('pointer-events','auto');
					$('#salarybyhr').css('pointer-events','auto');
					$('#salarybyhr').addClass('colorfadeinput');
					$('#mobileexpbyhr').css('pointer-events','auto');
					$('#conveyancebyhr').css('pointer-events','auto');
					$('#amvariablebyhr').css('pointer-events','auto');
					$('#ymvariablebyhr').css('pointer-events','auto');
					$('#datacardexpbyhr').css('pointer-events','auto');
					$('#designationbyhr').css('pointer-events','auto');
					//$('#postponed').css('background','auto');
					}
    };
	
	$scope.appraisalapprovehr = function(log) {
   
	var final_assessmenthod =$('#final_assessment').val();
	var takehome =$('#takehome').val();
	var hretype =$('#hretype').val();
	
	if(final_assessmenthod =='' || takehome==''){
		
	   $('.errormsg').css('display','block');
	   return false;
	}else{
	   $('.errormsg').css('display','none');	
	}
	 //alert(final_assessmenthod)
	
	log.final_assessmenthod = final_assessmenthod;
	log.takehome = takehome;
	log.etype = hretype;
	console.log(log);
      var config = {
        params: {
          log: log
        }
      };
	  
	 $http.post("appraisalpostupdate_hr.php", null, config)
        .success(function (data, status, headers, config)
        {
         //console.log(data);
          if(data.empid!=null){
              
					jQuery( "#dialogapprove" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
					$( this ).dialog( "close" );
					
					var url ='hr.php?id='+data.empid+'';
			 //confirm(url);
		             window.location.href = url;
					
					}
					}
					});
					return false;
			 
			  
		   }else{
		           jQuery( "#dialogtermsexit" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
						}
					  }
					});
					return false;
		   
		   }
         
		})
        .error(function (data, status, headers, config)
        {
          $scope[resultVarName1] = "SUBMIT ERROR";
        });
	}
  }
  
  
  
  function AssociateCtrlView($scope ,$http) {
  
    $scope.PropValue = sessionStorage['prop'];
    if($scope.PropValue==null){$scope.PropValue="Approved";}
    $scope.prop = {
		"type": "select", 
		"name": "status",
		 "value": $scope.PropValue,
		"values": [ "Approved", "Pending", "Postponed"] 
		};
   
   $scope.setPropSession = function(){
	  sessionStorage.setItem('prop', $scope.prop.value);
    };
	
    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.associates = [];
	var cemp = $('#cempid').val();
	$scope.url = 'associatedataview.php?id='+cemp; 
   
    $http.get($scope.url).success(function(data) {  
     // clearconsole();
     
	 
	 var dishes = data;
	 var sides = data;
	 for (var i = 0; i < dishes.length; i++) {
 
    var dish = dishes[i];
	
    //var side = sides[i];
    $scope.associates.push(dish);
	
    }	
	
    });  
	
	$scope.associateconfirm= function(log) {
       //alert(log.id)
	   var cempid = $('#cempid').val(); 
       log.cempid =cempid;
	 var config = {
			params: {
			log: log
			}
			};	
			//alert(log.cempid)
	  
	   $http.post("associateconfirm.php", null, config)
        .success(function (data, status, headers, config)
        {
			console.log(data)
         if(data.empid!=null){
			 var url ='appraisalhome.php?id='+data.empid+'';
			 window.location.href = url;
			  //clearconsole();
			return true;
		 }else{
			 return false;
		 }
		}).error(function (data, status, headers, config)
        {
          $scope[resultVarName] = "SUBMIT ERROR";
        });
        
   }
	
	$scope.pageChangeHandler = function(num) {
      console.log('associates page changed to ' + num);
    };
	
	
	
	
  } 
  
  
  function HrCtrlView($scope ,$http) {
  
  $scope.prop = {
		"type": "select", 
		"name": "status",
		"value": "", 
		"values": [ "Approved", "Pending", "Postponed"] 
		};
		
   $scope.prop1 = {
		"type": "select", 
		"name": "period",
		"value": "", 
		"values": [ "JAN", "APR", "JUL", "OCT"] 
		};
  

    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.associates = [];
	var cemp = $('#cempid').val();
	$scope.url = 'hrdataview.php'; 
   
    $http.get($scope.url).success(function(data) {  
     // clearconsole();
     
	 
	 var dishes = data;
	 var sides = data;
	 for (var i = 0; i < dishes.length; i++) {
 
    var dish = dishes[i];
	
    //var side = sides[i];
    $scope.associates.push(dish);
	
    }	
	
    });  
	
	$scope.pageChangeHandler = function(num) {
      console.log('associates page changed to ' + num);
    };
  } 
  
  function ManagerCtrlView($scope ,$http) {
  
  

    $scope.prop = {
		"type": "select", 
		"name": "status",
		"value": "Pending", 
		"values": [ "Approved", "Pending", "Postponed"] 
		};

    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.associatesmanager = [];
	var cemp = $('#cempid').val();
	$scope.url = 'managerdata.php?id='+cemp; 
   
    $http.get($scope.url).success(function(data) {  
     // clearconsole();
     
	 
	 var dishes = data;
	 var sides = data;
	 for (var i = 0; i < dishes.length; i++) {
 
    var dish = dishes[i];
	
    //var side = sides[i];
    $scope.associatesmanager.push(dish);
	
    }	
	
    });  
	
	$scope.pageChangeHandler = function(num) {
      console.log('associates page changed to ' + num);
    };
  }
  
  function HODCtrlView($scope ,$http) {
  
  

    $scope.prop = {
		"type": "select", 
		"name": "status",
		"value": "Pending", 
		"values": [ "Approved", "Pending", "Postponed"] 
		};

    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.associateshod = [];
	var cemp = $('#cempid').val();
	
	$scope.url = 'hod_pms_data.php?id='+cemp; 
   
    $http.get($scope.url).success(function(data) {  
     // clearconsole();
     
	 
	 var dishes = data;
	 var sides = data;
	 for (var i = 0; i < dishes.length; i++) {
 
    var dish = dishes[i];
	
    //var side = sides[i];
    $scope.associateshod.push(dish);
	
    }	
	
    });  
	
	$scope.pageChangeHandler = function(num) {
      console.log('associates page changed to ' + num);
    };
  }
  
  /*HOD dashboard auto approve option*/
  
  function HOD_dashboard_CtrlView($scope ,$http) {
  
  

    $scope.prop = {
		"type": "select", 
		"name": "status",
		"value": "Pending", 
		"values": [ "Approved", "Pending", "Postponed"] 
		};

    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.associateshod = [];
	var cemp = $('#cempid').val();
	
	$scope.url = 'hod_dashboard_data.php?id='+cemp; 
   
    $http.get($scope.url).success(function(data) {  
     // clearconsole();
     
	 
	 var dishes = data;
	 var sides = data;
	 for (var i = 0; i < dishes.length; i++) {
 
    var dish = dishes[i];
	
    //var side = sides[i];
    $scope.associateshod.push(dish);
	
    }	
	
    });  
	
	$scope.pageChangeHandler = function(num) {
      console.log('associates page changed to ' + num);
    };
	
	$scope.hodsubmit= function(log) {
       //alert(log.salary)
	   var cempid = $('#cempid').val(); 
       log.cempid =cempid;
	 var config = {
			params: {
			log: log
			}
			};	
			//alert(log.cempid)
	  $http.post("hod_autoapprove.php", null, config)
        .success(function (data, status, headers, config)
        {
		//console.log(data)
          if(data.empid!=null){
               var url ='hod-dashboard.php?id='+data.empid+'';
			 //confirm(url);
		        window.location.href = url;
			     clearconsole();
				return true;
			   }else{
				   return false;
		     }
		})
        .error(function (data, status, headers, config)
        {
          $scope[resultVarName] = "SUBMIT ERROR";
        });
     }
	
  }
  
  /*HR dashboard auto approve option*/
  
  function HR_dashboard_CtrlView($scope ,$http) {
  
  

    $scope.prop = {
		"type": "select", 
		"name": "status",
		"value": "Approved", 
		"values": [ "Approved", "Pending", "Postponed"] 
		};
		
    $scope.prop1 = {
		"type": "select", 
		"name": "period",
		"value": "", 
		"values": [ "JAN", "APR", "JUL", "OCT"] 
		};

    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.associateshod = [];
	var cemp = $('#cempid').val();
	
	$scope.url = 'hr_dashboard_data.php?id='+cemp; 
   
    $http.get($scope.url).success(function(data) {  
     // clearconsole();
     
	 
	 var dishes = data;
	 var sides = data;
	 for (var i = 0; i < dishes.length; i++) {
 
    var dish = dishes[i];
	
    //var side = sides[i];
    $scope.associateshod.push(dish);
	
    }	
	
    });  
	
	$scope.pageChangeHandler = function(num) {
      console.log('associates page changed to ' + num);
    };
   
     $scope.abc=function(a){
		 
		$scope.nethome = a;
		
	 }
   
	$scope.hodsubmit= function(log) {
       
	   var cempid = $('#cempid').val(); 
	  
	   if($scope.nethome ==null){
		   
		   jQuery('<div></div>').dialog({
					modal: true,
					title: "Alert",
					open: function () {
						var markup = '<b>Please enter net take home salary</b>';
						jQuery(this).html(markup);
					},
					buttons: {
						Ok: function () {
							jQuery(this).dialog("close");
						}
					}
				});
		 return false;
	   }
	   
	   log.cempid =cempid;
       log.nethome =$scope.nethome;
      
	  
	 var config = {
			params: {
			log: log
			}
			};	
			//alert(log.cempid)
	  $http.post("hr_autoapprove.php", null, config)
        .success(function (data, status, headers, config)
        {
		//console.log(data)
          if(data.empid!=null){
               var url ='hr-dashboard.php?id='+data.empid+'';
			 //confirm(url);
		        window.location.href = url;
			     clearconsole();
				return true;
			   }else{
				   return false;
		     }
		})
        .error(function (data, status, headers, config)
        {
          $scope[resultVarName] = "SUBMIT ERROR";
        });
     }
	
  }
  
  function ManagerlistCtrlView($scope ,$http) {
  
    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.associateslistmanager = [];
	var cemp = $('#cempid').val();
	$scope.url = 'managerlistdata.php?id='+cemp; 
   
    $http.get($scope.url).success(function(data) {  
     // clearconsole();
     

	 var dishes = data;
	 var sides = data;
	 for (var i = 0; i < dishes.length; i++) {
 
    var dish = dishes[i];
	
    //var side = sides[i];
    $scope.associateslistmanager.push(dish);
	
    }	
	
    });  
	
	$scope.pageChangeHandler = function(num) {
      console.log('associates page changed to ' + num);
    };
  }
  
 myApp.controller('Appraisalctrl', function($scope,$http){
   

   
	$scope.master = {};
	 
	 
	$scope.appraisalsubmit = function(log) {
    

	
	//console.log(log);
	
      var config = {
        params: {
          log: log
        }
      };
	  console.log(log)
	  
	  if( log.from_date ==null 
	  || log.to_date ==null 
	  || log.key1 ==null 
	  || log.com_asignment ==null 
	  || log.goalsset ==null 
	  || log.prof_tech_know ==null 
	  || log.reporting ==null 
	  || log.es_developement ==null 
	  || log.as_creticisms ==null 
	  || log.dep_appraise ==null 
	  || log.com_written ==null 
	  || log.client_rel ==null 
	  || log.com_verbal ==null 
	  || log.task_completion ==null
	  || log.sy_Strengths ==null
	  || log.sy_weaknesses ==null
	  || log.achivements_period ==null
	  || log.difficulty_period ==null
	  || log.problem_setup ==null
	  || log.feedback_superior ==null
	  || log.dt_training ==null
	  || log.area_training ==null
	  || log.suggestions ==null
	  || log.comments_appraisee ==null
	  ){
	  
	  jQuery( "#dialogterms" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
						
					    }
					  }
					});
					return false;
		 }
	 
	 $http.post("appraisalpost.php", null, config)
        .success(function (data, status, headers, config)
        {
        console.log(data);
          if(data.empid!=null){
              
					jQuery( "#dialog" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
					$( this ).dialog( "close" );
					
					var url ='appraisalhome.php?id='+data.empid+'';
			 //confirm(url);
		             window.location.href = url;
					
					}
					}
					});
					return false;
			 
			  
		   }else{
		           jQuery( "#dialogtermsexit" ).dialog({
					width: 400,
					modal: true,
					buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
						}
					  }
					});
					return false;
		   
		   }
		})
        .error(function (data, status, headers, config)
        {
          $scope[resultVarName] = "SUBMIT ERROR";
        });
	  

	 
	
	
 };
 });
 
 myApp.controller('ManagerAppraisalctrl', function($scope,$http){
   

   
	$scope.master = {};
	 
	//$scope.aall = [];
              
	$scope.mappraisalsubmit = function(log) {
    
	
	 var aaaa = $( ".allro" ).last().val();
	  
	 for (var i = 1; i < aaaa; i++) {
       
	   var aall = 'tasks'+i;
	   var ides ='#'+aall; 
	   log[aall] = $(ides).val();
	   
	   var aall1 = 'completeness'+i;
	   var ides1 ='#'+aall1;
	   log[aall1] = $(ides1).val();
        
	   var aall2 = 'process'+i;
	   var ides2 ='#'+aall2;
	   log[aall2] = $(ides2).val();
	   
	   var aall3 = 'supervision'+i;
	   var ides3 ='#'+aall3;
	   log[aall3] = $(ides3).val();

	   var aall4 = 'technical'+i;
	   var ides4 ='#'+aall4;
	   log[aall4] = $(ides4).val();
	   
	   var aall5 = 'meeting'+i;
	   var ides5 ='#'+aall5;
	   log[aall5] = $(ides5).val();
       
     }
	 
	console.log(log);
	
      var config = {
        params: {
          log: log
        }
      };
	  
	
	 
 };
 });

 /*Mail  controller */
 
  function mailController($scope ,$http) {
	  
	$http.get('maillist.php').success(function(data){  
	  
    //console.log(data.Model.value)
    /* for Model */   
    $scope.options = data.Model;
	
    $scope.toggleAll = function() {
     var toggleStatus = $scope.isAllSelected;
     angular.forEach($scope.options, function(itm){ 
		itm.selected = toggleStatus; 
	 });
    }
    $scope.optionToggled = function(){
    $scope.isAllSelected = $scope.options.every(function(itm){ return itm.selected; 
    })
    }
   });
    
	$scope.sendmail=function(){
			$scope.action='sendmail';
	} 

	$scope.block=function(){
		$scope.action='block';
	}
	
	
	$scope.sendemail=function(){
	
    if($scope.action == 'sendmail'){
   
		$scope.modelval=[];

        if($scope.options !=null){
                angular.forEach($scope.options, function(models){ 
				   $scope.selection = models.selected;
				     if($scope.selection ==true){
					    $scope.modelval.push(models.value);
				       } 
                   });     
        }
		console.log($scope.modelval);
		
		var url = 'sendmail.php?empdata='+$scope.modelval;
		$http.post(url).success(function (results)
        {
		     console.log(results)
			  

			 jQuery('<div></div>').dialog({
					modal: true,
					title: "Confirmation",
					open: function () {
						var markup = '<b>Mail send Successfully</b>';
						jQuery(this).html(markup);
					},
					buttons: {
						Ok: function () {
							jQuery(this).dialog("close");
						}
					}
				});
			 
		})
        .error(function (results)
        {
		
		//console.log('sss')
		//console.log(results)
        
        });
		
	}   
    
	if($scope.action == 'block'){
   
		$scope.modelval=[];

        if($scope.options !=null){
                angular.forEach($scope.options, function(models){ 
				   $scope.selection = models.selected;
				     if($scope.selection ==true){
					    $scope.modelval.push(models.value);
				       } 
                   });     
        }
		console.log($scope.modelval);
		
		var url = 'block.php?empdata='+$scope.modelval;
		$http.post(url).success(function (results)
        {
		     console.log(results)
			  

			 jQuery('<div></div>').dialog({
					modal: true,
					title: "Confirmation",
					open: function () {
						var markup = '<b>User Blocked Successfully</b>';
						jQuery(this).html(markup);
					},
					buttons: {
						Ok: function () {
							jQuery(this).dialog("close");
						}
					}
				});
			 
		})
        .error(function (results)
        {
		
		//console.log('sss')
		//console.log(results)
        
        });
		
	}   
   }
   
   
  };

myApp.controller('mailController', mailController);
myApp.controller('AssociateQuery', AssociateQuery);
myApp.controller('ManagerCtrlView', ManagerCtrlView);
myApp.controller('ManagerlistCtrlView', ManagerlistCtrlView);
myApp.controller('AssociatedeatilCtrl', AssociatedeatilCtrl);
myApp.controller('AssociateCtrlView', AssociateCtrlView);
myApp.controller('HrCtrlView', HrCtrlView);
myApp.controller('HODCtrlView', HODCtrlView);
myApp.controller('HOD_dashboard_CtrlView', HOD_dashboard_CtrlView);
myApp.controller('HR_dashboard_CtrlView', HR_dashboard_CtrlView);
myApp.controller('AssociateCtrl', AssociateCtrl);
myApp.controller('MyController', MyController);
myApp.controller('OtherController', OtherController);

myApp.filter('unique', function() {
		return function (arr, field) {
		var o = {}, i, l = arr.length, r = [];
		for(i=0; i<l;i+=1) {
			o[arr[i][field]] = arr[i];
		}
		for(i in o) {
			r.push(o[i]);
		}
		return r;
		};
	});
