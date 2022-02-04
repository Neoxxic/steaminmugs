<?php 

    include('../admin/config/constant.php');

    if(isset($_GET['id']) AND isset($_GET['image_name1']) AND isset($_GET['image_name2'])){

        $id = $_GET['id'];
        $image_name1 = $_GET['image_name1'];
        $image_name2 = $_GET['image_name2'];

        if($image_name1 != ""){

            $path = "upload/blog/".$image_name1;
            $remove = unlink($path);

            if($remove=false){

                $_SESSION['delete-blog-image'] = "<div class='alert alert-danger'> 
                                            Failed to Remove Product Image.
                                            </div>";
                Redirect($siteurl.'admin/manage-blogs.php');

            }
        }
        if($image_name2 != ""){

            $path = "upload/blog/".$image_name2;
            $remove = unlink($path);

            if($remove=false){

                $_SESSION['delete-blog-image'] = "<div class='alert alert-danger'> 
                                            Failed to Remove Product Image.
                                            </div>";
                Redirect($siteurl.'admin/manage-blogs.php');

            }
        }

        $sql = "DELETE FROM tbl_blog WHERE id=$id";
        
        $res = mysqli_query($conn, $sql); 

        if($res==TRUE){

            $_SESSION['delete-blog'] = "<div class='alert alert-success'>
                                        Blog Deleted Successfully
                                    </div>";
            Redirect($siteurl.'admin/manage-blogs.php');
            
        }else{
    
            $_SESSION['delete-blog'] = "<div class='alert alert-danger'> 
                                        Failed to Delete Blog. Please Try Again.
                                    </div>";
            Redirect($siteurl.'admin/manage-blogs.php');
    
        }


    } else {

        Redirect($siteurl.'admin/manage-category.php');

    }


   
    

    