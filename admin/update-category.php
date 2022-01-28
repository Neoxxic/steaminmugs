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
                <h4 class="page-title">Update Category</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Manage Category</li>
                            <li class="breadcrumb-item active" aria-current="page">Update Category</li>
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
                    <h4 class="card-title">Update Form</h4>
                    <h5 class="card-subtitle">Fill up the details below</h5>
                    <?php 
                        if(isset($_GET['id'])){

                            $id = $_GET['id'];
                            $sql="SELECT * FROM tbl_categories WHERE id=$id";
                    
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                    
                            if($count==1){
                    
                                $row = mysqli_fetch_assoc($res);
                                $title = $row['title'];
                                $current_image = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                    
                            } else {
                    
                                $_SESSION['no-category-found'] = "Category not Found";
                                Redirect($siteurl.'admin/update-category.php');
                    
                            }
                            
                        }
                    ?>
                    <form class="form-horizontal mt-4" action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Category Title" name="title" value="<?php echo $title;?>">
                        </div>
                        <div class="form-group">
                                    <label>Current Image:</label>
                                    <?php 
                                        if($current_image!= ""){
                                            
                                            ?>
                                            <img src="<?php echo $siteurl; ?>admin/upload/category/<?php echo $current_image?>" class="img-thumbnail" width="100">
                                            <?php


                                        } else {
                                            echo "<div class='message-error'>Image not found</div>";
                                        }
                                    ?>
                        </div>
                        <div class="form-group">
                                    <label>New Image:</label>
                                    <input type="file" name="new-upload" class="form-control">
                        </div>
                        <div class="form-group row pt-3">
                            <label>Featured:</label>
                            <div class="col-sm-1">
                                <div class="form-check">
                                    <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio"  name="featured" value="Yes" class="form-check-input">
                                    <label class="form-check-label mb-0" >Yes</label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-check">
                                    <input <?php if($featured == "No"){echo "checked";} ?> type="radio"  name="featured" value="No" class="form-check-input">
                                    <label class="form-check-label mb-0">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pt-3">
                            <label>Active:</label>
                            <div class="col-sm-1">
                                <div class="form-check">
                                    <input <?php if($active == "Yes"){echo "checked";} ?> type="radio"  name="active" value="Yes" class="form-check-input">
                                    <label class="form-check-label mb-0" >Yes</label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-check">
                                    <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No" class="form-check-input">
                                    <label class="form-check-label mb-0">No</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" class="btn btn-success text-white mdi mdi-account-plus" name="update-categ" value="Update Category">
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