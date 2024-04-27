<?php
include "../lib/connect.php";
include "../model/user.php";
if(isset($_GET['q'])){
    $hint = "";
    if ($_GET['q'] !== "") {
        $result = checkEmailExist($_GET['q']);
        if ($result != null) {
            $hint = "Email đã được đăng ký";
        }
    }
    echo $hint;
}
?>