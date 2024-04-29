<?php
    function getUserByID($id){
        $sql = 'SELECT * FROM taikhoan WHERE idTK='.$id;
        return getOne($sql);
    }
?>