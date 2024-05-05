<?php
include '../lib/connect.php';
include 'model/user.php';
include 'model/product.php';
include 'model/category.php';
include 'model/order.php';

session_start();
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        /* product */
        case 'product':

        case 'add_product':
            
        case 'detail_product':

        case 'edit_product':

        case 'search_product':
            require "controller/product.php";
            break;
        /* product */

        /* user */
        case 'user':

        case 'add_user':

        case 'detail_user':
            
        case 'edit_user':

        case 'search_user':
            require "controller/user.php";
            break;
        /* user */

        /* category */
        case 'category':
            
        case 'add_category':
           
        case 'detail_category':

        case 'edit_category':

        case 'search_category':
            require "controller/category.php";
            break;
        /* category */

        /* order */
        case 'order':
            
        case 'detail_order':

        case 'edit_order':

        case 'search_order':
            require "controller/order.php";
            break;
        /* order */

        /* thong ke */
        case 'thongke':

        case 'detail_thongke':

        case 'search_thongke':

        case 'detail_order_thongke':
            require "controller/thongke.php";
            break;
        /* thong ke */

        /* dang nhap */
        case 'signIn':
            require "controller/signIn.php";
            break;
        /* dang nhap */

        case 'logout':
            require 'controller/logout.php';
            break;
            
        default: 
            header('location: ?page=product');
            break;
    }
}
else header('location: ?page=signIn');
?>