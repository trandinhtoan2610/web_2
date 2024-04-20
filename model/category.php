<?php
// ***FUNCTION: CATEGORY***
function getAllCategory(){
    $sql='select * from hangsanxuat where trangthai=1';
    return getAll($sql);
}

function getCategoryById($id){
    $sql = 'select * from hangsanxuat where idHSX='.$id;
    return getOne($sql);
}
?>