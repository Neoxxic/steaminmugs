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
                <h4 class="page-title">Manage Admin</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Admin</li>
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
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Profile</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Info</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        
                                        $sql = "SELECT * FROM tbl_admin";
                                        $res = mysqli_query($conn, $sql);


                                        if($res==TRUE){
                                            
                                            $count = mysqli_num_rows($res);
                                            
                                            $sn=1;

                                            if($count>0){
                                                
                                                while($rows=mysqli_fetch_assoc($res)){
                                                    
                                                    $id=$rows['id'];
                                                    $full_name=$rows['full_name'];
                                                    $username=$rows['username'];
                                                    $admin_img = $rows['admin_img'];
                                                    $admin_info = $rows['admin_info']

                                                    ?>

                                                    <tr>
                                                        <th scope="row"><?php echo $sn++; ?></th>
                                                        
                                                        <td>
                                                            <?php 
                                                                if($admin_img!=""){

                                                                    ?>
                                                                    
                                                                    <img src="<?php echo $siteurl;?>admin/upload/admin/<?php echo $admin_img;?>" class="img-thumbnail" width="100">
                                                                    
                                                                    <?php
    
                                                                    
    
                                                                }else{
    
                                                                    echo "<div class='error'>Image not Added</div>";
    
                                                                }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $full_name;?></td>
                                                        <td><?php echo $admin_info;?></td>
                                                        <td><?php echo $username;?></td>
                                                        <td>
                                                            
                                                            <?php
                                                                if($_SESSION['user'] == "Admin" || $_SESSION['user'] == "Shin" || $_SESSION['user'] == $username){
                                                                    ?>
                                                                        <a href="<?php echo $siteurl?>admin/update-admin.php?id=<?php echo $id;?>" class="btn btn-dark mdi mdi-pencil" title="Update Admin"> Update</a>
                                                                        <a href="<?php echo $siteurl?>admin/update-password.php?id=<?php echo $id;?>" class="btn btn-primary mdi mdi-account-edit" title="Change Password"> Change Password</a>
                                                                        <a href="<?php echo $siteurl?>admin/delete-admin.php?id=<?php echo $id; ?>&image_name=<?php echo $admin_img;?>" class="btn btn-danger mdi mdi-delete" title="Delete Admin"></a>
                                                                    <?php
                                                                }
                                                            ?>
                                                            
                                                        </td>
                                                    </tr>


                                                    <?php
                                                    

                                                }

                                            }else{

                                            }

                                        }
                                    
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="add-admin.php" class="btn btn-success text-white mdi mdi-account-plus"> Add Admin</a>
                </div>
                <?php
                if (isset($_SESSION['add'])) {
                    ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['add'];?>
                    </div>
                    <?php
                    unset($_SESSION['add']);
                }
                if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if (isset($_SESSION['delete-admin'])) {
                    echo $_SESSION['delete-admin'];
                    unset($_SESSION['delete-admin']);
                }
                if (isset($_SESSION['update'])) {
                    ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['update'];?>
                    </div>
                    <?php
                    unset($_SESSION['update']);
                }
                if (isset($_SESSION['user-not-found'])) {
                    ?>
                    <div class="alert alert-warning">
                        <?php echo $_SESSION['user-not-found'];?>
                    </div>
                    <?php
                    unset($_SESSION['user-not-found']);
                }
                if (isset($_SESSION['change-pwd'])) {
                    ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['change-pwd'];?>
                    </div>
                    <?php
                    unset($_SESSION['change-pwd']);
                }

                ?>
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
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
<?php 
    include('../admin/static/footer.php');
?>