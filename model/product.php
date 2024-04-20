<?php
    // ***FUNCTION: PRODUCT***
    function getAllProduct(){
        $sql='select * from sanpham where trangthai=1 order by luotban';
        return getAll($sql);
    }
    
    function searchProduct($ten){
        $ten = strtolower($ten);
        $sql='SELECT * FROM sanpham WHERE tenSP LIKE "%'.$ten.'%" AND trangthai=1';
        return getAll($sql);
    }

    function getProductByCategory($id){
        $sql='select * from sanpham where idHSX="'.$id.'" and trangthai=1 order by luotban';
        return getAll($sql);
    }

    function getProductById($id){
        $sql = 'select * from sanpham where idSP = '.$id;
        return getOne($sql);
    }

    function filterProduct($tenSP, $idHSX, $priceFrom, $priceTo){
        $sql=
        'SELECT *
        FROM sanpham
        WHERE tenSP LIKE "%'.$tenSP.'%"
        AND trangthai=1
        AND idHSX='.$idHSX.'
        AND giaban >='.$priceFrom.'
        AND giaban <='.$priceTo;
        return getAll($sql);
    }
?>