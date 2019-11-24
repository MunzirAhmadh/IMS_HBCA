<?php 
	require_once('../incl/header.php');
	require_once('../incl/lecturer.php');
	require_once('../incl/dbconnection.php'); 
	require_once('../incl/functions.php'); 
?>
<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
                 &nbsp; Upload Files
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->

	<div class="row">
		<div class="col-md-12 col-md-offset-0">
        	<span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with * are required fields</b></span>
			</br>
			<form class="form-inline">
				<div class="row">
					</br>
                     <div class="form-group col-sm-4">
                        <label class="control-label">&nbsp; &nbsp; &nbsp; Course</label>
                        <select class="form-control" id="cmbCourse">
                            <?php getcourse(); ?>  
                        </select>
            		 </div>
                    <div class="form-group col-sm-3">
                        <label class="control-label">Select Batch<span style="color:#f00">*</span></label>
                        <label class="control-label">&nbsp;&nbsp;&nbsp;</label>
                        <select class="form-control" id="cmbBatch">
                            <?php getbatch(); ?>    
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Type Exam<span style="color:#f00">*</span></label>
                        <label class="control-label">&nbsp;&nbsp;&nbsp;</label>
                        	<input type="text" id="txtexamtype" class="form-control"  placeholder="Exam Type"/>
                            <label class="col-sm-offset-3 input-format">Written / Oral / Listening / Reading</label>
            		 </div>
                      <div class="form-group col-sm-1">
                       	<button type="button" class="btn btn-primary" onclick="load_marks()"><span class="glyphicon glyphicon-plus"></span> Load</button>
            		 </div>
                 </div>   
                 </br>
            </form>
		</div>                 
	</div>
    
    </br> <div class="row">

		<div class="col-sm-12">

			<table class="table table-default table-bordered "  id="table-data">
				<thead>
					<tr>
						<th align="center">Enroll ID</th>
                        <th align="center">Student ID</th>
						<th align="center">Student Name</th>
                        <th align="center">Marks</th>					
					</tr>
				</thead>
				<tbody>
                

				</tbody>
			</table>
            </div>
            
			     <!-- Button Group -->
          <div class="row">
				<div class="col-lg-12  pull-right">
					<div class="buttons pull-right">
					</br>
						<button type="button" class="btn btn-primary" id="btn_save" onclick="add_marks()" ><span class="glyphicon glyphicon-plus"></span> Submit</button>
						<button type="reset" class="btn btn-danger btn-sm" id="btn_clear" onclick="clear_form()" style="padding:8px"><span class="glyphicon glyphicon-floppy-remove"></span> Reset </button>
                         
					</div>
				</div>
			 </div>
              
	</div> <!-- / data table -->
</div><!-- /.page-content -->
    

<?php require_once('../incl/footer.php'); ?>
