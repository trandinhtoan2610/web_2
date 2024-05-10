<?php
    // ***FUNCTION: PRODUCT***
    function getAllProduct(){
        $sql='select * from sanpham where trangthai=1 and tonkho>0 order by luotban DESC';
        return getAll($sql);
    }
    
    function searchProduct($ten){
        $ten = strtolower($ten);
        $sql='SELECT * FROM sanpham WHERE tenSP LIKE "%'.$ten.'%" AND trangthai=1 AND tonkho>0';
        return getAll($sql);
    }

    function getProductByCategory($id){
        $sql='select * from sanpham where idHSX="'.$id.'" and trangthai=1 AND tonkho>0 order by luotban DESC';
        return getAll($sql);
    }

    function getProductById($id){
        $sql = 'select * from sanpham where idSP = '.$id;
        return getOne($sql);
    }

    function filterProduct($tenSP, $idHSX, $priceFrom, $priceTo){
        $sql = 
        'SELECT * FROM sanpham WHERE 1';
        if($tenSP != "") $sql.=' AND tenSP LIKE "%'.$tenSP.'%"';
        if($idHSX != "") $sql.=' AND idHSX = '.$idHSX;
        if(($priceFrom == "" && $priceTo != "") || ($priceFrom != "" && $priceTo == "")){
            if($priceFrom == "") $sql.=' AND giaban <='.$priceTo;
            if($priceTo == "") $sql.=' AND giaban >='.$priceFrom;
        }
        else if($priceFrom != "" && $priceTo != "") $sql.=' AND giaban BETWEEN '.$priceFrom.' AND '.$priceTo;
        $sql.=' AND trangthai=1';
        $sql.=' AND tonkho>0';
        return getAll($sql);
    }

    function getTonKhoByID($id){
        $sql = 'SELECT tonkho FROM sanpham WHERE idSP='.$id;
        return getOne($sql);
    }

    function updateTonKhoLuotBan($idSP, $soluong){
        $sql = 
        'UPDATE sanpham
        SET tonkho = tonkho - '.$soluong.',
        luotban = luotban + '.$soluong.'
        WHERE idSP = '.$idSP;
        insert($sql);
    }
?>