<?php
    function getAllInvoice($idUser){
        $sql = 'SELECT idDH, tongtien, DATE_FORMAT(ngaytao, "%d-%m-%Y") AS ngaytao, trangthai
        FROM donhang WHERE idTK = "' . $idUser .'"';
        return getAll($sql);
    }
    
    function addOrder($idTK, $tongtien, $ngaytao, $ngaycapnhat, $diachigiao, $thanhtoan){
        $sql = 
        'INSERT INTO donhang (idTK, tongtien, ngaytao, ngaycapnhat, trangthai, diachigiao, thanhtoan)
        VALUES ('.$idTK.', '.$tongtien.', "'.$ngaytao.'", "'.$ngaycapnhat.'", "cho", "'.$diachigiao.'", "'.$thanhtoan.'")';
        insert($sql);
        $sql = 'SELECT LAST_INSERT_ID()';
        return getOne($sql);
    }

    function addOrderDetailByID($idDH, $idSP, $soluong){
        $sql = 
        'INSERT INTO ctdonhang (idDH, idSP, soluong)
        VALUES ('.$idDH.', '.$idSP.', '.$soluong.')';
        insert($sql);
    }

    function getOrderByID($idDH){
        $sql = 
        'SELECT tenTK, dienthoai, diachigiao, tongtien, thanhtoan, DATE_FORMAT(ngaytao, "%d-%m-%Y") AS ngaytao
        FROM donhang INNER JOIN taikhoan ON donhang.idTK = taikhoan.idTK
        WHERE idDH ='.$idDH;
        return getOne($sql);
    }

    function getOrderDetailByID($idDH){
        $sql =
        'SELECT tenSP, soluong, giaban
        FROM ctdonhang INNER JOIN sanpham ON ctdonhang.idSP = sanpham.idSP
        WHERE idDH ='.$idDH;
        return getAll($sql);
    }
?>