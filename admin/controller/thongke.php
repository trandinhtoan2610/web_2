<?php
    // thongke
    if(isset($_GET['page']) && $_GET['page']=="thongke"){
        $title = "Thống kê";
        require_once 'view/thongke.php';
    }

    // search-thongke
    if(isset($_GET['page']) && $_GET['page']=="search_thongke"){
        if(isset($_POST['search-thongke-btn']) || (isset($_GET['start']) && isset($_GET['end']))){
            if(isset($_POST['search-thongke-btn'])){
                if(isset($_POST['start']) && isset( $_POST['end'])){
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $tmp = $end;
                    if($tmp == "") $tmp = date('Y-m-d');
                    $startShow = date("d/m/Y", strtotime($_POST['start']));
                    $endShow = date("d/m/Y", strtotime($tmp));
                }
            }
            else{
                $start = $_GET['start'];
                $end = $_GET['end'];
                $tmp = $end;
                if($tmp == "") $tmp = date('Y-m-d');
                $startShow = date("d/m/Y", strtotime($_GET['start']));
                $endShow = date("d/m/Y", strtotime($tmp));;
            }
            
                $result = top5Customer($start, $end);
                $title = "Thống kê";
                require 'view/thongke_search.php';
        }
        else{
            $title = "Thống kê";
            require_once 'view/thongke.php';
        }
        
    }

    // open-detail-thongke
    if(isset($_GET['page']) && $_GET['page']=="detail_thongke"){
        $result = getOrderByThongKe($_GET['idTK'], $_GET['start'], $_GET['end']);
        extract($result);
        $title = "Thống kê";
        require_once('view/detail_thongke.php');
    }

    // open-detail-order
    if(isset($_GET['page']) && $_GET['page']=="detail_order_thongke"){
        $result = getOrderByID($_GET['idDH']);
        $sanpham = getOrderDetailByID($_GET['idDH']);
        extract($result);
        $title = "Thống kê";
        require_once('view/detail_order_thongke.php');
    }
?>