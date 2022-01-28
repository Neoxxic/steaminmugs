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
                <h4 class="page-title">Manage Category</h4>
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
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php

                                        $sql = "SELECT * FROM tbl_categories";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        $sn = 1;

                                        if($count>0){

                                            while($row = mysqli_fetch_assoc($res)){

                                                $id = $row['id'];
                                                $title = $row['title'];
                                                $image_name = $row['image_name'];
                                                $featured = $row['featured'];
                                                $active = $row['active'];
                                                
                                                

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $sn++; ?></th>
                                                    <td><?php echo $title?></td>

                                                    <td>
                                                        <?php 

                                                            if($image_name!=""){

                                                                ?>
                                                                
                                                                <img src="<?php echo $siteurl;?>admin/upload/category/<?php echo $image_name;?>" class="img-thumbnail" width="100">
                                                                
                                                                <?php

                                                                

                                                            }else{

                                                                echo "<div class='error'>Image not Added</div>";

                                                            }
                                                        
                                                        ?>
                                                    </td>
                                                    
                                                    <td><?php echo $featured?></td>
                                                    <td><?php echo $active?></td>
                                                    <td>
                                                        <a href="<?php echo $siteurl?>admin/update-category.php?id=<?php echo $id;?>" class="btn btn-dark mdi mdi-pencil" title="Update Admin"> Update</a>
                                                        <a href="<?php echo $siteurl?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn btn-danger mdi mdi-delete" title="Delete Category"></a>
                                                    </td>
                                                </tr>
                                                <?php

                                            }

                                        } else {
                                            
                                            echo "<tr><td class='error'> Category not added yet. </td></tr>";

                                        }


                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="add-category.php" class="btn btn-success text-white mdi mdi-library-plus"> Add Category</a>
                </div>
                <?php
                if (isset($_SESSION['add-category'])) {
                    ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['add-category'];?>
                    </div>
                    <?php
                    unset($_SESSION['add-category']);
                }
                if (isset($_SESSION['delete-categ'])) {
                    echo $_SESSION['delete-categ'];
                    unset($_SESSION['delete-categ']);
                }
                if (isset($_SESSION['no-category-found'])) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['no-category-found'];?>
                    </div>
                    <?php
                    unset($_SESSION['no-category-found']);
                }
                if (isset($_SESSION['update-categ'])) {
                    ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['update-categ'];?>
                    </div>
                    <?php
                    unset($_SESSION['update-categ']);
                }
                if (isset($_SESSION['f-remove-img'])) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['f-remove-img'];?>
                    </div>
                    <?php
                    unset($_SESSION['f-remove-img']);
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