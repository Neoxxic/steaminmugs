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
function active($currect_page)
{
    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($currect_page == $url) {
        echo 'active'; //class name in css 
    }
}

function Redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}


function get_num_of_words($string)
{
    $str = trim($string);
    while (substr_count($str, "  ") > 0) {
        $str = str_replace("  ", " ", $str);
    }
    return substr_count($str, " ") + 1;
}



// ADD TO CART
if (isset($_POST['add-to-cart'])) {
    $id = $_POST['id'];
    $temp_id = rand(0, 9999) * rand(0, 9999);
    $product = $_POST['product'];
    $product_img = $_POST['food_img'];
    $price = $_POST['price'];
    $qty = $_POST['quantity'];
    $size = $_POST['size'];
    $order_date = date('Y-m-d h:i:s');
    $status = "Add-to-cart";
    $total = $price * $qty;
    $fullname = "None";
    $email = "None";
    $phone = "None";
    $address = "None";
    $payment = "None";

    $sql4 = "INSERT INTO tbl_order SET
            temp_id = $temp_id,
            food = '$product',
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


    $res4 = mysqli_query($conn, $sql4);

    if ($res4 == true) {

        Redirect($siteurl . 'checkout.php?order_temp_id=' . $temp_id);
    } else {

        Redirect($siteurl . 'product-single.php?product_id=' . $id);
    }
}


//PLACE ORDER
if (isset($_POST['place-order'])) {
    $temp_id = $_POST['temp_id'];
    $id = $_POST['id'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $size = $_POST['size'];
    $order_date = date('Y-m-d H:i:s');
    $status = "order-complete";
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $country = $_POST['country'];
    $street = $_POST['street'];
    $unit = $_POST['unit'];
    $postal = $_POST['postal'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $total = $_POST['total'];

    $fullname = $fname . ' ' . $lname;
    $address = $street . ' ' . $unit . ' ' . $postal . ' ' . $country;

    $mop = $_POST['payment'];

    if ($mop == "cod") {

        $payment = "Cash on delivery";
    } elseif ($mop == "bank") {

        $payment = "Bank Transfer";
    } elseif ($mop == "gcash") {

        $payment = "Gcash";
    }

    $sql = "UPDATE tbl_order SET 
                food = '$product',
                price = $price,
                size = '$size',
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status',
                customer_name = '$fullname',
                customer_contact = '$phone',
                customer_email = '$email',
                customer_address = '$address',
                payment_method = '$payment'
                WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        $_SESSION['order-complete'] = "Order Complete";
        Redirect($siteurl . 'index.php');
    } else {

        $_SESSION['f-to-order'] = "Order failed";
        Redirect($siteurl . 'cheekout.php?order_temp_id=' . $temp_id);
    }
}

//APPOINTMENT
if (isset($_POST['book-me'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fullname = $fname . ' ' . $lname;
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $status = $_POST['status'];
    $book_date = date('Y-m-d h:i:s');
    $setTime = strtotime($time);
    $data_bd = date("H:i:s", $setTime);

    $sql = "INSERT INTO tbl_booking SET
            name = '$fullname',
            date = '$date',
            time = '$data_bd',
            phone = '$phone',
            message = '$message',
            status = '$status',
            book_date = '$book_date'
            ";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        $_SESSION['order-complete'] = "Booking Complete";
        Redirect($siteurl . 'index.php');
    } else {

        $_SESSION['order-complete'] = "Failed to book";
        Redirect($siteurl . 'contact.php');
    }
}

//CONTACT US
if (isset($_POST['contact-us'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $date =  date('Y-m-d h:i:s');

    $sql = "INSERT INTO tbl_messages SET
            name = '$name',
            email = '$email',
            subject = '$subject',
            message = '$message',
            date = '$date'
            ";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        $_SESSION['message-sent'] = "Message Sent";
        Redirect($siteurl . 'index.php');
    } else {

        $_SESSION['message-sent'] = "Failed to send message";
        Redirect($siteurl . 'contact.php');
    }
}

//COMMENT
if (isset($_POST['comment'])){
    $blog_id = $_POST['blog_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date = date('Y-m-d h:i:s');
    $active = "Yes";

    $sql = "INSERT INTO tbl_comment SET
            name = '$name',
            email = '$email',
            message = '$message',
            active = '$active',
            blog_id = '$blog_id',
            date = '$date'
            ";

    $res = mysqli_query($conn, $sql);

    if($res == True){

        $_SESSION['comment'] = "Comment Posted";
        Redirect($siteurl . 'blog-single.php?blog_id='.$blog_id);

    } else {

        $_SESSION['comment'] = "Failed To Comment";
        Redirect($siteurl . 'blog.php');

    }


}
