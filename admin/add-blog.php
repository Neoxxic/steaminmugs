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
                <h4 class="page-title">Add Blog</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Manage Blogs</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
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
                    <h4 class="card-title">Blog Form</h4>
                    <h5 class="card-subtitle">Fill up the details below</h5>
                    <?php
                    if (isset($_SESSION['add-blog'])) {
                        echo $_SESSION['add-blog'];
                        unset($_SESSION['add-blog']);
                    }
                    if (isset($_SESSION['upload-blog'])) {
                        echo $_SESSION['upload-blog'];
                        unset($_SESSION['upload-blog']);
                    }
                    ?>
                    
                    <?php

                      $admin_user = $_SESSION['user'];

                      $sql = "SELECT id FROM tbl_admin WHERE username='$admin_user'";
                      $res = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_assoc($res);
  
                      $admin_id = $row['id'];
 
                        
                    ?>


                    <form class="form-horizontal mt-4" action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" class="form-control" placeholder="Blog Title" name="title">
                        </div>
                        <div class="form-group">
                            <label>Description(Content-1):</label>
                            <textarea name="description1" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Select Image(Image-1):</label>
                            <input type="file" name="upload1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description(Content-2):</label>
                            <textarea name="description2" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Select Image(Image-2):</label>
                            <input type="file" name="upload2" class="form-control">
                        </div>
                        <div class="form-group row pt-3">
                            <label>Featured:</label>
                            <div class="col-sm-1">
                                <div class="form-check">
                                    <input type="radio" name="featured" value="Yes" class="form-check-input">
                                    <label class="form-check-label mb-0">Yes</label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-check">
                                    <input type="radio" name="featured" value="No" class="form-check-input">
                                    <label class="form-check-label mb-0">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pt-3">
                            <label>Active:</label>
                            <div class="col-sm-1">
                                <div class="form-check">
                                    <input type="radio" name="active" value="Yes" class="form-check-input">
                                    <label class="form-check-label mb-0">Yes</label>
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
                            <input type="hidden" name="id" value="<?php echo $admin_id;?>">
                            <input type="submit" class="btn btn-success text-white mdi mdi-account-plus" name="add-blog" value="Post Blog">
                        </div>
                    </form>
                </div>
            </div>
        </div>
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