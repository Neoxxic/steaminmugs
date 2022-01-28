<?php 

    include('../admin/config/constant.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id=$id";


    $res = mysqli_query($conn, $sql);

    if($res==TRUE){

        $_SESSION['delete'] = "<div class='alert alert-success'>
                                    Admin Deleted Successfully
                                </div>";
        Redirect($siteurl.'admin/manage-admins.php');
        
    }else{

        $_SESSION['delete'] = "<div class='alert alert-danger'> 
                                    Failed to Delete Admin. Please Try Again.
                                </div>";
        Redirect($siteurl.'admin/manage-admins.php');

    }
?>