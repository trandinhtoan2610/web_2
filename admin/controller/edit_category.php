<?php
if(isset($_POST['edit-category-btn'])){
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
    if(isCategoryExist_update($idHSX, $tenHSX)){
        editCategory($idSP, $picProfile, $tenSP, $trangthai);
        $alert = "Cập nhật thành công.";
    }
    else $alert = "Thể loại đã tồn tại.";
}
$result = getCategoryByID($_GET['idHSX']);
extract($result);
$title = "Hãng sản xuất";
require_once('view/edit_category.php');
?>