<?php
if(isset($_GET['tenHSX']) && isset($_GET['idHSX'])){
    $result = getProductByCategory($_GET['idHSX']);
    $category = getAllCategory();
    $pageTitle= 'page=category&tenHSX='.$_GET["tenHSX"].'&idHSX='.$_GET["idHSX"];
    require_once 'view/home.php';
}
?>