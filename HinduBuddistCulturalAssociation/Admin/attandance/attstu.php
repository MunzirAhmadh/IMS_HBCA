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
               	Student Attendance
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->

	<div class="row">
		<div class="col-lg-12 col-lg-offset-0">
        <span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with * are required fields</b></span>
			</br>
			<form class="form-inline">
				<div class="row">
					</br>
                   <input type="hidden" id="dateVal" value="<?php echo date('Y-m-d'); ?>"/>
                    <div class="form-group col-sm-4">
                        <label class="control-label">&nbsp; &nbsp; &nbsp; Course</label>
                        <select class="form-control" id="cmbCourse">
                            <?php getcourse(); ?>  
                        </select>
            		 </div>
                     <div class="form-group col-sm-3">
                        <label class="control-label">Batch</label>
                        <select class="form-control" id="cmbBatch">
                            <?php getbatch(); ?>    
                        </select>
            		 </div>
                      <div class="form-group col-sm-2">
                       	<button type="button" class="btn btn-primary" onclick="load_attendance()"><span class="glyphicon glyphicon-plus"></span> Load</button>
            		 </div>
                 </div>   
                 </br>
            </form>
		</div>                 
	</div>
 	<br/>
    
    <div class="row">

		<div class="col-sm-12">

			<table class="table table-default table-bordered "  id="table-data">
				<thead>
					<tr>
                    	<th align="center">Enroll ID</th>
						<th align="center">Student ID</th>
						<th align="center">Student Name</th>
                        <th align="center">Date</th>
						<th align="center">Status</th>
                        <th align="center">Remark</th>						
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
						<button type="button" class="btn btn-primary" id="btn_save" onclick="mark_attandance()" ><span class="glyphicon glyphicon-plus"></span> Submit</button>
						<button type="reset" class="btn btn-danger btn-sm" id="btn_clear" onclick="clear_form()" style="padding:8px"><span class="glyphicon glyphicon-floppy-remove"></span> Reset </button>
					</div>
				</div>
			 </div>
              
	</div> <!-- / data table -->
</div><!-- /.page-content -->
<script type="text/javascript">
    $( document ).ready(function() {
		$('#table-data').DataTable();
    });

/*This function is to load batches for the course*/
  $("#cmbCourse").change(function(){

        var cmbCourse = $("#cmbCourse").val();

        $.post('../incl/attandance_handle.php', {
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

/*This function is to mark attandance*/
    function mark_attandance() {
        $('#btn_save').attr('disabled', true);
        var error=0;
        var std_no = [];
        var att_com = [];
        var att_mark = [];
        var act_mode = "mark_attandance";
        var i = 0;
        var cmt = "#cmt";
        var mark ="#mark";
       
	    $(".markcls").each(function() {

            var std_id =$(this).val();

            std_no[i] = $(this).val();
            att_com[i] = $(cmt+std_id).val();
            att_mark[i] = $(mark+std_id).val();

            i++;
        });
     /*   if(i == 1){
            error++;
        }*/
        if(error>0){
            alert("Please mark the attendance");
            $('#btn_save').attr('disabled', false);
        }
        else{
            $.post('../incl/attandance_handle.php',
                {'act_mode':act_mode,'std_no': std_no, 'att_com':att_com, 'att_mark':att_mark},

                function(data) {
                    if (data== "true") {
                        alert("Attendance marked successfully");
                        location.reload();
                        $('#btn_save').attr('disabled', false);

                    } else {
                        alert("Attendance marking failed");
                    }
                }, "json");
        }
    }

/*This function is to load the student datas tomark the attandance*/
    function load_attendance() {
        var act_mode = "load_attendance";
        var cmbCourse = $('#cmbCourse').val();
        var cmbBatch = $('#cmbBatch').val();
        var date_val = $('#dateVal').val();
        $.post('../incl/attandance_handle.php', {'act_mode':act_mode,'cmbCourse':cmbCourse,'cmbBatch':cmbBatch},
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
                        var com_id = "cmt"+enrollID;

                        row = '<tr><td><input type="text" class="markcls" readonly="readonly" value="'+enrollID+'"></td><td>' + stucode + '</td><td>' + stuinitialname + '</td><td>' + date_val +'</td>\
                        <td><select class="form-control" id="'+mark_id+'"><option value="1">Present </option><option value="2">Absent</option></select></td>\
                        <td><input type="text" name="txtcc" id="'+com_id+'"class="form-control" placeholder="Add Remark" /></td></tr>';
                        $("#table-data tbody").append(row);
                    }
                    $("#table-data").dataTable();
                }
            }, 'json'
        );
    }
	
	
</script>
<?php require_once('../incl/footer.php'); ?>






