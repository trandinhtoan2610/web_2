<?php
include 'lib/connect.php';
include 'model/product.php';
include 'model/category.php';
session_start();
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
            
        default: 
            require "controller/home.php";
            break;
    }
}
else{
    require "controller/home.php";
}

?>