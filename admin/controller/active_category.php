<?php
/* lock-data */
include '../../lib/connect.php';
include '../model/category.php';

if(isset($_POST['lock_category'])){
    lockCategory($_POST['category_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

/* unlock-data */
if(isset($_POST['unlock_category'])){
    unlockCategory($_POST['category_id']);
    echo json_encode(array('success'=>true));
}
/* unlock-data */
?>