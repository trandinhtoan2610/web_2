<?php
    // product
    if(isset($_GET['page']) && $_GET['page']=="product"){
        $result = getAllProduct();
        $pageTitle = "page=product";
        $title = "Sản phẩm";
        require_once 'view/product.php';
    }

    // open-add-product-form
    if(isset($_GET['page']) && $_GET['page']=="add_product"){
        $hangsanxuat = getAllCategoryActive();
        $title = "Sản phẩm";
        require_once('view/add_product.php');
    }

    // add-product
    if(isset($_POST['add-product-btn'])){
        include '../../lib/connect.php';
        include '../model/product.php';
        //avata
        $images = $_FILES['input_file']['name'];
        $tmp_dir = $_FILES['input_file']['tmp_name'];
        $imageSize = $_FILES['input_file']['size'];
    
        if($imageSize===0){
            $picProfile="pic.png";
        }
        else{
        $upload_dir='../../uploads/uploads_product/';
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picProfile = rand(1000, 1000000).'.'.$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        }
        $tenSP = $_POST['tenSP'];
        $idHSX = $_POST['idHSX'];
        $giaban = $_POST['giaban'];
        $tonkho = $_POST['tonkho'];
        $cpu = $_POST['cpu'];
        $card = $_POST['card'];
        $pin = $_POST['pin'];
        $ram = $_POST['ram'];
        $mota = $_POST['mota'];
        if(!isProductExist($tenSP, $idHSX, $giaban)){
            addProduct($picProfile, $tenSP, $idHSX, $giaban, $tonkho, $cpu, $card, $pin, $ram, $mota);
            echo json_encode(array('success'=>true));
        }
        else echo json_encode(array('success'=>false));
    }

    // open-detail-product
    if(isset($_GET['page']) && $_GET['page']=="detail_product"){
        $result = getProductByID($_GET['idSP']);
        $hangsanxuat = getCategoryByID($result['idHSX']);
        extract($result);
        $title = "Sản phẩm";
        require_once('view/detail_product.php');
    }

    // open-edit-product-form
    if(isset($_GET['page']) && $_GET['page']=="edit_product"){
        $result = getProductByID($_GET['idSP']);
        $hangsanxuat = getAllCategory();
        extract($result);
        $trangthaiSP = $trangthai;
        $title = "Sản phẩm";
        require_once('view/edit_product.php');
    }

    // update-product
    if(isset($_POST['edit-product-btn'])){
        include '../../lib/connect.php';
        include '../model/product.php';
        //avata
        $images = $_FILES['input_file']['name'];
        $tmp_dir = $_FILES['input_file']['tmp_name'];
        $imageSize = $_FILES['input_file']['size'];
    
        if($imageSize===0){ //khong thay doi
            $picProfile=$_POST['curr_img'];
        }
        else{
        $upload_dir='../../uploads/uploads_product/';
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picProfile = rand(1000, 1000000).'.'.$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        }
    
        $idSP = $_POST['idSP'];
        $tenSP = $_POST['tenSP'];
        $idHSX = $_POST['idHSX'];
        $giaban = $_POST['giaban'];
        $tonkho = $_POST['tonkho'];
        $cpu = $_POST['cpu'];
        $card = $_POST['card'];
        $pin = $_POST['pin'];
        $ram = $_POST['ram'];
        $mota = $_POST['mota'];
        $trangthai = $_POST['trangthai'];
        if(!isProductExist_update($idSP, $tenSP, $idHSX, $giaban)){
            editProduct($idSP, $picProfile, $tenSP, $idHSX, $giaban, $tonkho, $cpu, $card, $pin, $ram, $mota, $trangthai);
            echo json_encode(array('success'=>true));
        }
        else echo json_encode(array('success'=>false));
    }

    // delete-product
    if(isset($_POST['delete-product'])){
        include '../../lib/connect.php';
        include '../model/product.php';
        // kiem tra san pham da duoc ban chua
        if(isProductSelled($_POST['product_id'])){
            // neu da duoc ban thi an san pham
            lockProduct($_POST['product_id']);
            echo json_encode(array('success'=>false));
        }
        else echo json_encode(array('success'=>true));
    }

    // accept-delete-product
    if(isset($_POST['accept_delete_product'])){
        include '../../lib/connect.php';
        include '../model/product.php';
        deleteProduct($_POST['product_id']);
        echo json_encode(array('success'=>true));
    }

    // search-product
    if(isset($_GET['page']) && $_GET['page']=="search_product"){

        if(isset($_POST['search-product-btn'])){
            $_SESSION['search_product'] = searchProduct($_POST['kyw']);
        }
    
        // hien thi ket qua tim kiem
        $result = $_SESSION['search_product'];
        $pageTitle = "page=search_product";
        $title = "Sản phẩm";
        require 'view/product.php';
        
    }
?>