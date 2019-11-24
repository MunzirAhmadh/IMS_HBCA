<?php
require_once("../incl/dbconnection.php");
$rootPath = "http://localhost/HinduBuddistCulturalAssosiation/";

$obj=new dbconnection();
$con=$obj->getcon();

$sql_stdinfo = "SELECT
student.stuinitialname,
student.stucode,
enrollment.enrollID
FROM
student
INNER JOIN enrollment ON student.stucode = enrollment.stuID

WHERE enrollment.enrollID ='".$_GET['enrollID']."'";

$result_stdinfo = mysqli_query($con,$sql_stdinfo) or die ("SQL Error:".mysqli_error($con));
$stdinfo = mysqli_fetch_assoc( $result_stdinfo );

$sql_enrinfo = "SELECT
enrollment.enrollID,
course.couname,
course.couduration,
enrollment.regdate,
results.enrollID,
results.examdate
FROM
enrollment
INNER JOIN course ON course.couID = enrollment.couID
INNER JOIN results ON results.enrollID = enrollment.enrollID

WHERE enrollment.enrollID ='".$_GET['enrollID']."'";
//WHERE enrollID='KY/BCE/00001'";

$result_enrinfo = mysqli_query($con,$sql_enrinfo ) or die ("SQL Error:".mysqli_error($con));
$enrinfo = mysqli_fetch_assoc( $result_enrinfo );

$sql_markinfo = "SELECT
enrollID, IFNULL(SUM(marks),0)  AS sum_mark, COUNT(resultID) AS res_count
FROM
results

WHERE results.enrollID ='".$_GET['enrollID']."'";

$result_markinfo = mysqli_query($con,$sql_markinfo) or die ("SQL Error:".mysqli_error($con));
$markinfo = mysqli_fetch_assoc( $result_markinfo );
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

    <div class="row">
        <div class="col-sm-12 text-center">
            <h3><u>PROGRAM TRANSCRIPT</u></h3>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <h4>STUDENT INFORMATION</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>Name in Full</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $stdinfo["stuinitialname"]?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>Registration No</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $stdinfo["enrollID"]?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <h4>OVERALL PERFORMANCE</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>Marks</p>
            </div>
            <div class="col-sm-8">
                <p>:
                    <?php
                        $mark = ($markinfo["sum_mark"] / $markinfo["res_count"]);
                        echo round($mark,2);
                    ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>Grade</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php
                    $mark = ($markinfo["sum_mark"] / $markinfo["res_count"]);
                    $marks = round($mark,2);
                    if($marks>=75){
                        $grade ="A";
                    }
                    if($marks<=74 && $marks>=50){
                        $grade ="B";
                    }
                    if($marks<=49 && $marks>=35){
                        $grade ="C";
                    }
                    if($marks<35){
                        $grade ="F";
                    }
                    echo $grade
                    ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <div class="col-sm-12">
                <h4>COURSE INFORMATION</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>Course Title</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $enrinfo["couname"]?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>Duration</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $enrinfo["couduration"]." months"?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>Start Date</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $enrinfo["regdate"]?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p>End Date</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $enrinfo["examdate"]?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <br><br>
            <div class="col-sm-12">
                <h4>.............................</h4>
                <h4>Course Coordinator</h4>
            </div>
        </div>

    </div>



    <div class="row" style="position:absolute; top:240mm;">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h4 style="font-size:14px;">Good Pass (A)  = 75-100, Pass (B) = 50-74, Simple Pass (C) = 35-49, Weak (F) = less than 35</h4>

                <img style="margin-left: 30px;" width="650px" src="../../img/printfooter.png">
            </div>
        </div>

    </div>


</div>
</body>
</html>