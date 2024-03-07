<?php
include('../admincp/config/config.php');
if (isset($_GET['query']) == 'them'){

}
else if (isset($_GET['query']) == 'xoa'){
    $masp = $_GET['ma_sp'];
    $sql_xoa = "DELETE FROM sanpham where masp= '".$masp."'";
    mysqli_query($conn, $sql_xoa);
    header('Location:../admincp/index.php?action=quanlysanpham');
}

?>