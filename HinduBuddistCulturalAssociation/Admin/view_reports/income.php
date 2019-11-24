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
                 &nbsp; Income Report
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->
    
    </br>
  <div class="row">
		<div class="col-sm-9 col-sm-offset-1">
			<form class="form-horizontal">
            			
                        <label for="inputEmail3" class="control-label"style="color:#006; font-size:14px"><b>Select the Type ::</b></label><br /><br /><br />
                        <div class="form-group">
                             <div class="col-sm-3" >
                                        <a type="button" target="_blank" class="btn btn-primary" id="btn_daily" ><span class="glyphicon glyphicon-plus"></span>Daily Income</a>
                             </div> 
                             <div class="col-sm-3" >
                                        <a type="button" target="_blank" class="btn btn-primary" id="btn_weekly" ><span class="glyphicon glyphicon-plus"></span>Weekly Income</a>
                             </div> 
                             <div class="col-sm-3" >
                                        <a type="button" target="_blank" class="btn btn-primary" id="btn_monthly" ><span class="glyphicon glyphicon-plus"></span>Monthly Income</a>
                             </div> 
                              <div class="col-sm-3" >
                                        <a type="button" target="_blank" class="btn btn-primary" id="btn_yearly" ><span class="glyphicon glyphicon-plus"></span>Yearly Income</a>
                             </div>
                          </div>
                           <br /> 
                         <label for="inputEmail3" class="control-label"style="color:#006; font-size:14px"><b>View Income ::</b></label><br />             
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Select Date :</label>
                            <div class="col-sm-3" >
                                <div class='input-group date date-picker'>
                                    <input type="text" class="form-control"  id="txtdate" data-date-format="yyyy-mm-dd" />
                                     <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                            	</div>
                            </div>
                            <div class="col-sm-2" >
                            	<button type="button" class="btn btn-primary" id="btn_income" ><span class="glyphicon glyphicon-plus"></span>View</button>
                            </div>
                     	</div>  
                        <br />
                        
			</form>
		</div>
	</div>
    </br>
</div><!-- /.page-content -->
<?php require_once('../incl/footer.php'); ?>
<script type="text/javascript">
	$('#txtdate').datepicker({
				autoclose: true,
				todayHighlight: true,
			
			});
		
	   // view the income report for selected date
		 $("#btn_income").click(function(){
			var incomedate = $( "#txtdate" ).val();
			var url ="http://localhost/HinduBuddistCulturalAssosiation/Admin/reports/dailyincome.php?incomedate="+incomedate;
			 window.open(url,"new");
		 });
		 
		 // view the daily income report
		$('#btn_daily').click(function() {
				window.open("../reports/incomedaily.php");
			});
			
		// view the weekly income report
		$('#btn_weekly').click(function() {
				window.open("../reports/incomeweekly.php");
			});
			
		// view the monthly income report
		$('#btn_monthly').click(function() {
				window.open("../reports/incomemonthly.php");
			});
			
		// view the yearly income report
		$('#btn_yearly').click(function() {
				window.open("../reports/incomeyearly.php");
			});

</script>

