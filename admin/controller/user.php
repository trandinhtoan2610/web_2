<?php   
    // user
    if(isset($_GET['page']) && $_GET['page']=="user"){
        $result = getAllUser();
        $pageTitle = "page=user";
        $title = "Người dùng";
        require_once 'view/user.php';
    }

    // open-add-user-form
    if(isset($_GET['page']) && $_GET['page']=="add_user"){
        $title = "Người dùng";
        require_once('view/add_user.php');
    }
    
    // add-user
    if(isset($_POST['add-user-btn'])){
        include '../../lib/connect.php';
        include '../model/user.php';
        //avata
        $images = $_FILES['input_file']['name'];
        $tmp_dir = $_FILES['input_file']['tmp_name'];
        $imageSize = $_FILES['input_file']['size'];
    
        if($imageSize===0){
            $picProfile="person.png";
        }
        else{
        $upload_dir='../../uploads/uploads_user/';
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picProfile = rand(1000, 1000000).'.'.$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        }
        $ten = $_POST['tenTK'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];
        $phanquyen = $_POST['phanquyen'];
        if(!isUserExist($email, $dienthoai)){
            addUser($picProfile, $ten, $email, $dienthoai, $diachi, $phanquyen);
            echo json_encode(array('success'=>true));
        }
        else echo json_encode(array('success'=>false));
    }

    // open-detail-user
    if(isset($_GET['page']) && $_GET['page']=="detail_user"){
        $result = getUserByID($_GET['idTK']);
        extract($result);
        $title = "Người dùng";
        require_once('view/detail_user.php');
    }

    // open-edit-user-form
    if(isset($_GET['page']) && $_GET['page']=="edit_user"){
        $result = getUserByID($_GET['idTK']);
        extract($result);
        $title = "Người dùng";
        require_once('view/edit_user.php');
    }

    //update-user
    if(isset($_POST['edit-user-btn'])){
        include '../../lib/connect.php';
        include '../model/user.php';
        //avata
        $images = $_FILES['input_file']['name'];
        $tmp_dir = $_FILES['input_file']['tmp_name'];
        $imageSize = $_FILES['input_file']['size'];
    
        if($imageSize===0){ //khong thay doi
            $picProfile=$_POST['curr_img'];
        }
        else{
            $upload_dir='../uploads/uploads_user/';
            $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
            $picProfile = rand(1000, 1000000).'.'.$imgExt;
            move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        }
    
        $id = $_POST['idTK'];
        $ten = $_POST['tenTK'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];
        $phanquyen = $_POST['phanquyen'];
        $trangthai = $_POST['trangthai']; //hoat dong
        if(!isUserExist_update($id, $email, $dienthoai)){
            editUser($id,$picProfile,$ten,$email,$dienthoai,$diachi,$phanquyen,$trangthai);
            echo json_encode(array('success'=>true));
        }
        else echo json_encode(array('success'=>false));
    }

    // lock-user
    if(isset($_POST['lock_user'])){
        include '../../lib/connect.php';
        include '../model/user.php';
        lockUser($_POST['user_id']);
        echo json_encode(array('success'=>true));
    }
    
    // unlock-user
    if(isset($_POST['unlock_user'])){
        include '../../lib/connect.php';
        include '../model/user.php';
        unlockUser($_POST['user_id']);
        echo json_encode(array('success'=>true));
    }

    // search-user
    if(isset($_GET['page']) && $_GET['page']=="search_user"){

        if(isset($_POST['search-user-btn'])){
            $_SESSION['search_user'] = searchUser($_POST['kyw']);
        }
    
        // hien thi ket qua tim kiem
        $result = $_SESSION['search_user'];
        $pageTitle = "page=search_user";
        $title = "Người dùng";
        require 'view/user.php';   
    }
?>