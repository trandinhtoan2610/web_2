<?php
    if((isset($_POST['dangky']))){
        include '../lib/connect.php';
        include '../model/user.php';
        session_start();

        if(userExist($_POST['email'])) echo json_encode(array('success'=>false));
        else{
            $result = addUser($_POST['tenTK'], $_POST['email'], $_POST['dienthoai'], $_POST['diachi'], $_POST['pass']);
            $_SESSION['idTK'] = $result['LAST_INSERT_ID()'];
            $_SESSION['tenTK'] = $_POST['tenTK'];
            echo json_encode(array('success'=>true));
        }
    }
    $conn->close();
?>
