<?php
/* lock-data */
include '../../lib/connect.php';
include '../model/product.php';

if(isset($_POST['lock_product'])){
    lockProduct($_POST['product_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

/* unlock-data */
if(isset($_POST['unlock_product'])){
    unlockProduct($_POST['product_id']);
    echo json_encode(array('success'=>true));
}
/* unlock-data */
?>