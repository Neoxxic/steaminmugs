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
                <h4 class="page-title">Manage Comments</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Comments</li>
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Blog</th>
                                        <th scope="col">Date & time</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT * FROM tbl_comment";
                                    $res = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($res);
                                    $sn = 1;

                                    if ($count > 0) {

                                        while ($row = mysqli_fetch_assoc($res)) {

                                            $comment_id = $row['id'];
                                            $name = $row['name'];
                                            $message = $row['message'];
                                            $date = $row['date'];
                                            $active = $row['active'];
                                            $blog_id = $row['blog_id'];

                                            
                                            $sql2 = "SELECT * FROM tbl_blog WHERE id=$blog_id";
                                            $res2 = mysqli_query($conn, $sql2);
                                            $count2 = mysqli_num_rows($res2);
                                            $row2 = mysqli_fetch_assoc($res2);
                                            
                                            $blog_title = $row2['blog_title'];

                                    ?>

                                            <tr>
                                                <th scope="row"><?php echo $sn++; ?></th>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $message; ?></td>
                                                <td><?php echo $blog_title; ?></td>
                                                <td><?php echo $date; ?></td>
                                                <td>
                                                    <a href="<?php echo $siteurl ?>blog-single.php?blog_id=<?php echo $blog_id; ?>" class="btn btn-dark mdi mdi-eye" title="View"> View</a>
                                                    <a href="<?php echo $siteurl ?>admin/delete-comment.php?comment_id=<?php echo $comment_id; ?>" class="btn btn-danger mdi mdi-delete" title="Delete Comment"></a>
                                                </td>
                                            </tr>

                                    <?php

                                        }
                                    } else {

                                        echo "<tr><td class='error'> Product not added yet. </td></tr>";
                                    }


                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="add-order.php" class="btn btn-success text-white mdi mdi-library-plus"> Add Order</a>
                </div>
            </div>
            <?php

            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

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
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <?php
    include('../admin/static/footer.php');
    ?>