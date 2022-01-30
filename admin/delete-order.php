<?php 

    include('../admin/config/constant.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_order WHERE id=$id";


    $res = mysqli_query($conn, $sql);

    if($res==TRUE){

        $_SESSION['delete-order'] = "<div class='alert alert-success'>
                                    Order Deleted Successfully
                                </div>";
        Redirect($siteurl.'admin/manage-orders.php');
        
    }else{

        $_SESSION['delete-order'] = "<div class='alert alert-danger'> 
                                    Failed to Delete Order. Please Try Again.
                                </div>";
        Redirect($siteurl.'admin/manage-orders.php');

    }
?>