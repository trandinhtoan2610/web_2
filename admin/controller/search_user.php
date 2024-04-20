<?php
    // tim kiem
    if(isset($_POST['search-user-btn']))
        $_SESSION['search_user'] = searchUser($_POST['kyw']);
    
    // hien thi ket qua tim kiem
    if($_SESSION['search_user']==null){
        $kyw = $_POST['kyw'];
        $title = "Người dùng";
        require 'view/noFound.php';
    }
    else{
        $result = $_SESSION['search_user'];
        $pageTitle = "page=search_user";
        $title = "Người dùng";
        require 'view/user.php';
    }
?>