<?php
require_once('../incl/header.php');
require_once('../incl/sidebar.php');
require_once('../incl/dbconnection.php');

?>
<?php
$obj=new dbconnection();
$con=$obj->getcon();
$sql_denr = "SELECT COUNT(enrollment.enrollID) AS enr_count
FROM
enrollment
WHERE  enrollment.regdate = CURDATE()";

$result_denr = mysqli_query($con,$sql_denr) or die ("SQL Error:".mysqli_error($con));
$row_denr = mysqli_fetch_assoc( $result_denr );

 $sql_wenr = "SELECT COUNT(enrollment.enrollID) AS enr_count
FROM
enrollment
WHERE WEEK(enrollment.regdate) = WEEK(NOW()) AND YEAR(enrollment.regdate) = YEAR(NOW())";

$result_wenr = mysqli_query($con,$sql_wenr) or die ("SQL Error:".mysqli_error($con));
$row_wenr = mysqli_fetch_assoc( $result_wenr );

$sql_menr = "SELECT COUNT(enrollment.enrollID) AS enr_count
FROM
enrollment
WHERE MONTH(enrollment.regdate) = MONTH(NOW()) AND YEAR(enrollment.regdate) = YEAR(NOW())";

$result_menr = mysqli_query($con,$sql_menr) or die ("SQL Error:".mysqli_error($con));
$row_menr = mysqli_fetch_assoc( $result_menr );

$sql_yenr = "SELECT COUNT(enrollment.enrollID) AS enr_count
FROM
enrollment
WHERE  YEAR(enrollment.regdate) = YEAR(NOW())";

$result_yenr = mysqli_query($con,$sql_yenr) or die ("SQL Error:".mysqli_error($con));
$row_yenr = mysqli_fetch_assoc( $result_yenr );


$sql_dinc = "SELECT SUM(payments.payamount) AS pay_amount
FROM
payments
WHERE  payments.paydate = CURDATE()";

$result_dinc = mysqli_query($con,$sql_dinc) or die ("SQL Error:".mysqli_error($con));
$row_dinc = mysqli_fetch_assoc( $result_dinc );

$sql_winc = "SELECT SUM(payments.payamount) AS pay_amount
FROM
payments
WHERE WEEK(payments.paydate) = WEEK(NOW()) AND YEAR(payments.paydate) = YEAR(NOW())";

$result_winc = mysqli_query($con,$sql_winc) or die ("SQL Error:".mysqli_error($con));
$row_winc = mysqli_fetch_assoc( $result_winc );

$sql_minc = "SELECT SUM(payments.payamount) AS pay_amount
FROM
payments
WHERE MONTH(payments.paydate) = MONTH(NOW()) AND YEAR(payments.paydate) = YEAR(NOW())";

$result_minc = mysqli_query($con,$sql_minc) or die ("SQL Error:".mysqli_error($con));
$row_minc = mysqli_fetch_assoc( $result_minc );

$sql_yinc = "SELECT SUM(payments.payamount) AS pay_amount
FROM
payments
WHERE  YEAR(payments.paydate) = YEAR(NOW())";

$result_yinc = mysqli_query($con,$sql_yinc) or die ("SQL Error:".mysqli_error($con));
$row_yinc = mysqli_fetch_assoc( $result_yinc );
?>
<div class="page-content">


    <div class="row">
        <div class="page-header">
            <h1>
                Dashboard
            </h1>
        </div><!-- /.page-header -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-sm-6 infobox-container">
            <div class="infobox infobox-green">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-users"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo $row_denr["enr_count"] ?></span>
                    <div class="infobox-content">Today Enrollments</div>
                </div>
            </div>

            <div class="infobox infobox-blue">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-users"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo $row_wenr["enr_count"] ?></span>
                    <div class="infobox-content">Week Enrollments</div>
                </div>

            </div>
            <div class="infobox infobox-red">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-users"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo $row_menr["enr_count"] ?></span>
                    <div class="infobox-content">Month Enrollments</div>
                </div>

            </div>
            <div class="infobox infobox-green2">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-users"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo $row_yenr["enr_count"] ?></span>
                    <div class="infobox-content">Year Enrollments</div>
                </div>

            </div>
        </div>

        <div class="col-sm-6 infobox-container">
            <div class="infobox infobox-green">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-money "></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo $row_dinc["pay_amount"] ?></span>
                    <div class="infobox-content">Today Income</div>
                </div>
            </div>

            <div class="infobox infobox-blue">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-money "></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo $row_winc["pay_amount"] ?></span>
                    <div class="infobox-content">Week Income</div>
                </div>

            </div>
            <div class="infobox infobox-red">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-money "></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo $row_minc["pay_amount"] ?></span>
                    <div class="infobox-content">Month Income</div>
                </div>

            </div>
            <div class="infobox infobox-green2">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-money "></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?php echo $row_yinc["pay_amount"] ?></span>
                    <div class="infobox-content">Year Income</div>
                </div>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12">
            <div id="graph"></div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-6">
            <h4 class="text-center">Monthly course wise income</h4>
            <div id="graph1"></div>
        </div>

        <div class="col-sm-6">
            <h4 class="text-center">Yearly course wise income</h4>
            <div id="graph2"></div>
        </div>
    </div>

