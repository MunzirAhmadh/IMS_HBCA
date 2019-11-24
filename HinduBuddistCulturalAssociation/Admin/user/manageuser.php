<?php 
//Get the header and sidebar
require_once('../incl/header.php');
require_once('../incl/sidebar.php');
?>

<div class="page-content"> 
	<div class="row">
		<div class="page-header">
              <h1>
               	&nbsp; &nbsp; Manage users
              </h1>
        </div><!-- /.page-header -->
	</div><!-- /.row -->

	<div class="row">
        <div class="col-lg-4 pull-right">
            <div class="input-group">
                <!--to get action mode whether it is search, update or insert -->
                <input type="hidden" id="act_mode" />
                <!-- this uid is used for update the record -->
                <input type="hidden" id="u_id" />
                <!-- old email keep to update relavent change in user table-->
                <input type="hidden" id="old_username" />
               
                <input type="text" class="form-control" id="search_by" placeholder="User Name">
                <span class="input-group-btn">
                 <button class="btn btn-primary" style="height:35px"  id="btn_search" type="button">Search</button>
                </span>
            </div> 
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<span style="color:#f00; font-size:11px" class="pull-center"><b>All fields marked with * are required fields</b></span>
			</br></br>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="txtusername" class="col-sm-3 control-label">User Name<span style="color:#f00">*</span></label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" id="txtusername" placeholder="User Name">
                        <div id="erruname" class="error_div"></div>
                     </div>
                </div>
                
                <div class="form-group">
                    <label for="txtusertype" class="col-sm-3 control-label">User Type<span style="color:#f00">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control" id="cmbusertype">
                         		<option value="">-- Select User Type --</option>
                                <option value="1">Administrator</option>
                                <option value="2">Lecturer</option>
                                <option value="3">Branch Manager/ Receptionist</option>
                        </select>
                        <div id="errcmbuserType" class="error_div"></div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="txtpassword" class="col-sm-3 control-label"> Password<span style="color:#f00">*</span></label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="txtpassword" placeholder="Password">
                         <div id="errpassword" class="error_div"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtrepassword" class="col-sm-3 control-label"> Re-enter Password<span style="color:#f00">*</span></label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="txtrepassword" placeholder="Re-enter Password">
                          <div id="errRepassword" class="error_div"></div>
                    </div>
                </div>

               <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Status<span style="color:#f00">*</span></label>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                            	 <input type="radio"  value="1" name="rdbstatus" id="rdbactive">Active
                            </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        	<label class="radio-inline">
                            	<input type="radio" value="0" name="rdbstatus" id="rdbdeactive">Deactive
                       		 </label>
                            <div id="errrdbstatus" class="error_div"></div>
                        </div>  
                </div>
                
              <div class="row">
                <div class="col-sm-10">
                    <div class="buttons pull-right">
                        <button type="button" class="btn btn-primary" id="btn_save"><span class="glyphicon glyphicon-plus"></span> Submit</button>
                        <button type="reset" class="btn btn-danger btn-sm" id="btn_clear" onclick="clear_form()" style="padding:8px"><span class="glyphicon glyphicon-floppy-remove"></span> Reset </button>
                    </div>
                </div>
              </div>

            </form>
        </div>
</div>

<?php require_once('../incl/footer.php'); ?>

</div><!-- /.page-content -->

<script type="text/javascript">
    $(document).ready(function() {
        $("#act_mode").val('add');
        clear_form();
    });
    /*this function is used for clear form*/
    function clear_form() {
        $(".form-control").val('');
		$('#rdbactive').attr("checked",true);
        $(".error_div").text('');
        $(".error_div").hide();
    }

    /*this function is used for serach existing user information*/
    $('#btn_search').click(function() {
        var search_by = $("#search_by").val();
        var act_mode = "search_user";
        if (search_by == "") {
            alert("Please fill the user name");
        } else {
            $.post('../incl/user_handle.php', {
                    'act_mode': act_mode,
                    'search_by': search_by
                },
                function(data) {
                    if (data != "") {
                        var act_mode = "update_user";
                        var u_id = data["uID"];
                        var txtusername = data["uname"];
                        var cmbusertype = data["utype"];
                        var txtpassword = data["upwd"];
                        var rdbstatus = data["ustatus"];
                       
                        $("#act_mode").val(act_mode);
                        $("#u_id").val(u_id);
                        $("#txtusername").val(txtusername);
                        $("#cmbusertype").val(cmbusertype);
                        $("#txtpassword").val(txtpassword);
                        $("#rdbstatus").val(rdbstatus);
							if(rdbstatus==1){
								$('#rdbactive').attr("checked",true);
							}
							else{
								$('#rdbdeactive').attr("checked",true);
							}
                        $("#old_username").val(old_username);
                     
                    } else {
                        alert ("No record found");
                    }
                }, "json");
        }
    });

    /*this function is used for save and update user information*/
    $('#btn_save').click(function() {
        $(".error_div").text('');
        $(".error_div").hide();
        var act_mode = $("#act_mode").val();
       	var u_id = $("#u_id").val();
        var txtusername = $("#txtusername").val();
        var cmbusertype = $("#cmbusertype").val();
        var txtpassword = $("#txtpassword").val();
        var txtrepassword = $("#txtrepassword").val(); 
        var status="";
			if($("#rdbactive").is(':checked')){
				status=1;
			}
			else{
				status=0;
			}
		var rdbstatus = status;
       // alert(rdbstatus);
	   
		var err = 0;
		
		// Validation for the fields
		var emailrule = /^[a-zA-Z\d\.\_]+\@[a-zA-Z\d\-]+\.[a-zA-Z]{2,4}$/;

		if (txtusername == "") {
            $("#erruname").text('Please fill user name');
            err++;
        }
        if (txtusername != "") {
            if (!txtusername.match(emailrule)) {
                $("#erruname").text("Invalid email address");
                err++;
            }
        }
         if (cmbusertype == "") {
            $("#errcmbuserType").text('Please select user type');
            err++;
        }
		if (txtpassword == "") {
			$("#errpassword").text('Password can not leave empty');
			err++;
		}
		else {
			if (txtrepassword == "" || txtrepassword != txtpassword ) {
			$("#errRepassword").text('Password verification failed');
			err++;
			}
		}
		 if (rdbstatus == null) {
			$("#errrdbstatus").text('Please select status');
			err++;
		}
        if (err > 0) {
            $(".error_div").show();
        } else {

            $.post('../incl/user_handle.php', {
                    'act_mode': act_mode,
                    'u_id': u_id,
                    'txtusername': txtusername,
                    'cmbusertype': cmbusertype,
                    'txtpassword': txtpassword,
                    'rdbstatus': rdbstatus,    
                },
                function(data) {
					if (data == "1") {
                        alert("New employee added successfuly","success");
                        clear_form();
						} 
					else if (data == "2") {
                         alert("Employee updated successfuly","success");
                        clear_form();
						}
                   else if (data == "3") {
                         alert("Unknown Employee ","error");
                        clear_form();
						}
                    else if (data == "user_alr") {
                        alert("This user already exists","warning");
                        $("#erruname").text("This user already exists");
                        $("#erruname").show();
                        $("#txtusername").focus();
						} 
					else {
                         alert();
                    }
                }, "json");
        }
    });

</script>

