<?php
    function getAllUser(){
        $sql='select * from taikhoan';
        return getAll($sql);
    }

    function getUserByID($id){
        $sql = 'select * from taikhoan where idTK='.$id;
        return getOne($sql);
    }
    
    function addUSer($avatar, $ten, $email, $dienthoai, $diachi, $phanquyen){
        $sql='insert into taikhoan(avatar, tenTK, email, dienthoai, diachi, phanquyen, trangthai) values ("'.$avatar.'","'.$ten.'","'.$email.'","'.$dienthoai.'","'.$diachi.'","'.$phanquyen.'",1)';
        insert($sql);
    }

    function editUser($id,$picProfile,$ten, $email, $dienthoai, $diachi, $phanquyen, $trangthai){
        $sql = 
        'UPDATE taikhoan
        SET avatar = "'.$picProfile.'",
        tenTK = "'.$ten.'",
        email = "'.$email.'",
        dienthoai = "'.$dienthoai.'",
        diachi = "'.$diachi.'",
        phanquyen = "'.$phanquyen.'",
        trangthai = '.$trangthai.'
        WHERE idTK='.$id;
        edit($sql);
    }

    function isUserExist($email, $dienthoai){
        $sql = 'select idTK from taikhoan where email= "'.$email.'" or dienthoai= "'.$dienthoai.'"';
        return getOne($sql)!=null;
    }

    function isUserExist_update($idTK, $email, $dienthoai){
        $sql = 'select idTK from taikhoan where (email = "'.$email.'" or dienthoai = "'.$dienthoai.'") and idTK!='.$idTK;
        return getOne($sql)!=null;
    }
    
    function lockUser($id){
        $sql='UPDATE taikhoan SET trangthai = 0 WHERE idTK='.$id;
        edit($sql);
    }

    function unlockUser($id){
        $sql='UPDATE taikhoan SET trangthai = 1 WHERE idTK='.$id;
        edit($sql);
    }

    function searchUser($ten){
        $ten = strtolower($ten);
        $sql='SELECT * FROM taikhoan WHERE tenTK LIKE "%'.$ten.'%"';
        return getAll($sql);
    }
?>