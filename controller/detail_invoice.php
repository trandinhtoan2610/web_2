<?php
    if(isset($_GET['page']) && $_GET['page']=="ctdonhang"){
        $hoadon = getOrderByID($_GET['idDH']);
        extract($hoadon);
        $sanpham = getOrderDetailByID($_GET['idDH']);
        require_once 'view/detail_invoice.php';
    }
?>