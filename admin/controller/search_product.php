<?php
    // tim kiem
    if(isset($_POST['search-product-btn']))
        $_SESSION['search_product'] = searchProduct($_POST['kyw']);
    
    // hien thi ket qua tim kiem
    if($_SESSION['search_product']==null){
        $kyw = $_POST['kyw'];
        $title = "Sản phẩm";
        require 'view/noFound.php';
    }
    else{
        $result = $_SESSION['search_product'];
        $pageTitle = "page=search_product";
        $title = "Sản phẩm";
        require 'view/product.php';
    }
?>