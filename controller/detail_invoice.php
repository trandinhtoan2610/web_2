<?php
    if(!isset($_POST['idDH'])){
        require_once 'history.php';
    }else{
        $result = getDetailInvoicebyID($_POST['idDH']);
        require_once 'view/detail_invoice.php';
    }
    
?>