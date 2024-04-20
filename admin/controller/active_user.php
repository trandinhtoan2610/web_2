<?php
/* lock-data */
include '../../lib/connect.php';
include '../model/user.php';

if(isset($_POST['lock_user'])){
    lockUser($_POST['user_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

/* unlock-data */
if(isset($_POST['unlock_user'])){
    unlockUser($_POST['user_id']);
    echo json_encode(array('success'=>true));
}
/* unlock-data */
?>