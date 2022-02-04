<?php

session_start();

//DATABASE CONFIG
$siteurl = 'http://localhost:8080/steaminmugs/';
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'steaminmugs';

$conn = mysqli_connect($servername, $username, $password);
$db_select = mysqli_select_db($conn, $dbname);


// FUNCTION
function Redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

//LOGIN
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {

        $_SESSION['login'] = "Login Successful";
        $_SESSION['user'] = $username;

        Redirect($siteurl . 'admin/index.php');
    } else {

        $_SESSION['f-login'] = "Login Failed! Please Try Again";
        Redirect($siteurl . 'admin/login.php');
    }
}

//ADD ADMIN
if (isset($_POST['submit'])) {

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $admin_info = $_POST['admin_info'];

    if (isset($_FILES['upload']['name'])) {

        $image_name = $_FILES['upload']['name'];

        if ($image_name != "") {

            $ext = pathinfo($image_name, PATHINFO_EXTENSION);

            $image_name = "Admin-Image_" . time() . '.' . $ext;

            $source_path = $_FILES['upload']['tmp_name'];
            $destination_path = "upload/admin/" . $image_name;

            $uploadImage = copy($source_path, $destination_path);

            if ($uploadImage == false) {

                $_SESSION['upload-admin'] = "Failed to Upload Image";
                header('Location: ' . $siteurl . 'admin/add-admin.php');
                die();
            }
        }
    } else {

        $image_name = "";
    }

    if($_SESSION['user'] == "Admin" || $_SESSION['user'] == "Shin" ){

        $sql = "INSERT INTO tbl_admin SET
                full_name='$full_name',
                admin_img='$image_name',
                admin_info='$admin_info',
                username='$username',
                password='$password'
                ";


        $res = mysqli_query($conn, $sql);
        //Checker
        if ($res == TRUE) {
            $_SESSION['add'] = "Admin added successfully";
            Redirect($siteurl . 'admin/manage-admins.php');
        } else {
            $_SESSION['add'] = "Failed to Add New Admin";
            Redirect($siteurl . 'admin/add-admin.php');
        }

    } else {

        $_SESSION['add'] = "You don't have enough permission to Add New Admin.";
        Redirect($siteurl . 'admin/add-admin.php');

    }

    
}

//UPDATE ADMIN
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $admin_info = $_POST['admin_info'];

    if (isset($_FILES['upload']['name'])) {

        $image_name = $_FILES['upload']['name'];

        if ($image_name != "") {

            $ext = pathinfo($image_name, PATHINFO_EXTENSION);

            $image_name = "Admin-Image_" . time() . '.' . $ext;

            $source_path = $_FILES['upload']['tmp_name'];
            $destination_path = "upload/admin/" . $image_name;

            $uploadImage = copy($source_path, $destination_path);

            if ($uploadImage == false) {

                $_SESSION['upload-admin'] = "Failed to Upload Image";
                header('Location: ' . $siteurl . 'admin/update-admin.php');
                die();
            }
        }
    } else {

        $image_name = "";
    }

    if($_SESSION['user'] == "Admin" || $_SESSION['user'] == "Shin" || $_SESSION['user'] == $username ) {


        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        admin_img = '$image_name',
        admin_info = '$admin_info',
        username = '$username'
        WHERE id='$id'
        ";

        $res = mysqli_query($conn, $sql);

        if ($res == TRUE) {

            $_SESSION['update'] = "Admin Update Successfully";
            Redirect($siteurl . 'admin/manage-admins.php');
            } else {

            $_SESSION['update'] = "Failed to Update the Admin";
            Redirect($siteurl . 'admin/update-admin.php');
            }

    } else {

        $_SESSION['update'] = "You don't have enough permission to Update Other Admin.";
        Redirect($siteurl . 'admin/update-admin.php?id='.$id);

    }

   
}

