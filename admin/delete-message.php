<?php 

    include('../admin/config/constant.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_messages WHERE id=$id";


    $res = mysqli_query($conn, $sql);

    if($res==TRUE){

        $_SESSION['delete-message'] = "<div class='alert alert-success'>
                                    Message Deleted Successfully
                                </div>";
        Redirect($siteurl.'admin/manage-messages.php');
        
    }else{

        $_SESSION['delete-message'] = "<div class='alert alert-danger'> 
                                    Failed to Delete Message. Please Try Again.
                                </div>";
        Redirect($siteurl.'admin/manage-messages.php');

    }
?>