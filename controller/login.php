<?php
if(isset($_GET['page']) && $_GET['page'] == "login"){
    require 'view/login.php';
}

if((isset($_POST['dangnhap']))){
    include '../lib/connect.php';
    include '../model/user.php';
    session_start();
    $useremail = $_POST['email'];
    $password = $_POST['pass'];
    $result = checkuser($useremail,$password);
    if($result != null){
        $_SESSION['idTK'] = $result['idTK'];
        $_SESSION['tenTK'] = $result['tenTK'];
        echo json_encode(array('success'=>true));
    }else echo json_encode(array('success'=>false));
}
?>