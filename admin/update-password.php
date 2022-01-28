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
                    <h4 class="page-title">Change Password</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Manage Admin</li>
                                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                        <h4 class="card-title">Change Password Form</h4>
                        <h5 class="card-subtitle">Fill up the details below</h5>
                        <?php

                            if(isset($_GET['id'])){
                                $id=$_GET['id'];
                            }

                        ?>
                        <form class="form-horizontal mt-4" action="" method="POST">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" class="form-control" placeholder="Old Password" name="current_password">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" placeholder="New Password" name="new_password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                            </div>
                            <div>
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="submit" class="btn btn-success text-white mdi mdi-account-plus" name="change" value="Change Password">
                            </div>
                        </form>
                    </div>
                    <?php 
                        if (isset($_SESSION['pwd-not-match'])) {
                            ?>
                            <div class="alert alert-warning">
                                <?php echo $_SESSION['pwd-not-match'];?>
                            </div>
                            <?php
                            unset($_SESSION['pwd-not-match']);
                        }
                        if (isset($_SESSION['f-change-pwd'])) {
                            ?>
                            <div class="alert alert-warning">
                                <?php echo $_SESSION['f-change-pwd'];?>
                            </div>
                            <?php
                            unset($_SESSION['f-change-pwd']);
                        }
                    ?>
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