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
                <h4 class="page-title">Manage Messages</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Messages</li>
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
                                        <th scope="col">Date & Time</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Action</th>                                         
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php

                                        $sql = "SELECT * FROM tbl_messages";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        $sn = 1;

                                        if($count>0){

                                            while($row = mysqli_fetch_assoc($res)){

                                                $id = $row['id'];
                                                $name = $row['name'];
                                                $email = $row['email'];
                                                $subject = $row['subject'];
                                                $message = $row['message'];
                                                $date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $sn++; ?></th>
                                                    <td><?php echo $date?></td>
                                                    <td><?php echo $name?></td>
                                                    <td><?php echo $email?></td>
                                                    <td><?php echo $subject?></td>
                                                    <td><?php echo $message?></td>
                                                    <td>
                                                        <a href="<?php echo $siteurl?>admin/view-message.php?booking_id=<?php echo $id;?>" class="btn btn-dark mdi mdi-eye" title="View Message"> View</a>
                                                        <a href="<?php echo $siteurl?>admin/delete-message.php?id=<?php echo $id;?>" class="btn btn-danger mdi mdi-delete" title="Delete Message"></a>
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
                <?php
                if (isset($_SESSION['add-booking'])) {
                    echo $_SESSION['add-booking'];
                    unset($_SESSION['add-booking']);
                }
                if (isset($_SESSION['delete-message'])) {
                    echo $_SESSION['delete-message'];
                    unset($_SESSION['delete-message']);
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