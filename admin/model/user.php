<?php
    function getAllUser(){
        $sql='select * from taikhoan';
        return getAll($sql);
    }

    function getUserByID($id){
        $sql = 'select * from taikhoan where idTK='.$id;
        return getOne($sql);
    }
    
    function addUSer($ten, $email, $dienthoai, $diachi, $phanquyen, $matkhau){
        $sql='insert into taikhoan(tenTK, email, dienthoai, diachi, phanquyen, trangthai, matkhau) values ("'.$ten.'","'.$email.'","'.$dienthoai.'","'.$diachi.'","'.$phanquyen.'",1,"'.$matkhau.'")';
        insert($sql);
    }

    function editUser($id, $ten, $email, $dienthoai, $diachi, $phanquyen, $trangthai){
        $sql = 
        'UPDATE taikhoan
        SET tenTK = "'.$ten.'",
        email = "'.$email.'",
        dienthoai = "'.$dienthoai.'",
        diachi = "'.$diachi.'",
        phanquyen = "'.$phanquyen.'",
        trangthai = '.$trangthai.'
        WHERE idTK='.$id;
        edit($sql);
    }

    function isUserExist($email, $dienthoai){
        $sql = 'select idTK from taikhoan where email= "'.$email.'"';
        return getOne($sql)!=null;
    }

    function isUserExist_update($idTK, $email, $dienthoai){
        $sql = 'select idTK from taikhoan where (email = "'.$email.'") and idTK!='.$idTK;
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
        'SELECT taikhoan.idTK, tenTK, dienthoai, SUM(tongtien) AS tongtien
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

    function getUserByEmail($email){
        $sql = 'SELECT * FROM taikhoan WHERE email = "'.$email.'" AND phanquyen="AD"';
        return getOne($sql);
    }

    function checkuser($user,$pass){
        $sql='SELECT * FROM taikhoan 
        WHERE email = "'. $user .'"
        AND matkhau = "' . $pass .'"
        AND phanquyen = "AD"
        AND trangthai = 1';
        return getOne($sql);
    }
?>