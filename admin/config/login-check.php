<?php
    
    if(!isset($_SESSION['user'])){

    $_SESSION['no-login-message'] = "Please Login to access the Admin Panel";
    Redirect($siteurl.'admin/login.php');

    }