</div><!-- /.page-content -->
<?php
$obj=new dbconnection();
$con=$obj->getcon();
//fetch table rows from mysql db
$sql = "SELECT COUNT(enrollment.enrollID) AS enr_count, course.couID
FROM
course
INNER JOIN enrollment ON enrollment.couID = course.couID
WHERE  YEAR(enrollment.regdate) = YEAR(NOW())
GROUP BY course.couname";
$result = mysqli_query($con,$sql) or die ("SQL Error:".mysqli_error($con));

$nor = $result->num_rows;

if($nor > 0)
{
    $array = array();
    while ( $row = mysqli_fetch_assoc( $result ) )
    {
        array_push(
            $array,
            array(
                'x' => $row['couID'],
                'y' => $row['enr_count']

            )
        );
    }

}



$sql_month = "SELECT SUM(payments.payamount) AS pay_amount, course.couname
FROM
course
INNER JOIN enrollment ON enrollment.couID = course.couID
INNER JOIN payments ON payments.enrollID = enrollment.enrollID
WHERE MONTH(payments.paydate) = MONTH(NOW()) AND YEAR(payments.paydate) = YEAR(NOW())
GROUP BY course.couname";
$result_month = mysqli_query($con,$sql_month) or die ("SQL Error:".mysqli_error($con));

$nor_month = $result_month->num_rows;

if($nor_month > 0)
{
    $json_data=array();
    while ( $row = mysqli_fetch_assoc( $result_month ) )
    {
        $json_array['label']=$row['couname'];
        $json_array['value']=$row['pay_amount'];
        array_push($json_data,$json_array);

    }

}

$sql_year = "SELECT SUM(payments.payamount) AS pay_amount, course.couname
FROM
course
INNER JOIN enrollment ON enrollment.couID = course.couID
INNER JOIN payments ON payments.enrollID = enrollment.enrollID
WHERE YEAR(payments.paydate) = YEAR(NOW())
GROUP BY course.couname";
$result_year= mysqli_query($con,$sql_year) or die ("SQL Error:".mysqli_error($con));

$nor_year = $result_year->num_rows;

if($nor_year > 0)
{
    $json_data_year=array();
    while ( $row = mysqli_fetch_assoc( $result_year ) )
    {
        $json_array['label']=$row['couname'];
        $json_array['value']=$row['pay_amount'];
        array_push($json_data_year,$json_array);

    }

}


?>
<script type="text/javascript">
    Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'graph',
        // Chart data records -- each entry in this array corresponds to a point on the chart.
        data: <?php echo json_encode($array);?>,
        // The name of the data record attribute that contains x-values.
        xkey: 'x',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['y'],
        // Labels for the ykeys -- will be displayed when you hover over the chart.
        labels: ['credit limit','INCOME','INCOME2','SALARY']
    });
    /**/
    Morris.Donut({
        element: 'graph1',
        data: <?php echo json_encode($json_data)?>
    });

    Morris.Donut({
        element: 'graph2',
        data: <?php echo json_encode($json_data_year)?>
    });
</script>
<?php require_once('../incl/footer.php'); ?>






