
<?php
session_start();
require_once("../incl/dbconnection.php");
$rootPath = "http://localhost/HinduBuddistCulturalAssosiation/";
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
            min-height: 15cm;
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
 
    </br></br>
    <div class="row">
        <div class="col-sm-12">

            <table class="table table-default table-bordered "  id="table-data">
                  <tr>
                    <th colspan="4"><div align="center">
                      <p align="center"><strong><u>PAYMENT RECEIPT</u></strong></p>
                    </div></th>
                  </tr>
                   <tr>
                    <th><div align="left">Invoice No</div></th>
                    <td> <?php echo($_SESSION['student']['invoice'])?></td>
                    <th><div align="left">Date</div></th>
                    <td> <?php echo date('Y-m-d')?></td>
                  </tr>
                  <tr>
                    <th colspan="2">&nbsp;</th>
                    <th><div align="left">Time</div></th>
                    <td> <?php echo date('H:i:s')?></td>
                  </tr>
                  <tr>
                    <th><div align="left">Student Name</div></th>
                    <td colspan="3"><?php echo($_SESSION['student']['sname'])?>
                  </tr>
                  <tr>
                    <th><div align="left">Enroll ID</div></th>
                    <td colspan="3"><?php echo($_SESSION['student']['eid'])?></td>
                  </tr>
                   <tr>
                    <th><div align="left"><strong>Paid Amount</strong></div></th>
                    <td colspan="3">Rupees  . <?php echo($_SESSION['student']['payamount'])?>.00</td>
                  </tr>
                 
                  <tr>
                    <th><div align="left"><strong>Received a sum of</strong></div></th>
                    <td colspan="3"><?php echo($_SESSION['student']['amountletter'])?></td>
                  </tr>
                  <tr>
                    <th colspan="2">&nbsp;</th>
                    <th colspan="2"><div align="right">Payments are not refundable</div></th>
                  </tr>
                  <tr>
                    <th colspan="4"><div align="center">
                      <p align="center">Thank you for payment</p>
                    </div></th>
                  </tr>
                  <tr>
                    <th colspan="4"><div align="center">
                      <p align="center">This is a computer generated printout and no  signature is required</p>
                    </div></th>
                  </tr>  
          </table>
        </div>
    </div>
    <div class="row" style="position:absolute; top:150mm;">
        <div class="row">

            <div class="col-sm-12 text-center" style="text-align: center!important;">

                <p><b>Receipt Generated on <?php echo date('Y-m-d')?> at <?php echo date('H:i:s')?></b></p>
            </div>
        </div>

    </div>

  <hr/>
</div>
<?php unset($_SESSION["student"]);?>
</body>
</html>