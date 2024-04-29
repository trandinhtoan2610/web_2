<?php
include 'lib/connect.php';
include 'model/product.php';
include 'model/category.php';
include 'model/user.php';
include 'model/order.php';

session_start();
// unset($_SESSION['cart']);
$_SESSION['idTK'] = 40; // test

if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'home':
            require "controller/home.php";
            break;
        
        case 'category':
            require 'controller/category.php';
            break;

        case 'advSrch':
            require 'controller/advSrch.php';
            break;

        case 'search':
            require 'controller/search.php';
            break;
        
        case 'productDetail':
            require 'controller/productDetail.php';
            break;
            
        case 'giohang':
            require 'controller/cart.php';
            break;

        case 'hoadon':
            require 'controller/hoadon.php';
            break;
        
        case 'thanhtoanonline':
            require 'controller/cart.php';
            break;

        default: 
            require "controller/home.php";
            break;
    }
}
else{
    require "controller/home.php";
}

?>