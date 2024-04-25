<?php
    function getAllOrder(){
        $sql=
        'SELECT idDH, tenTK, DATE_FORMAT(ngaytao, "%d-%m-%Y") AS ngaytao, DATE_FORMAT(ngaycapnhat, "%d-%m-%Y") AS ngaycapnhat, tongtien, donhang.trangthai 
        FROM donhang INNER JOIN taikhoan ON donhang.idTK = taikhoan.idTK';
        return getAll($sql);
    }

    function getOrderByID($id){
        $sql = 
        'SELECT idDH, tenTK, email, dienthoai, DATE_FORMAT(ngaytao, "%d-%m-%Y") AS ngaytao, DATE_FORMAT(ngaycapnhat, "%d-%m-%Y") AS ngaycapnhat, tongtien, donhang.trangthai, diachigiao, thanhtoan
        FROM donhang INNER JOIN taikhoan ON donhang.idTK = taikhoan.idTK
        WHERE idDH='.$id;
        return getOne($sql);
    }

    function getOrderDetailByID($id){
        $sql = 
        'SELECT tenSP, giaban, soluong, hinhanh, sanpham.idSP
        FROM donhang INNER JOIN ctdonhang ON donhang.idDH = ctdonhang.idDH
        INNER JOIN sanpham ON ctdonhang.idSP = sanpham.idSP
        WHERE donhang.idDH='.$id;
        return getAll($sql);
    }

    function editOrder($id, $trangthai, $ngaycapnhat){
        $sql = 
        'UPDATE donhang
        SET ngaycapnhat = "'.$ngaycapnhat.'",
        trangthai = "'.$trangthai.'"
        WHERE idDH='.$id;
        edit($sql);
    }

    function searchOrder($trangthai, $start, $end){
        $sql=
        'SELECT idDH, tenTK, DATE_FORMAT(ngaytao, "%d-%m-%Y") AS ngaytao, DATE_FORMAT(ngaycapnhat, "%d-%m-%Y") AS ngaycapnhat, tongtien, donhang.trangthai 
        FROM donhang INNER JOIN taikhoan ON donhang.idTK = taikhoan.idTK
        WHERE 1';
        if($trangthai != "all") $sql.=' AND donhang.trangthai="'.$trangthai.'"';
        if(($start == '' && $end!='') || ($start != '' && $end=='')){
            if($start == '') $sql.=' AND ngaycapnhat <= "'.$end.'"';
            if($end == '') $sql.=' AND ngaycapnhat >= "'.$start.'"';
        }
        else if($start !='' && $end !='') $sql.=' AND ngaycapnhat BETWEEN "'.$start.'" AND "'.$end.'"';
        return getAll($sql);
    }

    function getOrderByThongKe($idTK, $start, $end){
        $sql=
        'SELECT idTK, idDH, DATE_FORMAT(ngaytao, "%d-%m-%Y") AS ngaytao, DATE_FORMAT(ngaycapnhat, "%d-%m-%Y") AS ngaycapnhat, tongtien
        FROM donhang
        WHERE 1';
        if(($start == '' && $end!='') || ($start != '' && $end=='')){
            if($start == '') $sql.=' AND ngaycapnhat <= "'.$end.'"';
            if($end == '') $sql.=' AND ngaycapnhat >= "'.$start.'"';
        }
        else if($start !='' && $end !='') $sql.=' AND ngaycapnhat BETWEEN "'.$start.'" AND "'.$end.'"';
        $sql.=' AND idTK= '.$idTK;
        return getAll($sql);
    }
?>