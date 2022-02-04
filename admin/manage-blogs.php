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
                <h4 class="page-title">Manage Blogs</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Blogs</li>
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
                                        <th scope="col">Date&Time</th>
                                        <th scope="col">Blog Title</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php

                                        $sql = "SELECT * FROM tbl_blog";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        $sn = 1;

                                        if($count>0){

                                            while($row = mysqli_fetch_assoc($res)){
                                                $id = $row['id'];
                                                $blog_title = $row['blog_title'];
                                                $content1 = $row['content_1'];
                                                $image_1 = $row['image_1'];
                                                $content2 = $row['content_2'];
                                                $image_2 = $row['image_2'];
                                                $featured = $row['featured'];
                                                $active = $row['active'];
                                                $date_posted = $row['date_posted'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $sn++; ?></th>
                                                    <td><?php echo $date_posted?></td>

                                                    <td><?php echo $blog_title?></td>
                                                    <td><?php echo $featured?></td>
                                                    <td><?php echo $active?></td>
                                                    <td>
                                                        <a href="<?php echo $siteurl?>admin/view-blog.php?blog_id=<?php echo $id;?>" class="btn btn-dark mdi mdi-pencil" title="Update Admin"> Update</a>
                                                        <a href="<?php echo $siteurl?>admin/delete-blog.php?id=<?php echo $id;?>&image_name1=<?php echo $image_1;?>&image_name2=<?php echo $image_2;?>" class="btn btn-danger mdi mdi-delete" title="Delete Booking"></a>
                                                    </td>
                                                </tr>
                                                <?php

                                            }

                                        } else {
                                            
                                            echo "<tr><td class='error'> Booked not added yet. </td></tr>";

                                        }


                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="add-blog.php" class="btn btn-success text-white mdi mdi-library-plus"> Add Post</a>
                </div>
                <?php
                if (isset($_SESSION['add-blog'])) {
                    echo $_SESSION['add-blog'];
                    unset($_SESSION['add-blog']);
                }
                if (isset($_SESSION['delete-blog'])) {
                    echo $_SESSION['delete-blog'];
                    unset($_SESSION['delete-blog']);
                }
                if (isset($_SESSION['delete-blog-image'])) {
                    echo $_SESSION['delete-blog-image'];
                    unset($_SESSION['delete-blog-image']);
                }
                if (isset($_SESSION['update-booking'])) {
                    echo $_SESSION['update-booking'];
                    unset($_SESSION['update-booking']);
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