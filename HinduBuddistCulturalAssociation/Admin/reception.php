<?php 
require_once('incl/header.php');
require_once('incl/recepsidebar.php'); 
 ?>


<div class="page-content">						
	<div class="row">
        <div class="page-header">
            <h1>
                Dashboard
            </h1>
        </div><!-- /.page-header -->
    </div><!-- /.row -->
    
     <div class="row">
    	<div class="col-sm-3" align="center"> 
        	<a href="recep/enroll.php" style="text-decoration:none"> 
                <div align="center"><img src="../img/user_group-icon.gif" width="100px" height="100px"/>
                	<h4>Enrollment</h4>
                </div>
       		</a>
        </div>
       <div class="col-sm-3" align="center">
       		<a href="recep/installpayment.php" style="text-decoration:none">  
                <div align="center"><img src="../img/bill_pay.jpg"  width="116" height="103"/>
                	<h4>Payment</h4>
                </div>
            </a>
       </div>
	   
	 
        <div class="col-sm-3" align="center"> 
        	<a href="recep/attstu.php" style="text-decoration:none"> 
                <div align="center"><img src="../img/Attendance.png" width="100px" height="100px"/>
                	<h4>Student Attendance</h4>
                </div>
            </a>
        </div>
		<div class="col-sm-3" align="center"> 
        	<a href="recep/attemp.php" style="text-decoration:none"> 
                <div align="center"><img src="../img/Attendance.png" width="100px" height="100px"/>
                	<h4>Staff Attendance</h4>
                </div>
            </a>
        </div>
    </div><!-- /.row -->
    </br>
     <div class="row">
   	   <div class="col-sm-3" align="center">
       		<a href="#" style="text-decoration:none">  
                <div align="center"><img src="../img/Phone.ico"  width="89" height="90"/>
                	<h4>Communication</h4>
         		</div>
          </a>
        </div>
       <div class="col-sm-3" align="center">
       		<a href="recep/view_reports/income.php" style="text-decoration:none">  
                <div align="center"><img src="../img/createdoc.png" width="91" height="94" />
                	<h4> Income Report</h4>
                </div>
             </a>
        </div>
        <!--<div class="col-sm-3" align="center">
        	<a href="#" style="text-decoration:none">  
                <div align="center"><img src="../img/001_user.ico" width="101" height="99" />
               		 <h4>Profile</h4>
                </div>
            </a>
        </div>-->
    </div><!-- /.row -->
    
    </br>
    
    
    
</div><!-- /.page-content -->
    
<?php require_once('incl/footer.php'); ?>