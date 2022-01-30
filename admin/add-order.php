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
                <h4 class="page-title">Add Order</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Manage Orders</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Order</li>
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
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <h4 class="card-title">Order Form</h4>
                    <h5 class="card-subtitle">Fill up the details below</h5>
                    <?php
                    if (isset($_SESSION['add-product'])) {
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['add-product']; ?>
                        </div>
                    <?php
                        unset($_SESSION['add-product']);
                    }
                    if (isset($_SESSION['upload-prod'])) {
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['upload-prod']; ?>
                        </div>
                    <?php
                        unset($_SESSION['upload-prod']);
                    }
                    if (isset($_SESSION['error-add-product'])) {
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error-add-product']; ?>
                        </div>
                    <?php
                        unset($_SESSION['error-add-product']);
                    }
                    ?>
                    <form class="form-horizontal mt-4" action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label>Select Product:</label>
                            <select class="form-control" name="product">
                                <?php

                                $sql2 = "SELECT * FROM tbl_categories";
                                $res2 = mysqli_query($conn, $sql2);
                                $count2 = mysqli_num_rows($res2);

                                if ($count2 > 0) {

                                    while ($row2 = mysqli_fetch_assoc($res2)) {
                                        $c_id = $row2['id'];
                                        $c_title = $row2['title'];

                                ?>
                                        <optgroup label="<?php echo $c_title; ?>">
                                            <?php

                                            $sql = "SELECT * FROM tbl_food WHERE category_id=$c_id";
                                            $res = mysqli_query($conn, $sql);

                                            $count = mysqli_num_rows($res);

                                            if ($count > 0) {

                                                while ($row = mysqli_fetch_assoc($res)) {

                                                    $id = $row['id'];
                                                    $title = $row['title'];
                                                    $product_image = $row['image_name'];
                                                    $price = $row['price'];

                                            ?>

                                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                                <?php

                                                }
                                            } else {

                                                ?>
                                                <option value="0">Category not found</option>
                                            <?php


                                            }


                                            ?>
                                        </optgroup>
                                <?php
                                    }
                                } else {
                                    echo "NO CATEGORY FOUND";
                                }



                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Size:</label>
                            <select name="size" id="size" class="form-control">
                                <option value="small">Short</option>
                                <option value="medium">Tall</option>
                                <option value="large">Grande</option>
                                <option value="extra-large">Venti</option>
                            </select>
                        <div class="form-group">
                            <label>Quantity:</label>
                            <input class="form-control col-md-2 col-sm-3" type="number" name="qty">
                        </div>
                        <div class="form-group">
                            <label>Fullname:</label>
                            <input type="text" class="form-control col-md-5 col-sm-6" placeholder="" name="fullname">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control col-md-5 col-sm-6" placeholder="" name="email">
                        </div>
                        <div class="form-group">
                            <label>Phone:</label>
                            <input type="number" class="form-control col-md-5 col-sm-6" placeholder="" name="phone">
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <textarea name="address" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group row pt-3">
                            <label>Payment:</label>
                            <div class="row-md-2">
                                <div class="form-check">
                                    <input type="radio" name="payment" value="cod" class="form-check-input">
                                    <label class="form-check-label mb-0">Cash on Delivery</label>
                                </div>
                            </div>
                            <div class="row-md-2">
                                <div class="form-check">
                                    <input type="radio" name="payment" value="bank" class="form-check-input">
                                    <label class="form-check-label mb-0">Bank Transfer</label>
                                </div>
                            </div>
                            <div class="row-md-2">
                                <div class="form-check">
                                    <input type="radio" name="payment" value="gcash" class="form-check-input">
                                    <label class="form-check-label mb-0">Gcash</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="price" value="<?php echo $price ?>">
                            <input type="hidden" name="image" value="<?php echo $product_image ?>">
                            <input type="submit" class="btn btn-success text-white mdi mdi-account-plus" name="add-order" value="Add Order">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        ?>
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

    <?php
    include('../admin/static/footer.php');
    ?>