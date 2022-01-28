<?php 

    include('../admin/config/constant.php');

    if(isset($_GET['id']) AND isset($_GET['image_name'])){

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ""){

            $path = "upload/category/".$image_name;
            $remove = unlink($path);

            if($remove=false){

                $_SESSION['delete-categ'] = "<div class='alert alert-danger'> 
                                            Failed to Remove Category Image.
                                            </div>";
                Redirect($siteurl.'admin/manage-category.php');

            }
        }

        $sql = "DELETE FROM tbl_categories WHERE id=$id";
        
        $res = mysqli_query($conn, $sql); 

        if($res==TRUE){

            $_SESSION['delete-categ'] = "<div class='alert alert-success'>
                                        Admin Deleted Successfully
                                    </div>";
            Redirect($siteurl.'admin/manage-category.php');
            
        }else{
    
            $_SESSION['delete-categ'] = "<div class='alert alert-danger'> 
                                        Failed to Delete Admin. Please Try Again.
                                    </div>";
            Redirect($siteurl.'admin/manage-category.php');
    
        }


    } else {

        Redirect($siteurl.'admin/manage-category.php');

    }


   
    

    