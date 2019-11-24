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
                 &nbsp; View Employee Attendance
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->
    
    </br>
  	<div class="row">
		<div class="col-sm-9 col-sm-offset-1">
			<form class="form-horizontal">
                 
                   	<label for="inputEmail3" class="control-label"style="color:#006; font-size:14px"><b>View Attandance ::</b></label><br />             
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Select Date :</label>
                            <div class="col-sm-3" >
                                <div class='input-group date date-picker'>
                                    <input type="text" class="form-control"  id="txtpresent" data-date-format="yyyy-mm-dd" />
                                     <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                            	</div>
                            </div>
                            <div class="col-sm-2" >
                            	<button type="button" class="btn btn-primary" id="btn_attandance" ><span class="glyphicon glyphicon-plus"></span>View</button>
                            </div>
                     	</div>   
                        
                        </br></br>
                   	<label for="inputEmail3" class="control-label"style="color:#006; font-size:14px"><b>Absenties ::</b></label><br />             
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Select Date :</label>
                            <div class="col-sm-3" >
                                <div class='input-group date date-picker'>
                                    <input type="text" class="form-control"  id="txtabsent" data-date-format="yyyy-mm-dd"/>
                                     <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                            	</div>
                            </div>
                            <div class="col-sm-2" >
                            	<button type="button" class="btn btn-primary" id="btn_absent" ><span class="glyphicon glyphicon-plus"></span>View</button>
                            </div>
                     	</div>   
			</form>
		</div>
	</div>
</div><!-- /.page-content -->
<?php require_once('../incl/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#txtpresent').datepicker({
				autoclose: true,
				todayHighlight: true,
			
			});
		$('#txtabsent').datepicker({
				autoclose: true,
				todayHighlight: true,
			
			});
			
	   // view the employee attandance report
		 $("#btn_attandance").click(function(){
			var attdate = $( "#txtpresent" ).val();
			var url ="http://localhost/HinduBuddistCulturalAssosiation/admin/reports/emp_attandance.php?attdate="+attdate;
			 window.open(url,"new");
		 });
		 
		 // view the absent employees
		 $("#btn_absent").click(function(){
			var attdate = $( "#txtabsent" ).val();
			var url ="http://localhost/HinduBuddistCulturalAssosiation/admin/reports/emp_absenties.php?attdate="+attdate;
			 window.open(url,"new");
		 });
    });
   
</script>

