<?php
    // tim kiem
    if(isset($_POST['search-category-btn']))
        $_SESSION['search_category'] = searchCategory($_POST['kyw']);
    
    // hien thi ket qua tim kiem
    if($_SESSION['search_category']==null){
        $kyw = $_POST['kyw'];
        $title = "Hãng sản xuất";
        require 'view/noFound.php';
    }
    else{
        $result = $_SESSION['search_category'];
        $pageTitle = "page=search_category";
        $title = "Hãng sản xuất";
        require 'view/category.php';
    }
?>