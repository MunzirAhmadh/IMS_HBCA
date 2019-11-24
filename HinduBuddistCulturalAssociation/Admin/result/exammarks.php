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
                 &nbsp; Enter Exam Marks
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
    
 
<script type="text/javascript">
 $("#cmbCourse").change(function(){

        var cmbCourse = $("#cmbCourse").val();

        $.post('../incl/marks_handle.php', {
                'cmbCourse': cmbCourse,
                'act_mode': 'load_batches'
            },
            function(data) {
                $("#cmbBatch").empty();

                for (i = 0; i < data.length; i++) {
                    var batchCode   = data[i].batchID;
                    var batid    = data[i].id;

                    row = '<option value="'+batchCode+'">'+batchCode+'</option>';
                    $("#cmbBatch").append(row);
                }
            }, "json");
    });
	

function add_marks() {
        $('#btn_save').attr('disabled', true);
        var error=0;
        var std_no = [];
        var exam_mark = [];
        var act_mode = "add_marks";
        var i = 0;
		var mark ="#mark";
		var cmbCourse = $('#cmbCourse').val();
		var cmbBatch = $('#cmbBatch').val();
		var txtexamtype = $('#txtexamtype').val();
		
        $(".markcls").each(function() {

            var std_id =$(this).val();

            std_no[i] = $(this).val();
            exam_mark[i] = $(mark+std_id).val();

            i++;
			
        });
    
	
        if(error>0){
            alert("Please add the marks");
            $('#btn_save').attr('disabled', false);
        }
        else{
			
            $.post('../incl/marks_handle.php',
                {'act_mode':act_mode,'std_no': std_no,'cmbCourse':cmbCourse,'cmbBatch':cmbBatch, 'txtexamtype':txtexamtype, 'exam_mark':exam_mark},

                function(data) {
                    if (data== "true") {
                        alert("Marks Added Successfully");
                        location.reload();
                        $('#btn_save').attr('disabled', false);

                    } else {
                        alert("Marks Adding failed");
                    }
                }, "json");
        }
    }

    function load_marks() {
        var act_mode = "load_marks";
        var cmbBatch = $('#cmbBatch').val();
        var txtexamtype = $('#txtexamtype').val();
        $.post('../incl/marks_handle.php', {'act_mode':act_mode,'cmbBatch':cmbBatch,'txtexamtype':txtexamtype},
            function (data) {
                if (data == "NA") {
                    row = '<tr><td colspan="4">No record found</td></tr>';
                    $("#table-data tbody").append(row);
                }
                else {
                    $("#table-data tbody").empty();

                    for (i = 0; i < data.length; i++) {
                        var enrollID   = data[i].enrollID;
                        var stucode    = data[i].stucode;
                        var stuinitialname = data[i].stuinitialname;

                        var mark_id = "mark"+enrollID;

                        row = '<tr><td><input type="text" class="markcls" readonly="readonly" value="'+enrollID+'"></td><td>' + stucode + '</td><td>' + stuinitialname + '</td>\
                        <td><input type="text" name="txtcc" id="'+mark_id+'" class="form-control" placeholder="Add marks" /></td>\
                        </tr>';
                        $("#table-data tbody").append(row);
                    }
                    $("#table-data").dataTable();
                }
            }, 'json'
        );
    }
</script>

<?php require_once('../incl/footer.php'); ?>
