<?php
function checkuser($user,$pass){
    $sql='SELECT * FROM taikhoan WHERE email = "'. $user .'"AND password = "' . $pass .'"';
    return getOne($sql);
}

function checkEmailExist($user){
    $sql='SELECT * FROM taikhoan WHERE email = "'. $user .'"';
    return getOne($sql);
}

function registerUser($tenTK, $diachi, $email, $dienthoai, $avatar, $password){
    $sql= 'INSERT INTO taikhoan(tenTK, diachi, email, dienthoai, trangthai, phanquyen, avatar,password) VALUES ("'. $tenTK .'","'. $diachi .'","'.$email.'","'.$dienthoai.'", 1 ,"KH","'.$avatar.'","'.$password.'")';
    return insert($sql);
}
   
?>