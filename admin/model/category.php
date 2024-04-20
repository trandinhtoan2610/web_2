<?php
    function getAllCategoryActive(){
        $sql = 'SELECT idHSX as idhangsanxuat, tenHSX FROM hangsanxuat WHERE trangthai=1';
        return getAll($sql);
    }

    function getAllCategory(){
        $sql = 'SELECT idHSX as idhangsanxuat, tenHSX, trangthai, logo FROM hangsanxuat';
        return getAll($sql);
    }

    function isCategoryExist($tenHSX){
        $sql = 'SELECT idHSX from hangsanxuat where tenHSX= "'.$tenHSX.'"';
        return getOne($sql)!=null;
    }

    function isCategoryExist_update($idHSX, $tenHSX){
        $sql = 'SELECT idHSX from hangsanxuat where tenHSX= "'.$tenHSX.'" AND idHSX!='.$idHSX;
        return getOne($sql)!=null;
    }

    function editCategory($id,$picProfile,$ten, $trangthai){
        $sql = 
        'UPDATE hangsanxuat
        SET logo = "'.$picProfile.'",
        tenHSX = "'.$ten.'",
        trangthai = '.$trangthai.'
        WHERE idHSX='.$id;
        edit($sql);
    }

    function addCategory($picProfile, $tenHSX){
        $sql = 
        'INSERT INTO hangsanxuat (logo, tenHSX, trangthai)
        VALUES ("'.$picProfile.'", "'.$tenHSX.'", 1)';
        insert($sql);
    }

    function lockcategory($id){
        $sql='UPDATE hangsanxuat SET trangthai = 0 WHERE idHSX='.$id;
        edit($sql);
    }

    function unlockcategory($id){
        $sql='UPDATE hangsanxuat SET trangthai = 1 WHERE idHSX='.$id;
        edit($sql);
    }

    function searchCategory($ten){
        $ten = strtolower($ten);
        $sql='SELECT * FROM hangsanxuat WHERE tenHSX LIKE "%'.$ten.'%"';
        return getAll($sql);
    }
?>