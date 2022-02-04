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
                <h4 class="page-title">Add Admin</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Manage Admin</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
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
                    <h4 class="card-title">Admin Forms</h4>
                    <h5 class="card-subtitle">Fill up the details below</h5>
                    <?php
                    if (isset($_SESSION['add'])) {
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['add']; ?>
                        </div>
                    <?php
                        unset($_SESSION['add']);
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['upload-admin'])) {
                        echo $_SESSION['upload-admin'];
                        unset($_SESSION['upload-admin']);
                    }
                    ?>
                    <form class="form-horizontal mt-4" action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter your Name" name="full_name">
                        </div>
                        <div class="form-group">
                            <label>Select Image:</label>
                            <input type="file" name="upload" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea name="admin_info" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="password" name="password">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success text-white mdi mdi-account-plus" name="submit" value="Add Admin">
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