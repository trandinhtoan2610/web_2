<?php
// tim kiem nang cao
    if(isset($_POST['filter-btn'])){
        $tenSP = $_POST['tenSP'];
        $idHSX = $_POST['idHSX'];
        $priceFrom = $_POST['priceFrom'];
        $priceTo = $_POST['priceTo'];
        $_SESSION['searchResult'] = filterProduct($tenSP, $idHSX, $priceFrom, $priceTo);
    }
// tim kiem co ban
    if(isset($_POST['search-btn']))
        $_SESSION['searchResult'] = searchProduct($_POST['kyw']); 
// hien thi ket qua tim kiem
    $category = getAllCategory();
    if($_SESSION['searchResult']==null) require 'view/noFound.php';
    else{
        $pageTitle="page=search";
        $result = $_SESSION['searchResult'];
        require 'view/home.php';
    }
?>