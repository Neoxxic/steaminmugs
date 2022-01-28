<?php 

    include('../admin/config/constant.php');

    if(isset($_GET['id']) AND isset($_GET['image_name'])){

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ""){

            $path = "upload/product/".$image_name;
            $remove = unlink($path);

            if($remove=false){

                $_SESSION['delete-prod'] = "<div class='alert alert-danger'> 
                                            Failed to Remove Product Image.
                                            </div>";
                Redirect($siteurl.'admin/manage-product.php');

            }
        }

        $sql = "DELETE FROM tbl_food WHERE id=$id";
        
        $res = mysqli_query($conn, $sql); 

        if($res==TRUE){

            $_SESSION['delete-prod'] = "<div class='alert alert-success'>
                                        Product Deleted Successfully
                                    </div>";
            Redirect($siteurl.'admin/manage-product.php');
            
        }else{
    
            $_SESSION['delete-prod'] = "<div class='alert alert-danger'> 
                                        Failed to Delete Product. Please Try Again.
                                    </div>";
            Redirect($siteurl.'admin/manage-product.php');
    
        }


    } else {

        Redirect($siteurl.'admin/manage-category.php');

    }


   
    

    