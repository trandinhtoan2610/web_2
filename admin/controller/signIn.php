<?php
    if(!isset($_POST['signIn-btn']))
        // hien thi form dang nhap
        require_once 'view/signIn.php';
    else{
        $email = $_POST['email'];
        $matkhau = $_POST['matkhau'];
        $account = getUserByEmail($email);
        if($account != null && password_verify($inputPassword, $account['matkhau'])){
            
            echo json_encode(array('success'=>true));
        }
        else echo json_encode(array('success'=>false));
    }
?>