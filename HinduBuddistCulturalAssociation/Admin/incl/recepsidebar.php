<style type="text/css">
 #slidetext{
	color:#000;
	font-size:14px;
	font-weight:bold;
}
</style>
 
 <div class="main-container ace-save-state" id="main-container">
	<script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar responsive ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

				
            <ul class="nav nav-list">
                <li class="">
                    <a href="<?php echo $rootPath ?>Admin/reception.php">
                        <i class="menu-icon fa fa-tachometer bigger-175" style="color:#C00"></i>
                        <span class="menu-text" id="slidetext"> Dashboard </span>
                    </a>

                    <b class="arrow"></b>
                </li>

	 			<li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-user bigger-175" style="color: #006"></i>
                        <span class="menu-text" id="slidetext">
                            Enrollment
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                          <a href="<?php echo $rootPath ?>Admin/recep/enroll.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Enroll Student
                            </a>	
                        </li>
                         <li class="">
                          <a href="<?php echo $rootPath ?>Admin/recep/addstudent.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Register Student
                            </a>	
                        </li>
                    </ul>
                </li>
 
                
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-money bigger-175" style="color:#C00"></i>
                        <span class="menu-text" id="slidetext">
                            Payment</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/recep/installpayment.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Install Payment 
                            </a>	
                        </li>
                    </ul>
                </li>
                
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-check-square-o bigger-175" style="color: #006"></i>
                        <span class="menu-text" id="slidetext">
                            Attendance
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/recep/attstu.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Student Attendance
                            </a>	
                        </li>
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/recep/attemp.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                       			 Staff Attentance
                            </a>
                        </li>
                   </ul>
                </li>
                
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-envelope-o bigger-175" style="color: #C00"></i>
                        <span class="menu-text"id="slidetext" >
                            Communication
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/recep/communication.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Email
                            </a>	
                        </li>
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/communication/sms.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                SMS
                            </a>	
                        </li>
                    </ul>
                </li>
                 <li class="">
                    <a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-files-o bigger-175" style="color:#006"></i> 
                    <span class="menu-text" id="slidetext">Reports
                    </span>
                    
					<b class="arrow fa fa-angle-down"></b>
				  </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                       <li class="">
                            <a href="<?php echo $rootPath ?>Admin/recep/view_reports/income.php">
                                <i class="menu-icon fa fa-pencil orange"></i>
                                Income Report
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-pencil orange"></i>
                                Attandance Summary
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>

                            <ul class="submenu">
                                <li class="">
                                    <a href="<?php echo $rootPath ?>Admin/recep/view_reports/attreportstu.php">
                                        <i class="menu-icon fa fa-plus purple"></i>
                                        Student
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                                <li class="">
                                    <a href="<?php echo $rootPath ?>Admin/recep/view_reports/attreportemp.php">
                                        <i class="menu-icon fa fa-eye pink"></i>
                                        Employee
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                        
                        
                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-pencil orange"></i>
                                Profile
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>

                            <ul class="submenu">
                                <li class="">
                                    <a href="<?php echo $rootPath ?>Admin/recep/profilestu.php">
                                        <i class="menu-icon fa fa-plus purple"></i>
                                        Student
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                                <li class="">
                                    <a href="<?php echo $rootPath ?>Admin/recep/profileemp.php">
                                        <i class="menu-icon fa fa-eye pink"></i>
                                        Employee
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                        
                        <!-- <li class="">
                            <a href="#">
                                <i class="menu-icon fa fa-leaf green"></i>
                                Shedule
                            </a>

                            <b class="arrow"></b>
                        </li> 
                        
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/recep/view_reports/enrollment.php">
                                <i class="menu-icon fa fa-leaf green"></i>
                                Daily Enrollment
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
                        <li class="">
                            <a href="#">
                                <i class="menu-icon fa fa-leaf green"></i>
                                Result Sheet
                            </a>

                            <b class="arrow"></b>
                        </li> -->
                    </ul>
                </li>
                                          
          </ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>
						<div class="page-content"></div><!-- /.page-content -->