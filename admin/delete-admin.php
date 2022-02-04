<?php 

    include('../admin/config/constant.php');

    if(isset($_GET['id']) AND isset($_GET['image_name'])){

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($_SESSION['user'] == 'Admin' || $_SESSION['user'] == 'Shin'){

            if($image_name != ""){

                $path = "upload/admin/".$image_name;
                $remove = unlink($path);
    
                if($remove=false){
    
                    $_SESSION['delete-admin'] = "<div class='alert alert-danger'> 
                                                Failed to Remove Product Image.
                                                </div>";
                    Redirect($siteurl.'admin/manage-admins.php');
    
                }
            }

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
    
        } else {
            $_SESSION['delete'] = "<div class='alert alert-danger'> 
                                You don't Have the Permission to Delete Admin.
                                </div>";
            Redirect($siteurl.'admin/manage-admins.php');
    
    
        }

    }


    
