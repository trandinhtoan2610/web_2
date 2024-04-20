<?php
    $result = getProductByID($_GET['idSP']);
    $hangsanxuat = getAllCategory();
    extract($result);
    $title = "Sản phẩm";
    require_once('view/detail_product.php');
?>