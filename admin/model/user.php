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

    function top5Customer($start, $end){
        $sql = 
        'SELECT taikhoan.idTK, avatar, tenTK, dienthoai, SUM(tongtien) AS tongtien
        FROM taikhoan INNER JOIN donhang ON taikhoan.idTK = donhang.idTK
        WHERE 1';
        $sql.=' AND donhang.trangthai = "ht"';
        if(($start == '' && $end!='') || ($start != '' && $end=='')){
            if($start == '') $sql.=' AND ngaycapnhat <= "'.$end.'"';
            if($end == '') $sql.=' AND ngaycapnhat >= "'.$start.'"';
        }
        else if($start !='' && $end !='') $sql.=' AND ngaycapnhat BETWEEN "'.$start.'" AND "'.$end.'"';
       $sql.=' GROUP BY taikhoan.idTK';
       $sql.=' ORDER BY SUM(tongtien) DESC';
       $sql.=' LIMIT 5';
       return getAll($sql);
    }
?>