<?php
include '../lib/connect.php';
include 'model/user.php';
include 'model/product.php';
include 'model/category.php';

session_start();
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        /* product */
        case 'product':
            require "controller/product.php";
            break;

        case 'add_product':
            require "controller/add_product.php";
            break;
            
        case 'detail_product':
            require "controller/detail_product.php";
            break;

        case 'edit_product':
            require "controller/edit_product.php";
            break;

        case 'search_product':
            require "controller/search_product.php";
            break;
        /* product */

        /* user */
        case 'user':
            require "controller/user.php";
            break;

        case 'add_user':
            require "controller/add_user.php";
            break;
            
        case 'detail_user':
            require "controller/detail_user.php";
            break;

        case 'edit_user':
            require "controller/edit_user.php";
            break;

        case 'search_user':
            require "controller/search_user.php";
            break;
        /* user */

        /* category */
        case 'category':
            require "controller/category.php";
            break;

        case 'add_category':
            require "controller/add_category.php";
            break;
            
        case 'detail_category':
            require "controller/detail_category.php";
            break;

        case 'edit_category':
            require "controller/edit_category.php";
            break;

        case 'search_category':
            require "controller/search_category.php";
            break;
        /* category */

        default: 
            require "controller/product.php";
            break;
    }
}
else require "controller/product.php";

?>