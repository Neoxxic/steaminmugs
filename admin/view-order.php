<?php
include('static/header.php');
?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<?php

$order_id = $_GET['order_id'];

?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Order <?php echo $order_id; ?></h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage orders</li>
                            <li class="breadcrumb-item active" aria-current="page">Order</li>
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
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3">
                <div class="card">
                    <div class="card-body">
                        <?php

                        $sql = "SELECT * FROM tbl_order WHERE id=$order_id";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count == 1) {

                            while ($row = mysqli_fetch_assoc($res)) {

                                $order_food = $row['food'];
                                $order_image = $row['food_img'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $fullname = $row['customer_name'];
                                $phone = $row['customer_contact'];
                                $email = $row['customer_email'];
                                $address = $row['customer_address'];
                                $payment = $row['payment_method'];
                            }
                        } else {
                            echo "<div class='error'>Order not found</div>";
                        }


                        ?>
                        <center <?php
                                if ($order_image != "") {

                                ?> class="mt-4"> <img src="<?php echo $siteurl; ?>admin/upload/product/<?php echo $order_image; ?>" width="150" />
                        <?php



                                } else {

                                    echo "<div class='error'>Image not Added</div>";
                                }
                        ?>
                        <h4 class="card-title mt-2"><?php echo $order_food; ?></h4>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class=""></i>
                                    <font class="font-medium">Quantity: <?php echo $qty; ?></font>
                                </a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class=""></i>
                                    <font class="font-medium">Total: <?php echo $total; ?></font>
                                </a></div>
                        </div>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6><?php echo $email; ?></h6> <small class="text-muted pt-4 db">Fullname</small>
                        <h6><?php echo $fullname; ?></h6> <small class="text-muted pt-4 db">Phone</small>
                        <h6><?php echo $phone; ?></h6> <small class="text-muted pt-4 db">Address</small>
                        <h6><?php echo $address; ?></h6> <small class="text-muted pt-4 db">Date & time</small>
                        <h6><?php echo $order_date; ?></h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" class="form-horizontal form-material mx-2">
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input name="fullname" type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input name="email" type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input name="phone" type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <textarea name="address" rows="5" class="form-control form-control-line"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="hidden" name="id" value="<?php echo $order_id; ?>">
                                    <input name="update-order" type="submit" class="btn btn-success text-white" value="Update Order">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <?php
    include('static/footer.php');
    ?>