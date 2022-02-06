<?php

    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);

    switch($url){
        case '':
            $header_title = "Steamin'Mugs - Home";
            break;
        case 'index.php':
            $header_title = "Steamin'Mugs - Home";
            break;
        case 'menu.php':
            $header_title = "Steamin'Mugs - Menu";
            break;
        case 'services.php':
            $header_title = "Steamin'Mugs - Services";
            break;
        case 'blog.php':
            $header_title = "Steamin'Mugs - Blog";
            break;    
        case 'about.php':
            $header_title = "Steamin'Mugs - About";
            break;
        case 'shop.php':
            $header_title = "Steamin'Mugs - Shop";
            break;
        case 'contact.php':
            $header_title = "Steamin'Mugs - Contact";
            break;
        case 'cart.php':
            $header_title = "Steamin'Mugs - Cart";
            break;
        default:
            $header_title = "Steamin'Mugs";
             
    }