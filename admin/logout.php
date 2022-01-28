<?php

    include('../admin/config/constant.php');

    session_destroy();


    Redirect($siteurl.'admin/login.php');