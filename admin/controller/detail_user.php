<?php
    $result = getUserByID($_GET['idTK']);
    extract($result);
    $title = "Người dùng";
    require_once('view/detail_user.php');
?>