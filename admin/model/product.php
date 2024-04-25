<?php
    function getAllProduct(){
        $sql = 'SELECT * FROM sanpham';
        return getAll($sql);
    }

    function isProductExist($tenSP, $idHSX, $giaban){
        $sql = 'SELECT idSP from sanpham where tenSP= "'.$tenSP.'" AND idHSX= '.$idHSX.' AND giaban = '.$giaban;
        return getOne($sql)!=null;
    }

    function isProductExist_update($idSP, $tenSP, $idHSX, $giaban){
        $sql = 'SELECT idSP from sanpham where tenSP= "'.$tenSP.'" AND idHSX= '.$idHSX.' AND giaban = '.$giaban.' AND idSP!='.$idSP;
        return getOne($sql)!=null;
    }

    function getProductByID($idSP){
        $sql = 'SELECT * FROM sanpham WHERE idSP = '.$idSP;
        return getOne($sql);
    }

    function addProduct($picProfile, $tenSP, $idHSX, $giaban, $tonkho, $cpu, $card, $pin, $ram, $mota){
        $sql = 
        'INSERT INTO sanpham (hinhanh, tenSP, idHSX, giaban, tonkho, cpu, card, pin, ram, mota, trangthai)
        VALUES ("'.$picProfile.'", "'.$tenSP.'", '.$idHSX.', '.$giaban.', '.$tonkho.', "'.$cpu.'", "'.$card.'",
        "'.$pin.'", "'.$ram.'", "'.$mota.'", 1)';
        insert($sql);
    }

    function editProduct($idSP, $picProfile, $tenSP, $idHSX, $giaban, $tonkho, $cpu, $card, $pin, $ram, $mota, $trangthai){
        $sql = 
        'UPDATE sanpham
        SET hinhanh = "'.$picProfile.'",
        tenSP = "'.$tenSP.'",
        idHSX = '.$idHSX.',
        giaban = '.$giaban.',
        tonkho = '.$tonkho.',
        cpu = "'.$cpu.'",
        card = "'.$card.'",
        pin = "'.$pin.'",
        ram = "'.$ram.'",
        mota = "'.$mota.'",
        trangthai = '.$trangthai.'
        WHERE idSP='.$idSP;
        edit($sql);
    }
    
    function lockProduct($id){
        $sql='UPDATE sanpham SET trangthai = 0 WHERE idSP='.$id;
        edit($sql);
    }

    function unlockProduct($id){
        $sql='UPDATE sanpham SET trangthai = 1 WHERE idSP='.$id;
        edit($sql);
    }

    function searchProduct($ten){
        $ten = strtolower($ten);
        $sql='SELECT * FROM sanpham WHERE tenSP LIKE "%'.$ten.'%"';
        return getAll($sql);
    }

    function isProductSelled($id){
        $sql = 'SELECT idSP from ctdonhang where idSP = '.$id;
        return getOne($sql)!=null;
    }

    function deleteProduct($id){
        $sql = 'DELETE FROM sanpham WHERE idSP = '.$id;
        return edit($sql);
    }
?>