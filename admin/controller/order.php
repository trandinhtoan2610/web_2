<?php
    // order
    if(isset($_GET['page']) && $_GET['page']=="order"){
        $result = getAllOrder();
        $pageTitle = "page=order";
        $title = "Đơn hàng";
        require_once 'view/order.php';
    }

    // open-detail-order
    if(isset($_GET['page']) && $_GET['page']=="detail_order"){
        $result = getOrderByID($_GET['idDH']);
        $sanpham = getOrderDetailByID($_GET['idDH']);
        extract($result);
        $title = "Đơn hàng";
        require_once('view/detail_order.php');
    }

    // open-edit-order-form
    if(isset($_GET['page']) && $_GET['page']=="edit_order"){
        $result = getOrderByID($_GET['idDH']);
        $sanpham = getOrderDetailByID($_GET['idDH']);
        extract($result);
        $title = "Đơn hàng";
        require_once('view/edit_order.php');
    }

    // update-order
    if(isset($_POST['edit-order-btn'])){
        include '../../lib/connect.php';
        include '../model/order.php';
        $idDH = $_POST['idDH'];
        $trangthai = $_POST['trangthai'];
        editOrder($idDH, $trangthai, date('Y-m-d'));
        echo json_encode(array('success'=>true, 'ngaycapnhat' => date('d-m-Y')));
    }

    // search-order
    if(isset($_GET['page']) && $_GET['page']=="search_order"){

        if(isset($_POST['search-order-btn']))
            $_SESSION['search_order'] = searchOrder($_POST['trangthai'], $_POST['start'], $_POST['end']);

        // hien thi ket qua tim kiem
        $result = $_SESSION['search_order'];
        $pageTitle = "page=search_order";
        $title = "Đơn hàng";
        require 'view/order.php';
    }
?>