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
                <h4 class="page-title">Add Product</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Manage Product</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                    <h4 class="card-title">Product Form</h4>
                    <h5 class="card-subtitle">Fill up the details below</h5>
                    <?php
                            if (isset($_SESSION['add-product'])) {
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $_SESSION['add-product'];?>
                                </div>
                                <?php
                                unset($_SESSION['add-product']);
                            }
                            if (isset($_SESSION['upload-prod'])) {
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $_SESSION['upload-prod'];?>
                                </div>
                                <?php
                                unset($_SESSION['upload-prod']);
                            }
                            if (isset($_SESSION['error-add-product'])) {
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $_SESSION['error-add-product'];?>
                                </div>
                                <?php
                                unset($_SESSION['error-add-product']);
                            }
                    ?>
                    <form class="form-horizontal mt-4" action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" class="form-control" placeholder="Product Title" name="title">
                        </div>
                        <div class="form-group">
                                    <label>Description:</label>
                                    <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                                    <label>Price:</label>
                                    <input name="price" class="form-control col-md-2 col-sm-3" type="number" name="price">
                        </div>
                        <div class="form-group">
                                    <label>Select Image:</label>
                                    <input type="file" name="upload" class="form-control">
                        </div>
                        <div class="form-group">
                                    <label>Category:</label>
                                    <select class="form-control" name="category">
                                        <?php 
                                        
                                            $sql = "SELECT * FROM tbl_categories WHERE active='Yes'";
                                            $res = mysqli_query($conn, $sql);

                                            $count = mysqli_num_rows($res);

                                            if($count > 0){

                                                while($row=mysqli_fetch_assoc($res)){

                                                    $id = $row['id'];
                                                    $title = $row['title'];
                                                    ?>

                                                    <option value="<?php echo $id;?>"><?php echo $title;?></option>

                                                    <?php

                                                }


                                            } else {

                                                ?>
                                                <option value="0">Category not found</option>
                                                <?php
                                                

                                            }


                                        ?>
                                    </select> 
                        </div>
                        <div class="form-group row pt-3">
                            <label>Featured:</label>
                            <div class="col-sm-1">
                                <div class="form-check">
                                    <input type="radio"  name="featured" value="Yes" class="form-check-input">
                                    <label class="form-check-label mb-0" >Yes</label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-check">
                                    <input type="radio"  name="featured" value="No" class="form-check-input">
                                    <label class="form-check-label mb-0">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pt-3">
                            <label>Active:</label>
                            <div class="col-sm-1">
                                <div class="form-check">
                                    <input type="radio"  name="active" value="Yes" class="form-check-input">
                                    <label class="form-check-label mb-0" >Yes</label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-check">
                                    <input type="radio" name="active" value="No" class="form-check-input">
                                    <label class="form-check-label mb-0">No</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success text-white mdi mdi-account-plus" name="add-prod" value="Add Product">
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