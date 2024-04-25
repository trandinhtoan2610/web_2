<?php
    // category
    if(isset($_GET['page']) && $_GET['page']=="category"){
        $result = getAllCategory();
        $pageTitle = "page=category";
        $title = "Hãng sản xuất";
        require_once 'view/category.php';
    }

    // open-add-category-form
    if(isset($_GET['page']) && $_GET['page']=="add_category"){
        $title = "Hãng sản xuất";
        require_once('view/add_category.php');
    }
    
    // add-category
    if(isset($_POST['add-category-btn'])){
        include '../../lib/connect.php';
        include '../model/category.php';
        //avata
        $images = $_FILES['input_file']['name'];
        $tmp_dir = $_FILES['input_file']['tmp_name'];
        $imageSize = $_FILES['input_file']['size'];
    
        if($imageSize===0){
            $picProfile="pic.png";
        }
        else{
        $upload_dir='../../uploads/uploads_category/';
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picProfile = rand(1000, 1000000).'.'.$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        }
        $tenHSX = $_POST['tenHSX'];
        if(!isCategoryExist($tenHSX)){
            addCategory($picProfile, $tenHSX);
            echo json_encode(array('success'=>true));
        }
        else echo json_encode(array('success'=>false));
    }

    // open-edit-category-form
    if(isset($_GET['page']) && $_GET['page']=="edit_category"){
        $result = getCategoryByID($_GET['idHSX']);
        extract($result);
        $title = "Hãng sản xuất";
        require_once('view/edit_category.php');
    }

    // update-category
    if(isset($_POST['edit-category-btn'])){
        include '../../lib/connect.php';
        include '../model/category.php';
        //avata
        $images = $_FILES['input_file']['name'];
        $tmp_dir = $_FILES['input_file']['tmp_name'];
        $imageSize = $_FILES['input_file']['size'];
    
        if($imageSize===0){ //khong thay doi
            $picProfile=$_POST['curr_img'];
        }
        else{
        $upload_dir='../uploads/uploads_category/';
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picProfile = rand(1000, 1000000).'.'.$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        }
    
        $idHSX = $_POST['idHSX'];
        $tenHSX = $_POST['tenHSX'];
        $trangthai = $_POST['trangthai'];
        if(!isCategoryExist_update($idHSX, $tenHSX)){
            editCategory($idHSX, $picProfile, $tenHSX, $trangthai);
            echo json_encode(array('success'=>true));
        }
        else echo json_encode(array('success'=>false));
    }

    // lock-category
    if(isset($_POST['lock_category'])){
        include '../../lib/connect.php';
        include '../model/category.php';
        lockCategory($_POST['category_id']);
        echo json_encode(array('success'=>true));
    }
    
    // unlock-category
    if(isset($_POST['unlock_category'])){
        include '../../lib/connect.php';
        include '../model/category.php';
        unlockCategory($_POST['category_id']);
        echo json_encode(array('success'=>true));
    }

    // search-category
    if(isset($_GET['page']) && $_GET['page']=="search_category"){

        // tim kiem
        if(isset($_POST['search-category-btn']))
            $_SESSION['search_category'] = searchCategory($_POST['kyw']);
        
        // hien thi ket qua tim kiem
        $result = $_SESSION['search_category'];
        $pageTitle = "page=search_category";
        $title = "Hãng sản xuất";
        require 'view/category.php';
        
    }
?>