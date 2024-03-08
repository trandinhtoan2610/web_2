<?php
include('../../config/config.php');


// DỮ liệu lấy từ from ở phần thêm
$loaisanpham = $_POST['maloai'];
$stt = $_POST['thutu'];
$hinhanh = $_POST['hinhAnh'];
$tensanpham = $_POST['tensanpham'];
// còn các thuộc tính khac của sản phẩm


if ( isset($_POST['themsanpham'])){
    $sql_them = "INSERT INTO `sanpham` (`maloai`, `thutu`, `hinhAnh`, `tensp`, `ram`, `boNho`, `giaGoc`, `tiLeKhuyenMai`, 
    `manHinh`, `cpu`,
    `cardmanhinh`, `pin`, `khoiLuong`, `soluong`) 
    VALUES ('$loaisanpham', '$stt', '$hinhanh', '$tensanpham', '', '', '', '', '', '', '', '', '', ''); ";
    mysqli_query($conn,$sql_them);
    header("Location:../../index.php?action=quanlysanpham&query=lietke");
}


elseif (isset($_POST['suasanpham'])){
    
}
else{
    $masanpham = $_GET['masanpham'];
    $sql_xoa = "DELETE FROM sanpham where masp= '".$masanpham."' ";
    mysqli_query($conn, $sql_xoa);
    header("Location:../../index.php?action=quanlysanpham&query=lietke");    
}

?>