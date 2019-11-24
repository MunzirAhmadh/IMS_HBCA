<?php
require_once("../incl/dbconnection.php");
$rootPath = "http://localhost/HinduBuddistCulturalAssosiation/";

$obj=new dbconnection();
$con=$obj->getcon();

$sql_enrinfo1 = "SELECT
student.stucode,
student.stuinitialname,
enrollment.enrollID,
enrollment.stuID,
enrollment.batchID,
batch.batchID,
course.couID,
course.couname
FROM
enrollment
INNER JOIN student ON student.stucode = enrollment.stuID
INNER JOIN batch ON batch.batchID =enrollment.batchID
INNER JOIN course ON course.couID = enrollment.couID

WHERE enrollment.enrollID ='".$_GET['enrollID']."'";

$result_enrinfo1 = mysqli_query($con,$sql_enrinfo1) or die ("SQL Error:".mysqli_error($con));
$enrinfo1 = mysqli_fetch_assoc( $result_enrinfo1 );


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Co
	<meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="<?php echo $rootPath ?>css/bootstrap.min.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 10pt "Arial";
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        p, li{
            font-size: 14px;
        }
        .page {
            width: 21cm;
            min-height: 29.7cm;
            padding: 1cm;
            margin: 1cm auto;
            padding-left: 1.5cm;
            padding-right: 1.5cm;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        table td{
            font-size: 12px !important;
            vertical-align: top;
        }

        .title{
            font-size: 6.0mm;
            font-weight: bold;
            letter-spacing: 3px;
            text-align: center;
            margin-bottom: 10px;
        }
        .address{
            text-align: center;
            font-size: 4mm;
            letter-spacing: 1px;
        }
        .tel{
            text-align: center;
            font-size: 3mm;
            letter-spacing: 1px;
        }
        #tblboxes tr{
            min-height: 50px !important;

        }
        #tblclass td th{
            border: 1px solid black;

        }
        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            .page {
                margin: 0;
                padding-left: 1.5cm;
                padding-right: 1.5cm;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

    </style>
    <script>
        window.print();
    </script>
    <title>HBCA</title>

</head>
<body>
<div class="page">

    <div class="row">
        <div class="col-sm-12" align ="center">
            <img width="600px" src="../../img/printlogo.png">
        </div>
    </div>
    <br>
    <br>
    <div class="row">
    	<div class="row">
        	 <h4 align="center">
                 Student Result Sheet
              </h4>
        </div>
        </br></br>
    	<div class="row">
            <div class="col-sm-4">
                <p>Enroll ID</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $enrinfo1["enrollID"]?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>Student ID</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $enrinfo1["stucode"]?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>Student Name</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $enrinfo1["stuinitialname"]?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>Course</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $enrinfo1["couname"]?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>Batch</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $enrinfo1["batchID"]?></p>
            </div>
        </div>
        

    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">

            <table class="table table-default table-bordered "  id="table-data">
                <thead>
                <tr align="center">
                    <th align="center" rowspan="2">No</th>
                    <th align="center" rowspan="2">Name</th>
                    <th align="center" colspan="2">Marks</th>
                    <th align="center" rowspan="2">Total Marks</th>
                    <th align="center" rowspan="2">Grade</th>
                </tr>
                <tr>
                    <th align="center">Written</th>
                    <th align="center">Oral</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $obj=new dbconnection();
                $con=$obj->getcon();
                $today_date = date('Y-m-d');
                //fetch table rows from mysql db
                $sql = "SELECT
                    student.stucode,
                    student.stuinitialname,
                    enrollment.enrollID,
                    results.batchID,
                    COUNT(resultID) AS res_count,
                    results.examtype,
                    SUM(CASE WHEN results.examtype = 'Written' THEN marks ELSE 0 END) AS Written,
                    SUM(CASE WHEN results.examtype = 'Oral' THEN marks ELSE 0 END) AS Oral
                    FROM
                    results
                    INNER JOIN enrollment ON results.enrollID = enrollment.enrollID
                    INNER JOIN student ON student.stucode = enrollment.stuID
					WHERE enrollment.enrollID='".$_GET['enrollID']."'";
                  
                $result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));
			
                $nor = $result->num_rows;
                $i = 1;
                if($nor > 0)
                {
                    $array = array();
                    while ( $setdata = mysqli_fetch_assoc( $result ) )
                    {
                        $tot = $setdata['Written'] + $setdata['Oral'];
                        $avr = $tot/$setdata['res_count'];
                        $total = round($avr);

                        if($total>=75){
                            $grade ="A";
                        }
                        if($total<=74 && $total>=50){
                            $grade ="B";
                        }
                        if($total<=49 && $total>=35){
                            $grade ="C";
                        }
                        if($total<35){
                            $grade ="F";
                        }

                        ?>
                        <tr>
                            <td align="right"><?php echo $i?></td>
                            <td><?php echo $setdata['stuinitialname'] ?></td>
                            <td align="center"><?php echo $setdata['Written'] ?></td>
                            <td align="center"><?php echo $setdata['Oral'] ?></td>
                            <td align="center"><?php echo $total ?></td>
                            <td align="center"><?php echo $grade ?></td>

                        </tr>
                        <?php
					$i++;
                    }
                    

                }
                else{
                    ?>
                    <tr><td colspan="5">No record found</td></tr>
                    <?php
                }


                ?>

                </tbody>
            </table>
        </div>
    </div>


    <div class="row">
        <div class="row">
            <br><br> <br><br>
            <div class="col-sm-4 text-center">
                <h4>.......................................</h4>
                <h4>Lecturer In charge</h4>
            </div>
            <div class="col-sm-4 text-center">
                <h4>.......................................</h4>
                <h4>Course Coordinator</h4>
            </div>
            <div class="col-sm-4 text-center">
                <h4>.......................................</h4>
                <h4>Managing Director</h4>
            </div>
        </div>

    </div>


   <hr/>
    <div class="row" style="position:absolute; top:260mm;">
        <div class="row">

            <div class="col-sm-12 text-center" style="text-align: center!important;">

                <p ><b>Report Generated on <?php echo date('Y-m-d')?> at <?php echo date('H:i:s')?></b></p>
            </div>
        </div>

    </div>

</div>
</body>
</html>