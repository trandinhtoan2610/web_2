<?php
    if(isset($_GET['page']) && $_GET['page'] == "signIn"){
        require 'view/signIn.php';
    }

    if(isset($_POST['signIn-btn'])){
        include '../../lib/connect.php';
        include '../model/user.php';
        session_start();
        $useremail = $_POST['email'];
        $password = $_POST['pass'];
        $result = checkuser($useremail,$password);
        if($result != null){
            $_SESSION['idTKAd'] = $result['idTK'];
            $_SESSION['tenTKAd'] = $result['tenTK'];
            echo json_encode(array('success'=>true));
        }else echo json_encode(array('success'=>false));
    }
?>