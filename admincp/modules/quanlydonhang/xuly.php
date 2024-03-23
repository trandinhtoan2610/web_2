<?php
include ('../../config/config.php');
if (isset ($_GET['code'])){
    $code = $_GET['code'];
    $sql = mysqli_query($conn, "UPDATE bill set bill_status= 0 WHERE code_bill = '$code'");
    header("Location:../../index.php?action=quanlydonhang&query=lietke");
}
?>