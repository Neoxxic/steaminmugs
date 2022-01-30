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
                <h4 class="page-title">Manage Orders</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Orders</li>
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
                                        <th scope="col">Qty.</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Date & time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php

                                        $order_complete = "order-complete";
                                        $sql = "SELECT * FROM tbl_order WHERE status='$order_complete'";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);
                                        $sn = 1;

                                        if($count>0){

                                            while($row = mysqli_fetch_assoc($res)){

                                                $order_id = $row['id'];
                                                $product = $row['food'];
                                                $total = $row['total']; 
                                                $fullname = $row['customer_name'];
                                                $date = $row['order_date'];
                                                $qty = $row['qty'];
                                                $status = $row['status'];
                                                
                                                ?>

                                                    <tr>
                                                        <th scope="row"><?php echo $sn++; ?></th>
                                                        <td><?php echo $fullname;?></td>
                                                        <td><?php echo $qty;?></td>
                                                        <td><?php echo $total;?></td>
                                                        <td><?php echo $date;?></td>
                                                        <td><?php echo $status;?></td>
                                                        <td>
                                                            <a href="<?php echo $siteurl?>admin/view-order.php?order_id=<?php echo $order_id;?>" class="btn btn-dark mdi mdi-eye" title="Update Product"> View</a>
                                                            <a href="<?php echo $siteurl?>admin/delete-order.php?id=<?php echo $order_id;?>" class="btn btn-danger mdi mdi-delete" title="Delete Product"></a>
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

            if (isset($_SESSION['delete-order'])) {
                echo $_SESSION['delete-order'];
                unset($_SESSION['delete-order']);
            }
            if (isset($_SESSION['update-order'])) {
                echo $_SESSION['update-order'];
                unset($_SESSION['update-order']);
            }
            if (isset($_SESSION['add-order'])) {
                echo $_SESSION['add-order'];
                unset($_SESSION['add-order']);
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