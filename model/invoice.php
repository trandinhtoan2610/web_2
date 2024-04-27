<?php
    function getAllInvoice($idUser){
        $sql = 'SELECT * FROM donhang WHERE idTK = "' . $idUser .'"';
        return getAll($sql);
    }
?>