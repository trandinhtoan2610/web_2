<?php
if(isset($_POST['edit-product-btn'])){
    //avata
    $images = $_FILES['input_file']['name'];
    $tmp_dir = $_FILES['input_file']['tmp_name'];
    $imageSize = $_FILES['input_file']['size'];

    if($imageSize===0){ //khong thay doi
        $picProfile=$_POST['curr_img'];
    }
    else{
    $upload_dir='../uploads/uploads_product/';
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
    if(isProductExist_update($idSP, $tenSP, $idHSX, $giaban)){
        editProduct($idSP, $picProfile, $tenSP, $idHSX, $giaban, $tonkho, $cpu, $card, $pin, $ram, $mota, $trangthai);
        $alert = "Cập nhật thành công.";
    }
    else $alert = "Sản phẩm đã tồn tại.";
}
$result = getProductByID($_GET['idSP']);
$hangsanxuat = getAllCategory();
extract($result);
$title = "Sản phẩm";
require_once('view/edit_product.php');
?>