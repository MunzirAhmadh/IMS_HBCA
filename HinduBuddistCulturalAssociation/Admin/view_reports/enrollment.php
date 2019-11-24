<?php 
	require_once('../incl/header.php');
	require_once('../incl/sidebar.php');
	require_once('../incl/dbconnection.php'); 
	require_once('../incl/functions.php'); 
?>
<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
                 &nbsp; View Enrollment
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->
    
    <div class="col-sm-9 col-sm-offset-1">
    	<span style="color:#f00; font-size:16px" class="pull-center"><b>Select the Type :</b></span>
    </div>
    </br></br>
    
  	<div class="row">
		<div class="col-sm-9 col-sm-offset-1">
			<form class="form-horizontal">
                        <input type="button" class="btn btn-link" style="color:#006; font-size:16px; font-weight:bold" value="Daily ::" id="btndaily"/>
                        <input type="button" class="btn btn-link" style="color:#006; font-size:16px; font-weight:bold" value="Weekly ::" id="btnweek"/>
                        <input type="button" class="btn btn-link" style="color:#006; font-size:16px; font-weight:bold" value="Monthly ::" id="btnmonth"/>
                        </br>
            			<div class="form-group" id="div_daily" style="display:none">
            			 	<label for="inputEmail3" class="col-sm-2 control-label">Course :</label>
                                <div class="col-sm-3" >
                                    <select class="form-control" id="cmbCou1">
										<?php getcourse(); ?>
                                    </select>
                                </div>
                            	 <label for="inputEmail3" class="col-sm-1 control-label">Batch :</label>
                                <div class="col-sm-3" >
                                    <select class="form-control" id="cmbBatch1">
										<?php getbatch(); ?>
                                    </select>
                                </div>
                                 <div class="col-sm-1" >
                                    <a type="button" target="_blank" class="btn btn-primary" id="btn_allenroll" ><span class="glyphicon glyphicon-plus"></span>All</a>
                                </div>
                                <div class="col-sm-1" >
                                    <a type="button" target="_blank" class="btn btn-primary" id="btn_dailyenroll" ><span class="glyphicon glyphicon-plus"></span>View</a>
                                </div> 
                         </div>
                   		</br></br>

            			<div class="form-group" id="div_week" style="display:none">
            			 	<label for="inputEmail3" class="col-sm-2 control-label">Course :</label>
                                <div class="col-sm-3" >
                                    <select class="form-control" id="cmbCou2">
										<?php getcourse(); ?>
                                    </select>
                                </div>
                            	 <label for="inputEmail3" class="col-sm-1 control-label">Batch :</label>
                                <div class="col-sm-3" >
                                    <select class="form-control" id="cmbBatch2">
										<?php getbatch(); ?>
                                    </select>
                                </div>
                                 <div class="col-sm-1" >
                                    <a type="button" target="_blank" class="btn btn-primary" id="btn_allwenroll" ><span class="glyphicon glyphicon-plus"></span>All</a>
                                </div>
                                <div class="col-sm-1" >
                                    <a type="button" target="_blank" class="btn btn-primary" id="btn_weekenroll" ><span class="glyphicon glyphicon-plus"></span>View</a>
                                </div> 
                         </div>
                         </br></br>
                         
            			<div class="form-group" id="div_month" style="display:none">
            			 	<label for="inputEmail3" class="col-sm-2 control-label">Course :</label>
                                <div class="col-sm-3" >
                                    <select class="form-control" id="cmbCou3">
										<?php getcourse(); ?>
                                    </select>
                                </div>
                            	 <label for="inputEmail3" class="col-sm-1 control-label">Batch :</label>
                                <div class="col-sm-3" >
                                    <select class="form-control" id="cmbBatch3">
										<?php getbatch(); ?>
                                    </select>
                                </div>
                                 <div class="col-sm-1" >
                                    <a type="button" target="_blank" class="btn btn-primary" id="btn_allmenroll" ><span class="glyphicon glyphicon-plus"></span>All</a>
                                </div>
                                <div class="col-sm-1" >
                                    <a type="button" target="_blank" class="btn btn-primary" id="btn_monthenroll" ><span class="glyphicon glyphicon-plus"></span>View</a>
                                </div> 
                         </div>
                   		</br>
			</form>
		</div>
	</div>
 <?php require_once('../incl/footer.php'); ?>   
</div><!-- /.page-content -->

