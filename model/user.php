<?php
    function getUserByID($id){
        $sql = 'SELECT * FROM taikhoan WHERE idTK='.$id;
        return getOne($sql);
    }

    function checkuser($user,$pass){
        $sql='SELECT * FROM taikhoan 
        WHERE email = "'. $user .'"
        AND matkhau = "' . $pass .'"
        AND phanquyen = "KH"
        AND trangthai = 1';
        return getOne($sql);
    }

    function userExist($email){
        $sql = 'SELECT idTK FROM taikhoan WHERE email = "'.$email.'"';
        return getOne($sql)!=null;
    }

    function addUSer($ten, $email, $dienthoai, $diachi, $pass){
        $sql='insert into taikhoan(tenTK, email, dienthoai, diachi, matkhau, phanquyen, trangthai) values ("'.$ten.'","'.$email.'","'.$dienthoai.'","'.$diachi.'","'.$pass.'","KH",1)';
        insert($sql);
        $sql = 'SELECT LAST_INSERT_ID()';
        return getOne($sql);
    }
?>