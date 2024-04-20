<?php
    if(isset($_GET['idSP'])){
        $result = getProductById($_GET['idSP']);
        extract($result);
        $hangsanxuat = getCategoryById($result['idHSX'])['tenHSX'];
        require_once 'view/productDetail.php';
    }
?>