//CHANGE PASSWORD ADMIN
if (isset($_POST['change'])) {

    $id = $_POST['id'];
    $username = $_POST['username'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    if($_SESSION['user'] == "Admin" || $_SESSION['user'] == "Shin" || $_SESSION['user'] == $username) {

        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        $res = mysqli_query($conn, $sql);

        if ($res == TRUE) {

            $count = mysqli_num_rows($res);

            if ($count == 1) {


                if ($new_password == $confirm_password) {

                    $sql2 = "UPDATE tbl_admin SET
                                password='$new_password'
                                WHERE id=$id
                                ";

                    $res2 = mysqli_query($conn, $sql2);

                    if ($res2 == TRUE) {

                        $_SESSION['change-pwd'] = "Password Change Successfully";
                        Redirect($siteurl . 'admin/manage-admins.php');
                    } else {

                        $_SESSION['f-change-pwd'] = "Failed to Change Password";
                        Redirect($siteurl . 'admin/update-password.php?id=' . $id);
                    }
                } else {

                    $_SESSION['pwd-not-match'] = "Password Does Not Match";
                    Redirect($siteurl . 'admin/update-password.php?id=' . $id);
                }
            } else {

                $_SESSION['user-not-found'] = "User not Found";
                Redirect($siteurl . 'admin/manage-admins.php');
            }
        }

    } else {

        $_SESSION['permission'] = "You don't have permission to change password of other Admin.";
        Redirect($siteurl . 'admin/update-password.php');

    }

    
}

//ADD CATEGORY
if (isset($_POST['add-categ'])) {

    $title = $_POST['title'];

    if (isset($_POST['featured'])) {

        $featured = $_POST['featured'];
    } else {

        $featured = "No";
    }

    if (isset($_POST['active'])) {

        $active = $_POST['active'];
    } else {

        $active = "No";
    }


    if (isset($_FILES['upload']['name'])) {

        $image_name = $_FILES['upload']['name'];
        $ext = end(explode('.', $image_name));
        $max_size = 1000000;
        $whitelist_ext = array('jpeg', 'jpg', 'png', 'gif');

        if ($image_name != "") {

            if (!in_array($ext, $whitelist_ext)) {
                $_SESSION['error-add-category'] = "Invalid File Extension";
                Redirect($siteurl . 'admin/add-category.php');
            }
            if ($_FILES[$image_name]["size"] > $max_size) {
                $_SESSION['error-add-category'] = "File is too Big";
                Redirect($siteurl . 'admin/add-category.php');
            }

            $image_name = "Food_Category_" . time() . '.' . $ext;

            $source_path = $_FILES['upload']['tmp_name'];
            $destination_path = "upload/category/" . $image_name;

            $uploadImage = copy($source_path, $destination_path);

            if ($uploadImage == false) {

                $_SESSION['upload'] = "Failed to Upload Image";
                header('Location: ' . $siteurl . 'admin/add-category.php');
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

    if ($res == True) {

        $_SESSION['add-category'] = "Category Added Successfully";
        Redirect($siteurl . 'admin/manage-category.php');
    } else {

        $_SESSION['add-category'] = "Failed to Add New Category";
        Redirect($siteurl . 'admin/add-category.php');
    }
}

//UPDATE CATEGORY
if (isset($_POST['update-categ'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];


    if (isset($_FILES['new-upload']['name'])) {

        $image_name = $_FILES['new-upload']['name'];

        if ($image_name != "") {

            $ext = pathinfo($image_name, PATHINFO_EXTENSION);

            $image_name = "Food_Category_" . time() . '.' . $ext;

            $source_path = $_FILES['new-upload']['tmp_name'];
            $destination_path = "upload/category/" . $image_name;

            $uploadImage = copy($source_path, $destination_path);

            if ($uploadImage == false) {
                $_SESSION['upload'] = "Failed to Upload Image";
                header('Location: ' . $siteurl . 'admin/manage-category.php');
                die();
            }

            if ($current_image != "") {

                $remove_path = "upload/category/" . $current_image;
                $remove = unlink($remove_path);

                if ($remove == false) {

                    $_SESSION['f-remove-img'] = "Failed to remove current images";
                    header($siteurl . 'admin/manage-category.php');
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

    if ($res == true) {

        $_SESSION['update-categ'] = "Category Updated Successfully";
        Redirect($siteurl . 'admin/manage-category.php');
    } else {

        $_SESSION['update-categ'] = "Failed to Update";
        Redirect($siteurl . 'admin/update-category.php');
    }
}

//ADD PRODUCT
if (isset($_POST['add-prod'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    if (isset($_POST['featured'])) {

        $featured = $_POST['featured'];
    } else {

        $featured = "No";
    }

    if (isset($_POST['active'])) {

        $active = $_POST['active'];
    } else {

        $active = "No";
    }

    if (isset($_FILES['upload']['name'])) {

        $image_name = $_FILES['upload']['name'];

        if ($image_name != "") {

            $ext = pathinfo($image_name, PATHINFO_EXTENSION);

            $image_name = "Product-Name_" . time() . '.' . $ext;

            $source_path = $_FILES['upload']['tmp_name'];
            $destination_path = "upload/product/" . $image_name;

            $uploadImage = copy($source_path, $destination_path);

            if ($uploadImage == false) {

                $_SESSION['upload-prod'] = "Failed to Upload Image";
                header('Location: ' . $siteurl . 'admin/add-product.php');
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

    if ($res == true) {

        $_SESSION['add-product'] = "Product Added Successfully";
        Redirect($siteurl . 'admin/manage-product.php');
    } else {

        $_SESSION['add-product'] = "Failed to add product";
        Redirect($siteurl . 'admin/add-product.php');
    }
}

//UPDATE PRODUCT
if (isset($_POST['update-prod'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];


    if (isset($_FILES['upload']['name'])) {

        $image_name = $_FILES['upload']['name'];

        if ($image_name != "") {

            $ext = pathinfo($image_name, PATHINFO_EXTENSION);

            $image_name = "Product-Name_" . time() . '.' . $ext;

            $source_path = $_FILES['upload']['tmp_name'];
            $destination_path = "upload/product/" . $image_name;

            $uploadImage = copy($source_path, $destination_path);

            if ($uploadImage == false) {
                $_SESSION['upload'] = "Failed to Upload Image";
                header('Location: ' . $siteurl . 'admin/manage-product.php');
                die();
            }

            if ($current_image != "") {

                $remove_path = "upload/product/" . $current_image;
                $remove = unlink($remove_path);

                if ($remove == false) {

                    $_SESSION['f-remove-img'] = "Failed to remove current images";
                    header($siteurl . 'admin/manage-product.php');
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

    if ($res == true) {

        $_SESSION['update-prod'] = "Product Updated Successfully";
        Redirect($siteurl . 'admin/manage-product.php');
    } else {

        $_SESSION['update-prod'] = "Failed to Update";
        Redirect($siteurl . 'admin/update-product.php?id=' . $id);
    }
}

//UPDATE ORDER
if (isset($_POST['update-order'])) {

    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE tbl_order SET 
                customer_name = '$fullname',
                customer_contact = '$phone',
                customer_email = '$email',
                customer_address = '$address'
                WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        $_SESSION['update-order'] = "<div class='alert alert-success'>
                                        Order Updated Successfully
                                    </div>";
        Redirect($siteurl . 'admin/manage-orders.php');
    } else {

        $_SESSION['update-order'] = "<div class='alert alert-danger'>
                                        Failed to Update
                                    </div>";
        Redirect($siteurl . 'admin/manage-orders.php');
    }
}

//ADD ORDER
if (isset($_POST['add-order'])) {

    $temp_id = rand(0, 9999) * rand(0, 9999);
    $title = $_POST['product'];
    $product_image = $_POST['image'];
    $qty = $_POST['qty'];
    $size = $_POST['size'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $price = $_POST['price'];
    $total = $qty * $price;
    $order_date = date('Y-m-d h:i:s');
    $status = "order-complete";


    $mop = $_POST['payment'];

    if ($mop == "cod") {

        $payment = "Cash on delivery";
    } elseif ($mop == "bank") {

        $payment = "Bank Transfer";
    } elseif ($mop == "gcash") {

        $payment = "Gcash";
    }

    $sql = "INSERT INTO tbl_order SET
            temp_id = $temp_id,
            food = '$title',
            food_img = '$product_img',
            price = $price,
            qty = $qty,
            size = '$size',
            total = $total,
            order_date = '$order_date',
            status = '$status',
            customer_name = '$fullname',
            customer_contact = '$phone',
            customer_email = '$email',
            customer_address = '$address',
            payment_method = '$payment'
            ";

    $res = mysqli_query($conn, $sql);

    if ($res == True) {

        $_SESSION['add-order'] = "<div class='alert alert-success'>
                                        Order Added Successfully
                                    </div>";
        Redirect($siteurl . 'admin/manage-orders.php');
    } else {

        $_SESSION['add-order'] = "<div class='alert alert-danger'>
                                        Failed to add Ordef
                                    </div>";
        Redirect($siteurl . 'admin/manage-orders.php');
    }
}

//UPDATE BOOKING
if (isset($_POST['update-booking'])) {
    $id = $_POST['id'];
    $name = $_POST['fullname'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "UPDATE tbl_booking SET
            name = '$name',
            date = '$date',
            time = '$time',
            phone = '$phone',
            message = '$message'
            WHERE id=$id
            ";

    $res = mysqli_query($conn, $sql);


    if ($res == true) {

        $_SESSION['update-booking'] = "<div class='alert alert-success'>
                                        Appointment Updated Successfully
                                    </div>";
        Redirect($siteurl . 'admin/manage-booking.php');
    } else {

        $_SESSION['update-booking'] = "<div class='alert alert-danger'>
                                       Failed to Update Appointment
                                    </div>";
        Redirect($siteurl . 'admin/manage-booking.php');
    }
}

//ADD BOOKING
if (isset($_POST['add-appointment'])) {

    $name = $_POST['fullname'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $status = $_POST['status'];


    $sql = "INSERT INTO tbl_booking SET
            name = '$name',
            date = '$date',
            time = '$time',
            phone = '$phone',
            message = '$message',
            status = '$status'
            
            ";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        $_SESSION['add-booking'] = "<div class='alert alert-success'>
                                        Appointment Added Successfully
                                    </div>";
        Redirect($siteurl . 'admin/manage-booking.php');
    } else {

        $_SESSION['add-booking'] = "<div class='alert alert-danger'>
                                        Failed to Add Appointment
                                    </div>";
        Redirect($siteurl . 'admin/manage-booking.php');
    }
}

//ADD BlOG
if (isset($_POST['add-blog'])) {

    $blog_title = $_POST['title'];
    $content1 = $_POST['description1'];
    $content2 = $_POST['description2'];

    if (isset($_POST['featured'])) {

        $featured = $_POST['featured'];
    } else {

        $featured = "No";
    }

    if (isset($_POST['active'])) {

        $active = $_POST['active'];
    } else {

        $active = "No";
    }

    $admin_id = $_POST['id'];
    $date_posted = date('Y-m-d h:i:s');

    if (isset($_FILES['upload1']['name'])) {

        $image_1 = $_FILES['upload1']['name'];

        if ($image_1 != "") {

            $ext = pathinfo($image_1, PATHINFO_EXTENSION);

            $image_1 = "Blog-Image_1" . time() . '.' . $ext;

            $source_path = $_FILES['upload1']['tmp_name'];
            $destination_path = "upload/blog/" . $image_1;

            $uploadImage = copy($source_path, $destination_path);

            if ($uploadImage == false) {

                $_SESSION['upload-blog'] = "Failed to Upload Image";
                header('Location: ' . $siteurl . 'admin/add-blog.php');
                die();
            }
        }
    } else {

        $image_1 = "";
    }

    if (isset($_FILES['upload2']['name'])) {

        $image_2 = $_FILES['upload2']['name'];

        if ($image_2 != "") {

            $ext = pathinfo($image_2, PATHINFO_EXTENSION);

            $image_2 = "Blog-Image_2" . time() . '.' . $ext;

            $source_path = $_FILES['upload2']['tmp_name'];
            $destination_path = "upload/blog/" . $image_2;

            $uploadImage = copy($source_path, $destination_path);

            if ($uploadImage == false) {

                $_SESSION['upload-blog'] = "Failed to Upload Image";
                header('Location: ' . $siteurl . 'admin/add-blog.php');
                die();
            }
        }
    } else {

        $image_2 = "";
    }


    $sql = "INSERT INTO tbl_blog SET
            blog_title = '$blog_title',
            content_1 = '$content1',
            image_1 = '$image_1',
            content_2 = '$content2',
            image_2 = '$image_2',
            featured = '$featured',
            active = '$active',
            admin_id = '$admin_id',
            date_posted = '$date_posted'
            ";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        $_SESSION['add-blog'] = "<div class='alert alert-success'>
                                       Blog Added Successfully
                                    </div>";
        Redirect($siteurl . 'admin/manage-blogs.php');
    } else {

        $_SESSION['add-blog'] = "<div class='alert alert-danger'>
                                       Failed to Add Blog
                                    </div>";
        Redirect($siteurl . 'admin/add-blog.php');
    }
}

//UPDATE BLOG
if (isset($_POST['update-blog'])) {
    $id = $_POST['id'];
    $blog_title = $_POST['title'];
    $content1 = $_POST['description1'];
    $content2 = $_POST['description2'];
    $current_image1 = $_POST['current_image1'];
    $current_image2 = $_POST['current_image2'];

    if (isset($_POST['featured'])) {

        $featured = $_POST['featured'];
    } else {

        $featured = "No";
    }

    if (isset($_POST['active'])) {

        $active = $_POST['active'];
    } else {

        $active = "No";
    }

    $admin_id = $_POST['admin_id'];
    $date_posted = date('Y-m-d h:i:s');

    if (isset($_FILES['upload1']['name'])) {

        $image_name = $_FILES['upload1']['name'];

        if ($image_name != "") {

            $ext = pathinfo($image_name, PATHINFO_EXTENSION);

            $image_name = "Blog-Image_1" . time() . '.' . $ext;

            $source_path = $_FILES['upload1']['tmp_name'];
            $destination_path = "upload/blog/" . $image_name;

            $uploadImage = copy($source_path, $destination_path);

            if ($uploadImage == false) {
                $_SESSION['upload'] = "Failed to Upload Image";
                header('Location: ' . $siteurl . 'admin/manage-blogs.php');
                die();
            }

            if ($current_image1 != "") {

                $remove_path = "upload/blog/" . $current_image1;
                $remove = unlink($remove_path);

                if ($remove == false) {

                    $_SESSION['f-remove-img'] = "Failed to remove current images";
                    header($siteurl . 'admin/manage-blogs.php');
                    die();
                }
            }
        } else {

            $image_name = $current_image1;
        }
    } else {

        $image_name = $current_image1;
    }
    
    if (isset($_FILES['upload2']['name'])) {

        $image_name2 = $_FILES['upload2']['name'];

        if ($image_name2 != "") {

            $ext = pathinfo($image_name2, PATHINFO_EXTENSION);

            $image_name2 = "Blog-Image_2" . time() . '.' . $ext;

            $source_path = $_FILES['upload2']['tmp_name'];
            $destination_path = "upload/blog/" . $image_name2;

            $uploadImage = copy($source_path, $destination_path);

            if ($uploadImage == false) {
                $_SESSION['upload'] = "Failed to Upload Image";
                header('Location: ' . $siteurl . 'admin/manage-blogs.php');
                die();
            }

            if ($current_image2 != "") {

                $remove_path = "upload/blog/" . $current_image2;
                $remove = unlink($remove_path);

                if ($remove == false) {

                    $_SESSION['f-remove-img'] = "Failed to remove current images";
                    header($siteurl . 'admin/manage-blogs.php');
                    die();
                }
            }
        } else {

            $image_name2 = $current_image2;
        }
    } else {

        $image_name2 = $current_image2;
    }
    

    $sql = "UPDATE tbl_blog SET
        blog_title = '$blog_title',
        content_1 = '$content1',
        image_1 = '$image_name',
        content_2 = '$content2',
        image_2 = '$image_name2',
        featured = '$featured',
        active = '$active',
        admin_id = '$admin_id',
        date_posted = '$date_posted'
        WHERE id=$id
    ";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        $_SESSION['add-blog'] = "<div class='alert alert-success'>
                               Blog Added Successfully
                            </div>";
        Redirect($siteurl . 'admin/manage-blogs.php');
    } else {

        $_SESSION['add-blog'] = "<div class='alert alert-danger'>
                               Failed to Add Blog
                            </div>";
        Redirect($siteurl . 'admin/add-blog.php');
    }
}
