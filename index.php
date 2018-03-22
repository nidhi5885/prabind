<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $base_url.'public/images/'?>favicon.ico" rel="icon" />
<title>Associate Requisition Form</title>
<link href="<?php echo $base_url;?>public/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="full_container headerSection">
	<div class="pageWidth">
    	<div class="wrapper">
			<div class="col-6 text-left">
            	<a href="#" class="logolink"><img src="<?php echo $base_url;?>public/images/vtiger-crm-logo.gif" class="centerImg logo" /></a>
            </div>
			<div class="col-6">

            </div>
        </div><!-- wrapper -->
    </div><!-- page width -->
</div><!-- full container -->

<div class="full_container navpanel">
	<div class="pageWidth">
    	<div class="wrapper">
        	<div class="col-8">
                <ul class="main_menu">
                </ul><!-- main menu -->
            </div>
            <div class="col-4 text-center">
            	
            </div>
        </div><!-- wrapper -->
    </div><!-- page width -->
</div><!-- top header -->

<div class="full_container middleSection">
	<div class="pageWidth">
    	<div class="wrapper">
        	<div class="content_box">

				<div class="loginBox">

                        <div class="dataBox">
                            <div class="db_title"><h3>Login</h3></div>
                            <div class="db_content">
                                <table border="0" cellpadding="5" width="100%">
								<form action="login_check.php"  method="POST">
                                    <tr>
									
                                        <th class="text-left">Manager ID</th>
                                        <td><input type="text" name="id" placeholder="Manager ID" maxlength="6" required /></td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Password</th>
                                        <td><input type="password" name="password" placeholder="Password" required /></td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">&nbsp;</th>
                                        <td><input type="submit" value="Login" class="btn-primary" /></td>
                                    </tr>
									</form>
                                </table>
                            </div>
                        </div><!-- data box -->

                </div><!-- login box -->
                
            </div><!-- content box -->
        </div><!-- wrapper -->
    </div><!-- page width -->
</div><!-- full container -->


<div class="full_container footerSection">
	<div class="pageWidth">
    	<div class="wrapper">
        	<div class="col-6 text-left"><p>Progressive Infotech Pvt. Ltd.</p></div>
        	<div class="col-6 text-right"><p>&copy; 2015 Progressive Infotech Pvt. Ltd. <a href="http://www.progressive.in/" target="_blank">Our Company</a> <a href="http://www.progressive.in/quality-policy/" target="_blank">Quality Policy</a></p></div>
        </div><!-- wrapper -->
    </div><!-- page width -->
</div><!-- full container -->

</body>
</html>
