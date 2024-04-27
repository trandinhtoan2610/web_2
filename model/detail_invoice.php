<?php
function getDetailInvoicebyID($id){
    $sql = 'SELECT * FROM ctdonhang JOIN sanpham ON ctdonhang.idSP = sanpham.idSP WHERE idHD = '. $id ;
    return getAll($sql);
}
    
    
?>