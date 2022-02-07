<?php

    include('config/constant.php');

    
    $current_id = $_SESSION['order_id'];
    $temp_id = $_GET['order_temp_id'];
    $id = $_GET['order_id'];
    $sql = "DELETE FROM tbl_order WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if($temp_id == ""){
        session_destroy();
    } else {
        
    if($res==TRUE){
        $_SESSION['delete-order'] = "<div class='alert alert-success'>
                                    Order Deleted Successfully
                                </div>";
        Redirect($siteurl.'checkout.php?order_temp_id='.$current_id);
        
    }else{

        $_SESSION['delete-order'] = "<div class='alert alert-danger'> 
                                    Failed to Delete Order. Please Try Again.
                                </div>";
        Redirect($siteurl.'shop.php');

    }
    }