<script type="text/javascript">
	//These function is used to show the divs according to the report type
	$("#btndaily").click(function(){		
			$("#div_daily").toggle(1000);
			$("#div_week").hide();
			$("#div_month").hide();
		});
	$("#btnweek").click(function(){		
			$("#div_week").toggle(1000);
			$("#div_month").hide();
			$("#div_daily").hide();
		});
	$("#btnmonth").click(function(){		
			$("#div_month").toggle(1000);
			$("#div_week").hide();
			$("#div_daily").hide();
		});
		
	$(document).ready(function() {
	$('.date-picker').datepicker({
			autoclose: true,
            todayHighlight: true
        });
    });
	//------------------------------------------------Daily---------------------------------------
	//View Daily Enrollment Report - Student wise
		$( "#cmbCou1" ).change(function() {
			$('#cmbBatch1').attr('disabled', true);
			$('#btn_allenroll').attr('disabled', true);
			var coucode = $( "#cmbCou1" ).val();
			var url ="http://localhost/CollegeManagementSystem/admin/reports/enrollment-course.php?couID="+coucode;
		
			$("#btn_dailyenroll").attr("href", url);
		 });
   	 //View Daily Enrollment  - Batch wise
		$( "#cmbBatch1" ).change(function() {
			$('#cmbCou1').attr('disabled', true);
			$('#btn_allenroll').attr('disabled', true);
			var batchcode = $( "#cmbBatch1" ).val();
			var url ="http://localhost/CollegeManagementSystem/admin/reports/enrollment-batch.php?batchID="+batchcode;
		
			$("#btn_dailyenroll").attr("href", url);
		  });
	  
	  //View Daily Enrollment  - Batch wise
			$('#btn_allenroll').click(function() {
				window.open("../reports/enrollment-daily.php");
			});
	//------------------------------------------------------Weekly----------------------------------------------	
		//View Weekly Enrollment Report - Student wise
		$( "#cmbCou2" ).change(function() {
			$('#cmbBatch2').attr('disabled', true);
			$('#btn_allwenroll').attr('disabled', true);
			var coucode = $( "#cmbCou2" ).val();
			var url ="http://localhost/CollegeManagementSystem/admin/reports/enrollment-course-week.php?couID="+coucode;
		
			$("#btn_weekenroll").attr("href", url);
		 });
  	 //View Weekly Enrollment  - Batch wise
		$( "#cmbBatch2" ).change(function() {
			$('#cmbCou2').attr('disabled', true);
			$('#btn_allwenroll').attr('disabled', true);
			var batchcode = $( "#cmbBatch2" ).val();
			var url ="http://localhost/CollegeManagementSystem/admin/reports/enrollment-batch-week.php?batchID="+batchcode;
		
			$("#btn_weekenroll").attr("href", url);
		  });
	  
	  //View Weekly Enrollment  - Batch wise
		$('#btn_allwenroll').click(function() {
			window.open("../reports/enrollment-week.php");
			});
			
		//------------------------------------------------------Monthly---------------------------------------------	
		//View Monthly Enrollment Report - Student wise
		$( "#cmbCou3" ).change(function() {
			$('#cmbBatch3').attr('disabled', true);
			$('#btn_allmenroll').attr('disabled', true);
			var coucode = $( "#cmbCou3" ).val();
			var url ="http://localhost/CollegeManagementSystem/admin/reports/enrollment-course-month.php?couID="+coucode;
		
			$("#btn_monthenroll").attr("href", url);
		 });
  		//View Monthly Enrollment  - Batch wise
		$( "#cmbBatch3" ).change(function() {
			$('#cmbCou3').attr('disabled', true);
			$('#btn_allmenroll').attr('disabled', true);
			var batchcode = $( "#cmbBatch3" ).val();
			var url ="http://localhost/CollegeManagementSystem/admin/reports/enrollment-batch-month.php?batchID="+batchcode;
		
			$("#btn_monthenroll").attr("href", url);
		  });
	  
	  //View Monthly Enrollment  - Batch wise
		$('#btn_allmenroll').click(function() {
			window.open("../reports/enrollment-month.php");
			});
			
		//------------------------------------------------------Yearly---------------------------------------------	
		//View Monthly Enrollment Report - Student wise
		$( "#cmbCou4" ).change(function() {
			$('#cmbBatch4').attr('disabled', true);
			$('#btn_allyenroll').attr('disabled', true);
			var coucode = $( "#cmbCou4" ).val();
			var url ="http://localhost/CollegeManagementSystem/admin/reports/enrollment-course-year.php?couID="+coucode;
		
			$("#btn_yearenroll").attr("href", url);
		 });
  		//View Monthly Enrollment  - Batch wise
		$( "#cmbBatch4" ).change(function() {
			$('#cmbCou4').attr('disabled', true);
			$('#btn_allyenroll').attr('disabled', true);
			var batchcode = $( "#cmbBatch4" ).val();
			var url ="http://localhost/CollegeManagementSystem/admin/reports/enrollment-batch-year.php?batchID="+batchcode;
		
			$("#btn_yearenroll").attr("href", url);
		  });
	  
	  //View Monthly Enrollment  - Batch wise
		$('#btn_allyenroll').click(function() {
			window.open("../reports/enrollment-year.php");
			});
</script>

