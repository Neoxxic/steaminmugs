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

$blog_id = $_GET['blog_id'];

?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Blog <?php echo $blog_id; ?></h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Blog</li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
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

                        $sql = "SELECT * FROM tbl_blog WHERE id=$blog_id";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count == 1) {

                            while ($row = mysqli_fetch_assoc($res)) {

                                $admin_id = $row['admin_id'];
                                $blog_title = $row['blog_title'];
                                $content1 = $row['content_1'];
                                $current_image1 = $row['image_1'];
                                $content2 = $row['content_2'];
                                $current_image2 = $row['image_2'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                $date_posted = $row['date_posted'];


                                $sql2 = "SELECT full_name FROM tbl_admin WHERE id=$admin_id";
                                $res2 = mysqli_query($conn, $sql2);
                                $row2 = mysqli_fetch_assoc($res2);

                                $admin_name = $row2['full_name'];

                            }
                        } else {
                            echo "<div class='error'>Order not found</div>";
                        }


                        ?>
                        <Center>
                            <h3>Active</h3>
                            <h4><?php echo $active; ?></h4>
                        </Center>

                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <small class="text-muted pt-4 db">Blog Title</small>
                        <h6><?php echo $blog_title; ?></h6>
                        <small class="text-muted pt-4 db">Content</small>
                        <h6><?php echo $content1; ?></h6>
                        <?php
                        if ($current_image1 != "") {

                        ?>

                            <img src="<?php echo $siteurl; ?>admin/upload/blog/<?php echo $current_image1; ?>" class="img-thumbnail" width="100">

                        <?php



                        } else {

                            echo "<div class='error'>Image not Added</div>";
                        }
                        ?>
                        <h6 style="padding-top: 1rem;"><?php echo $content2; ?></h6>
                        <?php
                        if ($current_image2 != "") {

                        ?>

                            <img src="<?php echo $siteurl; ?>admin/upload/blog/<?php echo $current_image2; ?>" class="img-thumbnail" width="100">

                        <?php



                        } else {

                            echo "<div class='error'>Image not Added</div>";
                        }
                        ?>
                        <br></br>
                        <small class="text-muted pt-4 db">Creted by:</small>
                        <h6><?php echo $admin_name; ?></h6>
                        <small class="text-muted pt-4 db">Date Created</small>
                        <h6><?php echo $date_posted; ?></h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" class="form-horizontal form-material mx-2">
                            <div class="form-group">
                                <label class="col-md-12">Blog Title</label>
                                <div class="col-md-12">
                                    <input name="title" value="<?php echo $blog_title; ?>" type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Description 1</label>
                                <div class="col-md-12">
                                    <textarea name="description1" value="<?php echo $content1; ?>" rows="5" class="form-control form-control-line"><?php echo $content1; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Select Image(Image-1):</label>
                                <input type="file" name="upload1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Description 2</label>
                                <div class="col-md-12">
                                    <textarea name="description2" value="<?php echo $content2; ?>" rows="5" class="form-control form-control-line"><?php echo $content2; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Select Image(Image-2):</label>
                                <input type="file" name="upload2" class="form-control">
                            </div>
                            <div class="form-group row pt-3">
                                <label>Featured:</label>
                                <div class="col-sm-1">
                                    <div class="form-check">
                                        <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes" class="form-check-input">
                                        <label class="form-check-label mb-0">Yes</label>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-check">
                                        <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" value="No" class="form-check-input">
                                        <label class="form-check-label mb-0">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-3">
                                <label>Active:</label>
                                <div class="col-sm-1">
                                    <div class="form-check">
                                        <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes" class="form-check-input">
                                        <label class="form-check-label mb-0">Yes</label>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-check">
                                        <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No" class="form-check-input">
                                        <label class="form-check-label mb-0">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="hidden" name="current_image1" value="<?php echo $current_image1;?>">
                                    <input type="hidden" name="current_image2" value="<?php echo $current_image2; ?>">
                                    <input type="hidden" name="id" value="<?php echo $blog_id; ?>">
                                    <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                                    <input name="update-blog" type="submit" class="btn btn-success text-white" value="Update Blog">
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