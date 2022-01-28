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
                <h4 class="page-title">Update Admin</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Manage Admin</li>
                            <li class="breadcrumb-item active" aria-current="page">Update Admin</li>
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
                    <h5 class="card-subtitle">Update the details below</h5>
                    <?php

                        $id=$_GET['id'];

                        $sql="SELECT * FROM tbl_admin WHERE id=$id";

                        $res=mysqli_query($conn, $sql);

                        if($res==TRUE){

                            $count = mysqli_num_rows($res);
                            if($count==1){
                                
                                $row=mysqli_fetch_assoc($res);

                                $full_name = $row['full_name'];
                                $username = $row['username'];

                            } else {
                                
                                Redirect($siteurl.'admin/manage-admins.php');

                            }

                        }

                    ?>
                    <form class="form-horizontal mt-4" action="" method="POST">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter your Name" name="full_name" value="<?php echo $full_name?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $username?>">
                        </div>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" class="btn btn-success text-white mdi mdi-account-plus" name="update" value="Update Admin">
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