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
                    <a href="<?php echo $rootPath ?>Admin/index.php">
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
                          <a href="<?php echo $rootPath ?>Admin/student/enroll.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Enroll Student
                            </a>	
                        </li>
                         <li class="">
                          <a href="<?php echo $rootPath ?>Admin/student/addstudent.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Register Student
                            </a>	
                        </li>
                    </ul>
                </li>
 
                  <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-user-secret bigger-175" style="color:#C00"></i>
                        <span class="menu-text" id="slidetext">
                            Employee
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                          <a href="<?php echo $rootPath ?>Admin/employee/addemployee.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Register Employee
                            </a>	
                        </li>
                     </ul>
                 </li>
                 
                 <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-cog bigger-175" style="color: #006"></i>
                        <span class="menu-text" id="slidetext">
                            Configuration</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/configuration/addcourse.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Manage Course 
                            </a>	
                        </li>
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/configuration/addbatch.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Manage Batch 
                            </a>	
                        </li>
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/configuration/addclassroom.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Manage Classroom
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/configuration/addexam.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Manage Exam 
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
                            <a href="<?php echo $rootPath ?>Admin/payment/installpayment.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Installment Payment 
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
                            <a href="<?php echo $rootPath ?>Admin/attandance/attstu.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Student Attendance
                            </a>	
                        </li>
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/attandance/attemp.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                       			 Staff Attentance
                            </a>
                        </li>
                     </ul>
                </li>
                
                 <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-calendar-check-o bigger-175" style="color:#C00"></i>
                        <span class="menu-text"id="slidetext" >
                            Shedule
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/shedule/class-examshedule.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Class/Exam
                            </a>	
                        </li>
                        <li class="">
                        	<a href="<?php echo $rootPath ?>Admin/shedule/timetable.php">
                            	Time Table
                            </a>
                        </li>
                    </ul>
                </li>
				
                 <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-users bigger-175" style="color:#C00"></i>
                        <span class="menu-text" id="slidetext" >
                            Users</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/user/manageuser.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Manage Users
                            </a>	
                        </li>
                    </ul>
                </li>
                
                  <li class="">
                    <a href="<?php echo $rootPath ?>Admin/result/exammarks.php">
                        <i class="menu-icon fa fa-leanpub bigger-175" style="color:#006"></i>
                        <span class="menu-text" id="slidetext">
                             Exam Marks</span>
                    </a>  
                </li>
                    
                 <li class="">
                    <a href="<?php echo $rootPath ?>Admin/view_reports/certificate.php">
                        <i class="menu-icon fa fa-file bigger-160" style="color:#C00"></i>
                        <span class="menu-text" id="slidetext">
                             Certificate</span>
                    </a>  
                </li>
                
				<li class="">
				  <a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-files-o bigger-175" style="color:#C00"></i> 
                    <span class="menu-text" id="slidetext">Reports
                    </span>
                    
					<b class="arrow fa fa-angle-down"></b>
				  </a>

					<b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-pencil orange"></i>
                                Payment
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>

                                <li class="">
                                    <a href="<?php echo $rootPath ?>Admin/view_reports/income.php">
                                        <i class="menu-icon fa fa-eye pink"></i>
                                        Income Report
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
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
                                    <a href="<?php echo $rootPath ?>Admin/view_reports/attreportstu.php">
                                        <i class="menu-icon fa fa-plus purple"></i>
                                        Student
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                                <li class="">
                                    <a href="<?php echo $rootPath ?>Admin/view_reports/attreportemp.php">
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
                                    <a href="<?php echo $rootPath ?>Admin/student/profile.php">
                                        <i class="menu-icon fa fa-plus purple"></i>
                                        Student
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                                <li class="">
                                    <a href="<?php echo $rootPath ?>Admin/employee/profile.php">
                                        <i class="menu-icon fa fa-eye pink"></i>
                                        Employee
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/view_reports/enrollment.php">
                                <i class="menu-icon fa fa-leaf green"></i>
                                Daily Enrollment
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
                        <li class="">
                            <a href="<?php echo $rootPath ?>Admin/view_reports/viewresult.php">
                                <i class="menu-icon fa fa-leaf green"></i>
                                Result Sheet
                            </a>

                            <b class="arrow"></b>
                        </li>
                        
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