<?php 
	//Start Session
	session_start();
	if($_SESSION["user"]["uID"] ==""){
        header("Location:../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Home Page</title>
        <!-- Set the root path -->
		<?php $rootPath = "http://localhost/HinduBuddistCulturalAssosiation/" ?>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo $rootPath ?>css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo $rootPath ?>fonts/fontaw/css/font-awesome.min.css" />

        <!--Charts CSS-->
        <link rel="stylesheet" href="<?php echo $rootPath ?>css/morris.css">
        <link rel="stylesheet" href="<?php echo $rootPath ?>css/eventCalendar.css">
        <link rel="stylesheet" href="<?php echo $rootPath ?>css/eventCalendar_theme_responsive.css">

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo $rootPath ?>css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo $rootPath ?>css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="<?php echo $rootPath ?>css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo $rootPath ?>css/ace-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo $rootPath ?>css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?php echo $rootPath ?>css/styles.css" />
        <!-- Other Styles-->
		<link type="text/css" rel="<?php echo $rootPath ?>css/jquery-ui.css">
        <link type="text/css" rel="<?php echo $rootPath ?>css/notify.css"/>
        <link type="text/css" rel="<?php echo $rootPath ?>css/toggles.css"/>
        <link type="text/css" rel="<?php echo $rootPath ?>css/toggles-light.css"/>

		<!-- ace settings handler -->
		<script src="<?php echo $rootPath ?>js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo $rootPath ?>
			js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
        <script src="<?php echo $rootPath ?>js/Raphael 2.1.2.js"></script>

        <script src="<?php echo $rootPath ?>js/morris.min.js"></script>
        <script src="<?php echo $rootPath ?>js/jquery.eventCalendar.min.js"></script>
		<script src="<?php echo $rootPath ?>js/bootstrap.min.js"></script>
		<script src="<?php echo $rootPath ?>js/moment.min.js"></script>
		<script src="<?php echo $rootPath ?>/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo $rootPath ?>/js/jquery.dataTables.bootstrap.min.js"></script>
	
		<script src="<?php echo $rootPath ?>/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo $rootPath ?>/js/bootstrap-datetimepicker.min.js"></script>

        <script type="text/javascript" src="<?php echo $rootPath ?>js/notify.js"></script>
		<script type="text/javascript" src="<?php echo $rootPath ?>js/toggles.min.js"></script>
        
		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="<?php echo $rootPath ?>js/ace-elements.min.js"></script>
		<script src="<?php echo $rootPath ?>js/ace.min.js"></script>
	</head>
	<!-- Some Code Segments at the bottom -->
    
	<body class="no-skin">
   
		<div id="navbarmain" class="navbar navbar-default ace-save-state" >
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar" >
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left" >
					<a href="index.html" class="navbar-brand">
						<small style="font-family:Times New Roman; font-weight: bold; font-size:28px; color:#FFF;">
							<i><img src="<?php echo $rootPath ?>img/bce logo.png"/></i>&nbsp;&nbsp;
							Hindu Buddist Cultural Association HBCA
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation"  style="margin-top:10px;">
					<ul class="nav ace-nav">
						<li class="grey dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li>
								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>
								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>
								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>Welcome </small>
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="../logout.php"> 
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>


		