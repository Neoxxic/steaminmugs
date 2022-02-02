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

$booking_id = $_GET['booking_id'];

?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Order <?php echo $booking_id; ?></h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Appointment</li>
                            <li class="breadcrumb-item active" aria-current="page">Appointment</li>
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

                        $sql = "SELECT * FROM tbl_booking WHERE id=$booking_id";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count == 1) {

                            while ($row = mysqli_fetch_assoc($res)) {

                                $id = $row['id'];
                                $name = $row['name'];
                                $b_date = $row['date'];
                                $b_time = $row['time'];
                                $booked = $b_date . $b_time;
                                $status = $row['status'];
                                $date = $row['book_date'];
                                $phone = $row['phone'];
                                $message = $row['message'];
                            }
                        } else {
                            echo "<div class='error'>Order not found</div>";
                        }


                        ?>
                        <Center>
                            <h3>Status</h3>
                            <h4><?php echo $status; ?></h4>
                        </Center>

                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <small class="text-muted pt-4 db">Fullname</small>
                        <h6><?php echo $name; ?></h6> 
                        <small class="text-muted pt-4 db">Phone</small>
                        <h6><?php echo $phone; ?></h6>
                        <small class="text-muted pt-4 db">Appointment</small>
                        <h6><?php echo $booked; ?></h6>
                        <small class="text-muted pt-4 db">Date</small>
                        <h6><?php echo $date; ?></h6>
                        <small class="text-muted pt-4 db">Message</small>
                        <h6><?php echo $message; ?></h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" class="form-horizontal form-material mx-2">
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input name="fullname" value="<?php echo $name; ?>" type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Date</label>
                                <div class="col-md-12">
                                    <input type="date" value="<?php echo $date; ?>" name="date" class="form-control" placeholder="Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Time</label>
                                <div class="col-md-12">
                                    <input type="time" value="<?php echo $b_time; ?>" name="time" class="form-control" placeholder="Time">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input name="phone" value="<?php echo $phone; ?>" type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Message</label>
                                <div class="col-md-12">
                                    <textarea name="address" value="<?php echo $message; ?>" rows="5" class="form-control form-control-line"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="hidden" name="id" value="<?php echo $booking_id; ?>">
                                    <input name="update-booking" type="submit" class="btn btn-success text-white" value="Update Order">
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