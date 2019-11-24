<?php 
	require_once('../incl/header.php');
	require_once('../incl/recepsidebar.php');
	require_once('../incl/dbconnection.php');
?>

<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
                Employee Attendance
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->

	<div class="row">
		<div class="col-md-12 col-md-offset-1">
        <span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with * are required fields</b></span>
			</br>
			<form class="form-inline">
				<div class="row">
					</br>
                    <div class="form-group col-sm-3">
                        <label class="control-label">Date<span style="color:#f00">*</span></label>
                        <div class='input-group date date-picker'>
                                <input type="text" class="form-control" name="txtdate" id="txtdate" readonly="readonly" data-date-format="yyyy-mm-dd"   placeholder="Current Date"  value="<?php echo date('Y-m-d'); ?>"/>
                                 <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-90"></i>
                                </span>
                        </div>
                     </div>
               </div>   
            </form>
		</div>                 
	</div>
 	<br/></br>

	<div class="row">
		<div class="col-sm-12">

			<table class="table table-default table-bordered "  id="table-data">
				<thead>
					<tr>
						<th align="center">Emp ID</th>
						<th align="center">First Name</th>
                        <th align="center">Last Name</th>
                        <th align="center">Date</th>
						<th align="center">Status</th>
                        <th align="center">Remark</th>					
					</tr>
				</thead>
				<tbody>
				<?php
					
					$obj=new dbconnection();
					$con=$obj->getcon();
					$today_date = date('Y-m-d');
					//fetch table rows from mysql db
					$sql = "SELECT employee.id, employee.empfname, employee.emplname, employee.empcode FROM employee
                            WHERE empcode NOT IN(SELECT empID FROM attendancestaff WHERE attempdate ='".$today_date."') AND employee.empstatus=1 ";
					$result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));

					$nor = $result->num_rows;
					
					if($nor > 0)
					{
						$array = array();
						while ( $setdata = mysqli_fetch_assoc( $result ) ) 
						{
						    $mark_id = "mark".$setdata['empcode'];
						    $com_id = "cmt".$setdata['empcode'];
						?>
							<tr>
								<td align="left"><?php echo $setdata['empcode'] ?><input type="hidden" class="markcls" value="<?php echo $setdata['empcode']?>"></td>
								<td><?php echo $setdata['empfname'] ?></td>
                                <td><?php echo $setdata['emplname'] ?></td>
                                <td><?php echo date('Y-m-d'); ?></td>
								<td> 
                                	<select class="form-control " id="<?php echo $mark_id?>">
                                        <option value="1">Present </option>
                                        <option value="2">Absent</option>  
                                    </select>
                				</td>
                                <td><input type="text" name="txtcc" id="<?php echo $com_id?>"class="form-control" placeholder="Add Remark" /></td>
                            </tr>
						<?php
								
						}

					}
					else{
					?>
						<tr><td colspan="6">No record found</td></tr>
					<?php
					}

				 
				?>

				</tbody>
			</table>
            </div>
            
			     <!-- Button Group -->
          <div class="row">
				<div class="col-lg-12  pull-right">
					<div class="buttons pull-right">
					</br>
						<button type="button" class="btn btn-primary" id="btn_save" onclick="mark_emp_attendance()"><span class="glyphicon glyphicon-plus"></span> Submit</button>
						<button type="reset" class="btn btn-danger btn-sm" id="btn_clear" onclick="clear_form()" style="padding:8px"><span class="glyphicon glyphicon-floppy-remove"></span> Reset </button>
					</div>
				</div>
			 </div>
              
	</div> <!-- / data table -->   
<?php require_once('../incl/footer.php'); ?>
</div><!-- /.page-content -->

<script type="text/javascript">
	$( document ).ready(function() {
		$('#table-data').DataTable();
	});
	
	/*This function is to mark attandance*/
	 function mark_emp_attendance() {
        $('#btn_save').attr('disabled', true);
        var error=0;
        var emp_no = [];
        var att_com = [];
        var att_mark = [];
        var act_mode = "mark_emp_attendance";
        var i = 0;
        var cmt = "#cmt";
        var mark ="#mark";
        $(".markcls").each(function() {

            var emp_id =$(this).val();

            emp_no[i] = $(this).val();
            att_com[i] = $(cmt+emp_id).val();
            att_mark[i] = $(mark+emp_id).val();

            i++;
        });
        if(i == 1){
            error++;
        }
        if(error>0){
            alert("Please mark the attendance");
            $('#btn_save').attr('disabled', false);
        }
        else{
            $.post('../incl/attandance_handle.php',
                {'act_mode':act_mode,'emp_no': emp_no, 'att_com':att_com, 'att_mark':att_mark},

                function(data) {
                    if (data== "true") {
                        alert("Attendance mark successfully");
                        location.reload();
                        $('#btn_save').attr('disabled', false);

                    } else {
                        alert("Attendance marking failed");

                    }
                }, "json");
        }
    }
</script>