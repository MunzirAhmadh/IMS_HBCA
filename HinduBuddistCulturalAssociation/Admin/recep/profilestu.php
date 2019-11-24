<?php 
	require_once('../incl/header.php');
	require_once('../incl/recepsidebar.php'); 
	require_once('../incl/dbconnection.php');
	require_once('../incl/functions.php'); 
?>


<div class="page-content">
	<div class="row">
		<div class="page-header">
			<h1>
				&nbsp;&nbsp; Student Profile
			</h1>
		</div><!-- /.page-header -->
	</div><!-- /.row -->
    
    <div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="input-group">
				<!--to get action mode whether it is search, update or insert -->
                <input type="hidden" id="act_mode" value="" />
			</div>
		</div>
	</div>
    
	<div class="row">
    		<div class="col-sm-9 col-sm-offset-2">
			<form class="form-horizontal">
            </br>
                          
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Select Student</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="cmbStu">
                                <?php getstudent(); ?>
                            </select>
                        <div id="errstudent" class="error_div"></div>
                    </div>
                    <div class="col-sm-3" >  
                     <a type="button" target="_blank" class="btn btn-primary" id="btn_view" onclick="load_student()" ><span class="glyphicon glyphicon-plus"></span>View</a>
                    </div>
                </div> 
			</form>
		</div>
    </div>
	</br> 
   
    
    <div class="row">
    	<div class="col-sm-7 col-sm-offset-2">
        	<div class="panel panel-default">
                <div class="panel-heading">
                    <h4><a data-toggle="collapse" data-parent="#accordion">Basic Information </a></h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                        <label class="col-sm-3 control-label">Student ID</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtsid" style="border-style:none"></input>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" id="txtsfname" style="border-style:none"></input>
                        </div>
                   </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtslname" style="border-style:none"></input>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label">Name with Initials</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtsiname" style="border-style:none"></input>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label">Date of Birth</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtsdob" style="border-style:none"></input>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label">NIC</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtsnic" style="border-style:none"></input>
                        </div>
                  </div>
                </div>
                <div class="panel-heading">
                    <h4><a data-toggle="collapse" data-parent="#accordion">Contact Information </a></h4>
                </div>
                <div class="panel-body">
                     <div class="form-group">
                            <label class="col-sm-3 control-label" id="eid">Address</label>
                            <div class="col-sm-9">
                               <input type="text" class="form-control" id="txtsadd" style="border-style:none"></input>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="col-sm-3 control-label">City</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtscity" style="border-style:none"></input>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="col-sm-3 control-label">Land No</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtsland" style="border-style:none"></input>
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Mobile No</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtsmobile" style="border-style:none"></input>
                            </div>
                      </div>
                      <div class="form-group">
                            <label class="col-sm-3 control-label" id="eid">E-mail Address</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtsemail" style="border-style:none"></input>
                            </div>
                      </div>
                  </div>
                
                <div class="panel-heading">
                    <h4><a data-toggle="collapse" data-parent="#accordion">Course Information </a></h4>
                </div>
                <div class="panel-body">
                  <div class="col-sm-12">
                        <table class="table table-default table-bordered "  id="table-data">
                            <thead>
                                <tr>
                                    <th align="center">Enroll ID</th>
                                    <th align="center">Course ID</th>
                                    <th align="center">Course NAME</th>
                                    <th align="center">Batch ID</th>
                                 </tr>
                            </thead>
                            <tbody>
                            
            
                            </tbody>
                       </table>
                  </div>
                </div>
                
        	</div>
        </div>
    </div>
</div>

<?php require_once('../incl/footer.php'); ?>
</div><!-- /.page-content -->

<script type="text/javascript">
   /*this function is used to view student profile information*/ 
	$('#btn_view').click(function() {
        
        var act_mode = "load_stu_data";
        var cmbStu =  $("#cmbStu").val();
		//alert(cmbStu);

        $.post('../incl/stuprofile_handle.php', {
            'act_mode': act_mode,
            'cmbStu': cmbStu,
        },
		
        function(data) {
          
            if(data!=="")
            {
                $("#txtsid").val(data["stucode"]);
                $("#txtsfname").val(data["stufname"]);
                $("#txtslname").val(data["stulname"]);
                $("#txtsiname").val(data["stuinitialname"]);
                $("#txtsdob").val(data["studob"]);
                $("#txtsnic").val(data["stunic"]);
                $("#txtsadd").val(data["stuaddress"]);
				$("#txtscity").val(data["stucity"]);
                $("#txtsland").val(data["stuland"]);
                $("#txtsmobile").val(data["stumobile"]);
                $("#txtsemail").val(data["stuemail"]);
            }
        },"json" );
    
});

	function load_student() {
        var act_mode = "load_student";
        var cmbStu = $('#cmbStu').val();
		
        $.post('../incl/stuprofile_handle.php', {'act_mode':act_mode,'cmbStu':cmbStu},
            function (data) {
                if (data == "NA") {
                    row = '<tr><td colspan="4">No record found</td></tr>';
                    $("#table-data tbody").append(row);
                }
                else {
                    $("#table-data tbody").empty();

                    for (i = 0; i < data.length; i++) {
                        var enrollID   = data[i].enrollID;
						var couID = data[i].couID;
						var couname = data[i].couname;
						var batchID = data[i].batchID;
						
                        row = '<tr><td>' + enrollID + '</td><td>' + couID + '</td><td>' + couname + '</td><td>' + batchID + '</td></tr>';
                        $("#table-data tbody").append(row);
                    }
                }
            }, 'json'
        );
    }
</script>


