<?php
// them san pham vao gio hang
    if(isset($_POST['add-to-cart'])){
        include '../lib/connect.php';
        include '../model/product.php';
        include '../model/category.php';
        session_start();

        if(!isset($_SESSION['idTK'])) echo json_encode(array('success'=>false));
        else{
            // Kiểm tra nếu giỏ hàng không tồn tại, tạo mới
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart']['items'] = [];
                $_SESSION['cart']['tongtien'] = 0;
            }
            $idSP = $_POST['idSP'];
            $giaban = $_POST['giaban'];
            $tonkho = getTonKhoByID($idSP)['tonkho'];
            if (array_key_exists($idSP, $_SESSION['cart']['items'])) {
                // Nếu có, cập nhật số lượng
                $_SESSION['cart']['items'][$idSP]['soluong'] ++;
            } else{
                // Nếu không, thêm mới vào giỏ hàng
                $_SESSION['cart']['items'][$idSP]= array(
                'hinhanh' => $_POST['hinhanh'],
                'tenSP' => $_POST['tenSP'],
                'giaban' => $_POST['giaban'],
                'soluong' => 1,
                'tonkho' => $tonkho,
                );
            }
            $_SESSION['cart']['tongtien'] += $_SESSION['cart']['items'][$idSP]['giaban'];
            echo json_encode(array('success'=>true));
        }
    }

// hien thi gio hang
    if(isset($_GET['page']) && $_GET['page'] == 'giohang' && !isset($_POST['add-to-cart']) &&!isset($_POST['update-cart']) && !isset($_POST['payment-btn'])){
        if(isset($_SESSION['idTK'])){
            $account = getUserByID($_SESSION['idTK']);
            require_once 'view/giohang.php';
        }
        else header('location: ?page=signIn');
    }

// cap nhat gio hang
    if(isset($_POST['update-cart'])){
        session_start();
        $idSP = $_POST['idSP'];
        $empty = false;
        if(isset($_POST['soluong'])) $_SESSION['cart']['items'][$idSP]['soluong'] = $_POST['soluong'];
        if(isset($_POST['minus']))  $_SESSION['cart']['tongtien'] -= $_SESSION['cart']['items'][$idSP]['giaban'];
        if(isset($_POST['plus'])) $_SESSION['cart']['tongtien'] += $_SESSION['cart']['items'][$idSP]['giaban'];
        if(isset($_POST['remove-item'])){
            $_SESSION['cart']['tongtien'] -= $_SESSION['cart']['items'][$idSP]['giaban']*$_SESSION['cart']['items'][$idSP]['soluong'];
            unset($_SESSION['cart']['items'][$idSP]);
            if($_SESSION['cart']['tongtien']==0) $empty = true;
        }
        echo json_encode(array(
            'success'=>true, 
            'empty'=>$empty,
            'updatepay'=> $_SESSION['cart']['tongtien'],
            'tongtien' => number_format($_SESSION['cart']['tongtien'],0,"",".").'đ',
        ));
    }

// thanh toan
    if(isset($_POST['payment-btn'])){
        include '../lib/connect.php';
        include '../model/order.php';
        include '../model/product.php';
        session_start();

        $thanhtoan = $_POST['thanhtoan'];
        $diachigiao = $_POST['diachigiao'];
        $idTK = $_SESSION['idTK'];
        $tongtien = $_SESSION['cart']['tongtien'];
        $ngaytao = date('Y-m-d');
        $ngaycapnhat = date('Y-m-d');
        if($thanhtoan == "sau"){
            // insert don hang moi
            $idDH = addOrder($idTK, $tongtien, $ngaytao, $ngaycapnhat, $diachigiao, $thanhtoan)["LAST_INSERT_ID()"];
            foreach($_SESSION['cart']['items'] as $idSP => $product){
                addOrderDetailByID($idDH, $idSP, $product['soluong'], $product['giaban']);
                updateTonKhoLuotBan($idSP, $product['soluong']);
            }
            unset($_SESSION['cart']);
            echo json_encode(array('success'=>true,'idDH'=>$idDH));
        }
        else{
            $_SESSION['cart']['diachigiao'] = $diachigiao;
            echo json_encode(array('success'=>false));
        }
    }


// thanh toan online
    if(isset($_GET['page']) && $_GET['page']=='thanhtoanonline'){
        $idTK = $_SESSION['idTK'];
        $tongtien = $_SESSION['cart']['tongtien'];
        $ngaytao = date('Y-m-d');
        $ngaycapnhat = date('Y-m-d');
        $idDH = addOrder($idTK, $tongtien, $ngaytao, $ngaycapnhat, $_SESSION['cart']['diachigiao'], "trc")["LAST_INSERT_ID()"];
        foreach($_SESSION['cart']['items'] as $idSP => $product){
            addOrderDetailByID($idDH, $idSP, $product['soluong'], $product['giaban']);
            updateTonKhoLuotBan($idSP, $product['soluong']);
        }
        unset($_SESSION['cart']);
        header('location: ?page=hoadon&idDH='.$idDH);
    }
?>