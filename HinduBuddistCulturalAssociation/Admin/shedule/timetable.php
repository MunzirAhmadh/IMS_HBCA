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
                Time Table
            </h1>
        </div><!-- /.page-header -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12 col-lg-offset-0">


                <div class="row-fluid">
                    <div class="col-sm-12 well">
                        <form class="form-inline">

                        <div class="form-group col-sm-4 col-sm-offset-1">
                            <label class="control-label">Lecturer</label>
                            <select class="form-control" id="cmbLec">
                                <?php getlecturer(); ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label class="control-label">Batch</label>
                            <select class="form-control" id="cmbBatch">
                                <?php getbatch(); ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-1">
                            <label class="checkbox-inline"><input type="checkbox" value="" id="chkAll">ALL</label>
                        </div>
                        <div class="form-group col-sm-2">
                            <button type="button" class="btn btn-primary" onclick="load_data()"> Load</button>
                        </div>
                        </form>
                    </div>
                </div>


        </div>
    </div>

    <div class="row">
        <div class="col-sm-9 col-sm-offset-1 " id="divCal">

        </div>

    </div>
</div>


<script>
    $(document).ready(function() {
        $('#chkAll').prop('checked', true);
        load_data();
    });

    function load_data(){
        var batch = $('#cmbBatch').val();
        var lec = $('#cmbLec').val();
        var chkstatus = "No";
        if($('#chkAll').is(':checked')){
            chkstatus = "ALL";
        }
        $.post('../incl/shedule_handle.php', {'act_mode':'load_data','batch':batch,'lec':lec,'chkstatus':chkstatus},
            function (data) {
                if (data == "NA") {

                }
                else {

                    $("#divCal").empty();
                    $("#divCal").append('<div id="eventCalendarLocale"></div>');
                    $("#eventCalendarLocale").eventCalendar({
                        jsonData: data,
                        cacheJson: false,
                        jsonDateFormat: 'human'
                    });

                }
            }, 'json'
        );
    }



  /*  function view_eventinfo(evt_id){

        $.post('', {'evt_id':evt_id},
            function (data) {
                if (data != null) {
                    var evt_name      = data["evt_name"];
                    var evt_id        = data["evt_id"];
                    var evt_type      = data["evt_type"];
                    var evet_date     = data["evt_date"];
                    var evt_venue     = data["evt_venue"];
                    var evt_timefrom  = data["evt_timefrom"];
                    var evt_timeto    = data["evt_timeto"];
                    var evt_incharge  = data["PER_NAME"];
                    var evt_status    = data["evt_status"];
                    var evt_desc      = data["evt_desc"];
                    var sec_name      = data["sec_name"];
                    var evt_frequ     = data["evt_type_frequency"];


                    if(evt_status =="C"){
                        status ="Cancel";
                    }
                    if(evt_status =="P"){
                        status ="Postpone";
                    }
                    if(evt_status =="F"){
                        status ="Fixed";
                    }

                    $("#evt_name").text(evt_name);
                    $("#evt_type").text(evt_type);
                    $("#evet_date").text(evet_date);
                    $("#evt_venue").text(evt_venue);
                    $("#evt_timefrom").text(evt_timefrom);
                    $("#evt_timeto").text(evt_timeto);
                    $("#evt_incharge").text(evt_incharge);
                    $("#evt_status").text(status);
                    $("#evt_desc").text(evt_desc);
                    $("#sec_name").text(sec_name);
                    $("#evt_frqu").text(evt_frequ);
                }
                $('#event_info').modal('toggle');
            }, 'json'
        );
    }*/
</script>
<?php require_once('../incl/footer.php'); ?>