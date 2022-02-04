<?php 
    include('../admin/config/constant.php');
?>
<html dir="static" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Nice lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Nice admin lite design, Nice admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Nice Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Nice Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/niceadmin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="./assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./dist/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>        
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row justify-content-center">
            <div class="col-5 align-self-center">
            <div class="login">
                <div class="card card-login">
                    <h4 class="card-title">Log In</h4>
                    <h5 class="card-subtitle">Welcome to Admin Panel</h5>
                    <?php
                        if (isset($_SESSION['f-login'])) {
                            ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['f-login'];?>
                            </div>
                            <?php
                            unset($_SESSION['f-login']);
                        }
                    ?>
                    <form class="form-horizontal mt-4" action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Enter your username" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Enter your password" name="password">
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <input type="submit" class="btn btn-success text-white" name="login" value="Login">
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
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
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="../admin/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="../admin/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../admin/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../admin/dist/js/custom.min.js"></script>
</body>

</html>