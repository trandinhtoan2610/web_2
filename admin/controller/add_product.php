<?php
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
    $upload_dir='../uploads/uploads_product/';
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
else{
    $hangsanxuat = getAllCategoryActive();
    $title = "Sản phẩm";
    require_once('view/add_product.php');
}
?>