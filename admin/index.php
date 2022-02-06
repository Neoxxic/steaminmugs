<?php
include('../admin/static/header.php');
?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <?php

    $sql_sum_order = "SELECT SUM(total) AS value_sum
                            FROM tbl_order
                            WHERE status='order-complete'";
    $res = mysqli_query($conn, $sql_sum_order);
    $row = mysqli_fetch_assoc($res);

    $sum = $row['value_sum'];

    $sql_num_order = "SELECT * FROM tbl_order WHERE status='order-complete'";
    $res2 = mysqli_query($conn, $sql_num_order);
    $count = mysqli_num_rows($res2);


    ?>


    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sales Ratio</h4>
                        <div class="sales ct-charts mt-3"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-1">Sales</h5>
                        <h3 class="font-light">P<?php echo $sum; ?></h3>
                        <div class="mt-3 text-center">
                            <div id="earnings"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Total Orders</h4>
                        <h2 class="font-light"><?php echo $count; ?> <span class="font-16 text-success font-medium"></span>
                        </h2>
                        <div class="mt-4">
                            <div class="row text-center">
                                <div class="col-6 border-right">
                                    <h4 class="mb-0">58%</h4>
                                    <span class="font-14 text-muted">Delivered</span>
                                </div>
                                <div class="col-6">
                                    <h4 class="mb-0">42%</h4>
                                    <span class="font-14 text-muted">Undelivered</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Latest Sales</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="border-top-0">NAME</th>
                                    <th class="border-top-0">STATUS</th>
                                    <th class="border-top-0">DATE</th>
                                    <th class="border-top-0">PRICE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_sales = "SELECT * FROM tbl_order";
                                $res3 = mysqli_query($conn, $sql_sales);
                                $count = mysqli_num_rows($res3);

                                if ($count > 0) {

                                    while ($row2 = mysqli_fetch_assoc($res3)) {

                                        $order_id = $row2['id'];
                                        $product = $row2['food'];
                                        $total = $row2['total'];
                                        $fullname = $row2['customer_name'];
                                        $date = $row2['order_date'];
                                        $qty = $row2['qty'];
                                        $status = $row2['status'];

                                        if ($status == "order-complete") {
                                ?>
                                            <tr>

                                                <td class="txt-oflo"><?php echo $fullname; ?></td>
                                                <td><span class="label label-success label-rounded"><?php if ($status == "Add-to-cart") {
                                                                                                        echo "Added to Cart";
                                                                                                    } elseif ($status == "order-complete") {
                                                                                                        echo "SALES";
                                                                                                    } ?></span> </td>
                                                <td class="txt-oflo"><?php echo $date; ?></td>
                                                <td><span class="font-medium">P<?php echo $total; ?></span></td>
                                            </tr>

                                <?php
                                        }
                                    }
                                } else {
                                    echo "NO SALES";
                                }

                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Temp Guide</h4>
                        <div class="d-flex align-items-center flex-row mt-4">
                            <div class="display-5 text-info"><i class="wi wi-day-showers"></i>
                                <span>73<sup>°</sup></span>
                            </div>
                            <div class="ms-2">
                                <h3 class="mb-0">Saturday</h3><small>Ahmedabad, India</small>
                            </div>
                        </div>
                        <table class="table no-border mini-table mt-3">
                            <tbody>
                                <tr>
                                    <td class="text-muted">Wind</td>
                                    <td class="font-medium">ESE 17 mph</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Humidity</td>
                                    <td class="font-medium">83%</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Pressure</td>
                                    <td class="font-medium">28.56 in</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Cloud Cover</td>
                                    <td class="font-medium">78%</td>
                                </tr>
                            </tbody>
                        </table>
                        <ul class="row list-style-none text-center mt-4">
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                                <span class="d-block text-muted">09:30</span>
                                <h3 class="mt-1">70<sup>°</sup></h3>
                            </li>
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-cloudy"></i></h4>
                                <span class="d-block text-muted">11:30</span>
                                <h3 class="mt-1">72<sup>°</sup></h3>
                            </li>
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-hail"></i></h4>
                                <span class="d-block text-muted">13:30</span>
                                <h3 class="mt-1">75<sup>°</sup></h3>
                            </li>
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-sprinkle"></i></h4>
                                <span class="d-block text-muted">15:30</span>
                                <h3 class="mt-1">76<sup>°</sup></h3>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <?php
    include('../admin/static/footer.php');
    ?>