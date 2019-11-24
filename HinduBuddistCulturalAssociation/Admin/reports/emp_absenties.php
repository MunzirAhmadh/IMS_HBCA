<?php
require_once("../incl/dbconnection.php");
$rootPath = "http://localhost/HinduBuddistCulturalAssosiation/";

$obj=new dbconnection();
$con=$obj->getcon();


$sql_att = "SELECT 
attendancestaff.attempID,
attendancestaff.empID,
attendancestaff.attempdate,
attendancestaff.attempstatus,
employee.empcode,
employee.empfname,
employee.emplname
FROM 
attendancestaff
INNER JOIN employee ON employee.empcode = attendancestaff.empID

WHERE attempdate ='".$_GET['attdate']."'";

$result_att = mysqli_query($con,$sql_att) or die ("SQL Error:".mysqli_error($con));
$attinfo = mysqli_fetch_assoc( $result_att );


$sql_date = "SELECT * FROM 
attendancestaff
WHERE attempdate ='".$_GET['attdate']."'";

$result_date = mysqli_query($con,$sql_date) or die ("SQL Error:".mysqli_error($con));
$attdate = mysqli_fetch_assoc( $result_date );

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
        	 <h3 align="center">
                 Absent Employees
              </h3>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-4">
                <p>Date</p>
            </div>
            <div class="col-sm-8">
                <p>: <?php echo $attdate["attempdate"]?></p>
            </div>
        </div>
        

    </div>
    <br/>
    <div class="row">
        <div class="col-sm-12">

            <table class="table table-default table-bordered "  id="table-data">
                <thead>
                <tr align="center">
                    <th align="center">No</th>
                    <th align="center">Emp ID</th>
                    <th align="center">Name</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $obj=new dbconnection();
                $con=$obj->getcon();
                //fetch table rows from mysql db
                $sql =  "SELECT 
							attendancestaff.attempID,
							attendancestaff.empID,
							attendancestaff.attempdate,
							attendancestaff.attempstatus,
							employee.empcode,
							employee.empfname,
							employee.emplname
							FROM 
							attendancestaff
							INNER JOIN employee ON attendancestaff.empID = employee.empcode 
							
							WHERE attempdate ='".$_GET['attdate']."' AND attempstatus=2";
					
				 $result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));
			
                $nor = $result->num_rows;
                $i = 1;
                if($nor > 0)
                {
					  $array = array();
                    while ( $setdata = mysqli_fetch_assoc( $result ) )
                    {
                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $setdata['empcode']?></td>
                            <td><?php echo $setdata['empfname']." ".$setdata['emplname'] ?></td>
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