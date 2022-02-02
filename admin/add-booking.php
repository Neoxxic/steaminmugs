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
                <h4 class="page-title">Add Appointment</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Manage Booking</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Appointment</li>
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
                    <h4 class="card-title">Appointment Form</h4>
                    <h5 class="card-subtitle">Fill up the details below</h5>
                    <form class="form-horizontal mt-4" action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label>Fullname:</label>
                            <input type="text" class="form-control col-md-5 col-sm-6" placeholder="" name="fullname">
                        </div>
                        <div class="form-group">
                            <label>Date:</label>
                            <input type="date" class="form-control col-md-5 col-sm-6" placeholder="" name="date">
                        </div>
                        <div class="form-group">
                            <label>Time:</label>
                            <input type="time" class="form-control col-md-5 col-sm-6" placeholder="" name="time">
                        </div>
                        <div class="form-group">
                            <label>Phone:</label>
                            <input type="text" class="form-control col-md-5 col-sm-6" placeholder="" name="phone">
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Message:</label>
                            <textarea name="message" class="form-control" rows="5"></textarea>
                        </div>
                        <div>
                            <input type="hidden" name="status" value="booked">
                            <input type="submit" class="btn btn-success text-white mdi mdi-account-plus" name="add-appointment" value="Add Appointment">
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