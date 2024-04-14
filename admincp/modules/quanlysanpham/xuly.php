<?php
include('../../config/config.php');

// Dữ liệu lấy từ form ở phần thêm
$id_hangsanxuat = $_POST['id_hangsanxuat'];
$thutu = $_POST['thutu'];
$soluong = $_POST['soluong'];
$tensp = $_POST['tensp'];
$hinhAnh = $_FILES['hinhAnh']['name'];
$hinhAnh_tmp = $_FILES['hinhAnh']['tmp_name'];
$hinhAnh = time() . ' ' . $hinhAnh;
$tinhtrang = $_POST['tinhtrang'];
$giaGoc = $_POST['giaGoc'];

// Thêm sản phẩm
if (isset($_POST['themsanpham'])) {
    $sql_them = "INSERT INTO `sanpham` (`thutu`, `hinhAnh`, `tensp`, `giaGoc`, `soluong`, `tinhtrang`, `id_hangsanxuat`) 
                 VALUES ('$thutu', '$hinhAnh', '$tensp', '$giaGoc', '$soluong', '$tinhtrang', '$id_hangsanxuat');";
    mysqli_query($conn, $sql_them);
    move_uploaded_file($hinhAnh_tmp, '../../../img/' . $hinhAnh);
    header("Location:../../index.php?action=quanlysanpham&query=lietke");

// Sửa sản phẩm
} elseif (isset($_POST['suasanpham'])) {
    $masanpham = $_GET['masanpham'];
    if ($_FILES['hinhAnh']['size'] > 0) {
        // Kiểm tra xem có dữ liệu được tải lên cho hình ảnh mới không
        // Có dữ liệu hình ảnh mới được tải lên
        move_uploaded_file($hinhAnh_tmp, '../../../img/' . $hinhAnh);
        $sql = "SELECT * FROM `sanpham` WHERE masp ='$_GET[masanpham]' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('../../../img/' . $row['hinhAnh']);
        }

        $sql_sua = "UPDATE `sanpham` SET 
            `id_hangsanxuat` = '$id_hangsanxuat',
            `thutu` = '$thutu',
            `soluong` = '$soluong',
            `tensp` = '$tensp', 
            `giaGoc`= '$giaGoc',
            `hinhAnh` = '$hinhAnh',
            `tinhtrang` = '$tinhtrang'
            WHERE masp='$masanpham' ";
    } else {
        // Không có dữ liệu hình ảnh mới được tải lên
        $sql_sua = "UPDATE `sanpham` SET 
            `id_hangsanxuat` = '$id_hangsanxuat',
            `thutu` = '$thutu',
            `soluong` = '$soluong',
            `tensp` = '$tensp', 
            `giaGoc`= '$giaGoc',
            `tinhtrang` = '$tinhtrang',
            `giaGoc`= '$giaGoc'
            WHERE masp='$masanpham' ";
    }
    mysqli_query($conn, $sql_sua);
    header("Location:../../index.php?action=quanlysanpham&query=lietke");

// Xóa sản phẩm
} else {
    $masanpham = $_GET['masanpham'];
    $sql = "SELECT * FROM `sanpham` WHERE masp ='$masanpham' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('../../../img/' . $row['hinhAnh']);
    }

    $sql_xoa = "UPDATE `sanpham` set `tinhtrang` = -1 WHERE masp ='$masanpham'";
    // $sql_xoa = "DELETE FROM sanpham WHERE masp= '$masanpham' ";
    mysqli_query($conn, $sql_xoa);
    header("Location:../../index.php?action=quanlysanpham&query=lietke");
}
?>
