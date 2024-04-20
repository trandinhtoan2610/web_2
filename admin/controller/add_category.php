<?php
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
    $upload_dir='../uploads/uploads_category/';
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
else{
    $title = "Hãng sản xuất";
    require_once('view/add_category.php');
}
?>