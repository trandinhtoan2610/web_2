<?php
include ('../../config/config.php');
if (isset ($_GET['idbill'])){
    $idbill = $_GET['idbill'];
    $sql = mysqli_query($conn, "UPDATE bill set bill_status= 0 WHERE id_bill = '$idbill'");
    header("Location:../../index.php?action=quanlydonhang&query=lietke");
}

?>