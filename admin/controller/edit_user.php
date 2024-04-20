<?php
if(isset($_POST['edit-user-btn'])){
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
        $alert = "Cập nhật thành công.";
    }
    else $alert = "Người dùng đã tồn tại.";
}
$result = getUserByID($_GET['idTK']);
extract($result);
$title = "Người dùng";
require_once('view/edit_user.php');
?>