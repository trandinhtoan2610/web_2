<?php
include('../../config/config.php');


// DỮ liệu lấy từ from ở phần thêm
$maloai = $_POST['maloai'];
$thutu = $_POST['thutu'];
$soluong = $_POST['soluong'];
$tensp = $_POST['tensp'];
$hinhAnh = $_FILES['hinhAnh']['name'];
$hinhAnh_tmp = $_FILES['hinhAnh']['tmp_name'];
$hinhAnh = time().' '.$hinhAnh ;
$tinhtrang = $_POST['tinhtrang'];
// còn các thuộc tính khac của sản phẩm


if ( isset($_POST['themsanpham'])){
    // $sql_them = "INSERT INTO `sanpham` (`maloai`, `thutu`, `hinhAnh`, `tensp`, `ram`, `boNho`, `giaGoc`, `tiLeKhuyenMai`, 
    // `manHinh`, `cpu`,
    // `cardmanhinh`, `pin`, `khoiLuong`, `soluong`) 
    // VALUES ('$maloai', '$thutu', '$hinhAnh', '', '', '', '', '', '', '', '', '', '', '$soLuong'); ";
    // mysqli_query($conn,$sql_them);
    // header("Location:../../index.php?action=quanlysanpham&query=lietke");
    
    $sql_them = "INSERT INTO `sanpham` (`maloai`, `thutu`, `hinhAnh`, `tensp`,`soluong`,`tinhtrang`) 
    VALUES ('$maloai', '$thutu', '$hinhAnh','$tensp','$soluong','$tinhtrang'); ";
    mysqli_query($conn,$sql_them);
    
    move_uploaded_file($hinhAnh_tmp,'../../../img/'.$hinhAnh);

    
    header("Location:../../index.php?action=quanlysanpham&query=lietke");

} elseif (isset($_POST['suasanpham'])){
    $masanpham = $_GET['masanpham'];
    $sql_sua = "UPDATE `sanpham` SET 
    `maloai` = '$maloai',
    `thutu` = '$thutu',
    `soluong` = '$soluong',
    `tensp` = '$tensp'
    `hinhAnh` = '$hinhAnh'
    `tinhtrang` = '$tinhtrang'
    WHERE masp='$masanpham' ";
    mysqli_query($conn, $sql_sua);
    header("Location:../../index.php?action=quanlysanpham&query=lietke");

}
else{
    $masanpham = $_GET['masanpham'];
    $sql = "SELECT * FROM `sanpham` WHERE masp ='$masanpham' LIMIT 1";
    $query = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($query)){
        unlink('../../../img/'.$row['hinhAnh']);
    }
    $sql_xoa = "DELETE FROM sanpham WHERE masp= '$masanpham' ";
    mysqli_query($conn, $sql_xoa);
    header("Location:../../index.php?action=quanlysanpham&query=lietke");    
}

?>