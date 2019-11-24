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
                 &nbsp; Payment Due Report
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->
    
    </br>
  <div class="row">
		<div class="col-sm-9 col-sm-offset-1">
			<form class="form-horizontal">
                         <label for="inputEmail3" class="col-sm control-label">Select : </label>
                          <div class="form-group">
                          	<div class="col-sm-4 col-sm-offset-1" >
                         		<label class="checkbox-inline">&nbsp;&nbsp;<input type="checkbox" value="" id="chkAll">ALL</label>
                            </div>
                         </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">From :</label>
                            <div class="col-sm-2" >
                                <div class='input-group date date-picker'>
                                    <input type="text" class="form-control"  id="txtedoj" data-date-format="yyyy-mm-dd"/>
                                     <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                            	</div>
                            </div>
                            <label for="inputEmail3" class="col-sm-1 control-label">To :</label>
                             <div class="col-sm-2" >
                               <div class='input-group date date-picker'>
                                    <input type="text" class="form-control"  id="txtedoj" data-date-format="yyyy-mm-dd"/>
                                     <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                           		</div>
                            </div>
                     	</div>
                        
                        <div class="form-group">
                        	<label for="inputEmail3" class="col-sm-2 control-label">Batch</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="cmbsid">
                                    <?php getbatch();?>  
                                </select>
                            </div>
                            <label for="inputEmail3" class="col-sm-1 control-label">From :</label>
                            <div class="col-sm-2" >
                                <div class='input-group date date-picker'>
                                    <input type="text" class="form-control"  id="txtedoj" data-date-format="yyyy-mm-dd"/>
                                     <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                            	</div>
                            </div>
                            <label for="inputEmail3" class="col-sm-1 control-label">To :</label>
                             <div class="col-sm-2" >
                               <div class='input-group date date-picker'>
                                    <input type="text" class="form-control"  id="txtedoj" data-date-format="yyyy-mm-dd"/>
                                     <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                           		</div>
                            </div>
                     	</div>
                         <div class="form-group">
                        	<label for="inputEmail3" class="col-sm-2 control-label">Course</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="cmbsid">
                                    <?php getcourse();?>  
                                </select>
                            </div>
                            <label for="inputEmail3" class="col-sm-1 control-label">From :</label>
                            <div class="col-sm-2" >
                                <div class='input-group date date-picker'>
                                    <input type="text" class="form-control"  id="txtedoj" data-date-format="yyyy-mm-dd"/>
                                     <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                            	</div>
                            </div>
                            <label for="inputEmail3" class="col-sm-1 control-label">To :</label>
                             <div class="col-sm-2" >
                               <div class='input-group date date-picker'>
                                    <input type="text" class="form-control"  id="txtedoj" data-date-format="yyyy-mm-dd"/>
                                     <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                           		</div>
                            </div>
                     	</div>
			</form>
		</div>
	</div>
    </br>
      <!-- Button Group -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="buttons pull-right">
                        <button type="button" class="btn btn-primary" id="btn_save" ><span class="glyphicon glyphicon-plus"></span>Generate</button>
                        <button type="reset" class="btn btn-danger btn-sm" id="btn_clear" onclick="clear_form()" style="padding:9px"><span class="glyphicon glyphicon-floppy-remove"></span> Reset </button>
                    </div>
                </div>
             </div>

</div><!-- /.page-content -->
<?php require_once('../incl/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function() {
	$('.date-picker').datepicker({
			autoclose: true,
            todayHighlight: true
        });
    });
</script>

