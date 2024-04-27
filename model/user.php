<?php
function checkuser($user,$pass){
    $sql='SELECT * FROM taikhoan WHERE email = "'. $user .'"AND password = "' . $pass .'"';
    return getOne($sql);
}

function checkEmailExist($user){
    $sql='SELECT * FROM taikhoan WHERE email = "'. $user .'"';
    return getOne($sql);
}

?>