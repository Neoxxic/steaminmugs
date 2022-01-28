<?php

session_start();


$siteurl = 'http://localhost:8080/steaminmugs/';
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'steaminmugs';

$conn = mysqli_connect($servername, $username, $password);
$db_select = mysqli_select_db($conn, $dbname);


function Redirect($url, $statusCode = 303)
        {
            header('Location: ' . $url, true, $statusCode);
            die();
        }

    //ADD ADMIN
    if(isset($_POST['submit'])) {

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
            
            
        $sql = "INSERT INTO tbl_admin SET
                full_name='$full_name',
                username='$username',
                password='$password'
                ";
            
            
        $res = mysqli_query($conn, $sql);
                //Checker
                if ($res == TRUE) {
                    $_SESSION['add'] = "Admin added successfully";
                    Redirect($siteurl.'admin/manage-admins.php');
                } else {
                    $_SESSION['add'] = "Failed to Add New Admin";
                    Redirect($siteurl.'admin/add-admin.php');
                }
    }

    //UPDATE ADMIN
    if(isset($_POST['update'])) {

        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        $sql = "UPDATE tbl_admin SET
                full_name = '$full_name',
                username = '$username'
                WHERE id='$id'
                ";

        $res = mysqli_query($conn, $sql);

            if($res==TRUE){

                $_SESSION['update'] = "Admin Update Successfully";
                Redirect($siteurl.'admin/manage-admins.php');

            } else {
                    
                $_SESSION['update'] = "Failed to Update the Admin";
                Redirect($siteurl.'admin/update-admin.php');

            }



    }

    //CHANGE PASSWORD ADMIN
    if(isset($_POST['change'])){

        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE){

            $count=mysqli_num_rows($res);
            
            if($count==1){


                if($new_password == $confirm_password){
                    
                    $sql2 = "UPDATE tbl_admin SET
                            password='$new_password'
                            WHERE id=$id
                            ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==TRUE){

                        $_SESSION['change-pwd'] = "Password Change Successfully";
                        Redirect($siteurl.'admin/manage-admins.php');

                    }else{

                        $_SESSION['f-change-pwd'] = "Failed to Change Password";
                        Redirect($siteurl.'admin/update-password.php?id='.$id);

                    }

                } else {

                    $_SESSION['pwd-not-match'] = "Password Does Not Match";
                    Redirect($siteurl.'admin/update-password.php?id='.$id);

                }

            } else {

                $_SESSION['user-not-found'] = "User not Found";
                Redirect($siteurl.'admin/manage-admins.php');

            }

        }



    }

    //ADD CATEGORY
    if(isset($_POST['add-categ'])){
        
        $title = $_POST['title'];

        if(isset($_POST['featured'])){

            $featured = $_POST['featured'];
            

        } else{
            
            $featured = "No";
            
        }

        if(isset($_POST['active'])){

            $active = $_POST['active'];

        } else {

            $active = "No";
            
        }
        

        if(isset($_FILES['upload']['name'])){

            $image_name = $_FILES['upload']['name'];
            $ext = end(explode('.', $image_name));
            $max_size = 1000000;
            $whitelist_ext = array('jpeg','jpg','png','gif');
            
            if($image_name !=""){
                
                if (!in_array($ext, $whitelist_ext)) {
                    $_SESSION['error-add-category'] = "Invalid File Extension";
                    Redirect($siteurl.'admin/add-category.php');
                }
                if ($_FILES[$image_name]["size"] > $max_size) {
                    $_SESSION['error-add-category'] = "File is too Big";
                    Redirect($siteurl.'admin/add-category.php');
                }   
    
                $image_name = "Food_Category_".time().'.'.$ext;
                
                $source_path = $_FILES['upload']['tmp_name'];
                $destination_path = "upload/category/". $image_name;
    
                $uploadImage = copy($source_path, $destination_path);
                
                if($uploadImage==false){
    
                    $_SESSION['upload'] = "Failed to Upload Image";
                    header('Location: ' . $siteurl.'admin/add-category.php');
                    die();
                    
                }
            }
           

        } else {

            $image_name = "";

        }

        $sql = "INSERT INTO tbl_categories SET
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
        "; 

        $res = mysqli_query($conn, $sql);
            
            if($res==True){

                $_SESSION['add-category'] = "Category Added Successfully";
                Redirect($siteurl.'admin/manage-category.php');

            } else {

                $_SESSION['add-category'] = "Failed to Add New Category";
                Redirect($siteurl.'admin/add-category.php');

            }
        
    }

    //UPDATE CATEGORY
    if(isset($_POST['update-categ'])){

        $id = $_POST['id'];
        $title = $_POST['title'];
        $current_image = $_POST['current_image'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];
        

        if(isset($_FILES['new-upload']['name'])){

            $image_name = $_FILES['new-upload']['name'];
            
            if($image_name != ""){

                $ext = pathinfo($image_name, PATHINFO_EXTENSION);
    
                $image_name = "Food_Category_".time().'.'.$ext;
                
                $source_path = $_FILES['new-upload']['tmp_name'];
                $destination_path = "upload/category/". $image_name;
    
                $uploadImage = copy($source_path, $destination_path);
                
                if($uploadImage==false){
                    $_SESSION['upload'] = "Failed to Upload Image";
                    header('Location: ' . $siteurl.'admin/manage-category.php');
                    die();
                }

                if($current_image != ""){

                    $remove_path = "upload/category/".$current_image;
                    $remove = unlink($remove_path);
                
                    if($remove == false){

                        $_SESSION['f-remove-img'] = "Failed to remove current images";
                        header($siteurl.'admin/manage-category.php');
                        die();
                    }

                }

            } else {

                $image_name = $current_image;

            }

        } else {

            $image_name = $current_image;

        }

        
        $sql = "UPDATE tbl_categories SET
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
                WHERE id=$id
        ";

        $res = mysqli_query($conn, $sql);

        if($res==true){

            $_SESSION['update-categ'] = "Category Updated Successfully";
            Redirect($siteurl.'admin/manage-category.php');

        } else {

            $_SESSION['update-categ'] = "Failed to Update";
            Redirect($siteurl.'admin/update-category.php');

        }

    }

    //ADD PRODUCT
    if(isset($_POST['add-prod'])){
    
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        if(isset($_POST['featured'])){

            $featured = $_POST['featured'];

        } else{
            
            $featured = "No";
            
        }

        if(isset($_POST['active'])){

            $active = $_POST['active'];

        } else {

            $active = "No";
            
        }

        if(isset($_FILES['upload']['name'])){

            $image_name = $_FILES['upload']['name'];
            
            if($image_name !=""){
                
                $ext = pathinfo($image_name, PATHINFO_EXTENSION);
    
                $image_name = "Product-Name_".time().'.'.$ext;
                
                $source_path = $_FILES['upload']['tmp_name'];
                $destination_path = "upload/product/". $image_name;
    
                $uploadImage = copy($source_path, $destination_path);
                
                if($uploadImage==false){
    
                    $_SESSION['upload-prod'] = "Failed to Upload Image";
                    header('Location: ' . $siteurl.'admin/add-product.php');
                    die();
                    
                }
            }
           

        } else {

            $image_name = "";

        }

        $sql = "INSERT INTO tbl_food SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = '$category',
                featured = '$featured',
                active = '$active'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==true){

            $_SESSION['add-product'] = "Product Added Successfully";
            Redirect($siteurl.'admin/manage-product.php');

        } else {

            $_SESSION['add-product'] = "Failed to add product";
            Redirect($siteurl.'admin/add-product.php');

        }

    }

    //UPDATE PRODUCT
    if(isset($_POST['update-prod'])){

        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $current_image = $_POST['current_image'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];
        

        if(isset($_FILES['upload']['name'])){

            $image_name = $_FILES['upload']['name'];
            
            if($image_name != ""){

                $ext = pathinfo($image_name, PATHINFO_EXTENSION);
    
                $image_name = "Product-Name_".time().'.'.$ext;
                
                $source_path = $_FILES['upload']['tmp_name'];
                $destination_path = "upload/product/". $image_name;
    
                $uploadImage = copy($source_path, $destination_path);
                
                if($uploadImage==false){
                    $_SESSION['upload'] = "Failed to Upload Image";
                    header('Location: ' . $siteurl.'admin/manage-product.php');
                    die();
                }

                if($current_image != ""){

                    $remove_path = "upload/product/".$current_image;
                    $remove = unlink($remove_path);
                
                    if($remove == false){

                        $_SESSION['f-remove-img'] = "Failed to remove current images";
                        header($siteurl.'admin/manage-product.php');
                        die();
                    }

                }

            } else {

                $image_name = $current_image;

            }

        } else {

            $image_name = $current_image;

        }

        
        $sql = "UPDATE tbl_food SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = '$category', 
                featured = '$featured',
                active = '$active'
                WHERE id=$id
        ";

        $res = mysqli_query($conn, $sql);

        if($res==true){

            $_SESSION['update-prod'] = "Product Updated Successfully";
            Redirect($siteurl.'admin/manage-product.php');

        } else {

            $_SESSION['update-prod'] = "Failed to Update";
            Redirect($siteurl.'admin/update-product.php?id='.$id);

        }



    }