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
function active($currect_page){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
        $url = end($url_array);  
        if($currect_page == $url){
            echo 'active'; //class name in css 
        } 
  }

function Redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }