<?php 

    include('../admin/config/constant.php');

    $id = $_GET['comment_id'];

    $sql = "DELETE FROM tbl_comment WHERE id=$id";


    $res = mysqli_query($conn, $sql);

    if($res==TRUE){

        $_SESSION['delete'] = "<div class='alert alert-success'>
                                    Comment Deleted Successfully
                                </div>";
        Redirect($siteurl.'admin/manage-comment.php');
        
    }else{

        $_SESSION['delete'] = "<div class='alert alert-danger'> 
                                    Failed to Delete Comment. Please Try Again.
                                </div>";
        Redirect($siteurl.'admin/manage-comment.php');

    }
?>