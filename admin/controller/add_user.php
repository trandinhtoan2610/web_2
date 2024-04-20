<?php
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
    $upload_dir='../uploads/uploads_user/';
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
else{
    $title = "Người dùng";
    require_once('view/add_user.php');
}
?>