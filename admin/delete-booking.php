<?php 

    include('../admin/config/constant.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_booking WHERE id=$id";


    $res = mysqli_query($conn, $sql);

    if($res==TRUE){

        $_SESSION['delete'] = "<div class='alert alert-success'>
                                    Appointment Deleted Successfully
                                </div>";
        Redirect($siteurl.'admin/manage-booking.php');
        
    }else{

        $_SESSION['delete'] = "<div class='alert alert-danger'> 
                                    Failed to Delete Appointment. Please Try Again.
                                </div>";
        Redirect($siteurl.'admin/manage-booking.php');

    }
?>