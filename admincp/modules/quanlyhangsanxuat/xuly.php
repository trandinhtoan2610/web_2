<?php
include('../../config/config.php');

if (isset($_POST['themloaisanpham'])) {
    if (isset($_POST['thutu'], $_POST['tenloai'], $_FILES['hinhAnh'])) {
        $thutu = $_POST['thutu'];
        $tenloai = $_POST['tenloai'];
        $hinhAnh = $_FILES['hinhAnh'];

        // Kiểm tra xem tệp tin được tải lên có phải là hình ảnh không
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        $fileExtension = strtolower(pathinfo($hinhAnh['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedExtensions)) {
            // Không phải hình ảnh hợp lệ
            // Xử lý lỗi ở đây nếu cần
            exit("Ảnh không hợp lệ!");
        }

        // Di chuyển tệp tin vào thư mục hình ảnh
        $hinhAnhName = time() . '_' . $hinhAnh['name'];
        $uploadPath = '../../../img/' . $hinhAnhName;
        move_uploaded_file($hinhAnh['tmp_name'], $uploadPath);

        // Thêm sản phẩm vào cơ sở dữ liệu
        $sql_them = "INSERT INTO `loaisanpham` (`tenloai`, `thutu`, `hinhAnh`) 
                     VALUES ('$tenloai', '$thutu','$hinhAnhName')";
        mysqli_query($conn, $sql_them);

        header("Location:../../index.php?action=quanlyhangsanxuat&query=lietke");
        exit();
    }
} elseif (isset($_POST['sualoaisanpham'])) {
    if (isset($_POST['thutu'], $_POST['tenloai'])) {
        $idloai = $_GET['idloai'];
        $thutu = $_POST['thutu'];
        $tenloai = $_POST['tenloai'];
        
        $sql_sua = "UPDATE `loaisanpham` SET 
                    `tenloai` = '$tenloai',
                    `thutu` = '$thutu'";
        
        if (!empty($_FILES['hinhAnh']['name'])) {
            // Nếu có tệp tin mới được tải lên, di chuyển và cập nhật hình ảnh
            $hinhAnh = $_FILES['hinhAnh'];
            $hinhAnhName = time() . '_' . $hinhAnh['name'];
            $uploadPath = '../../../img/' . $hinhAnhName;
            move_uploaded_file($hinhAnh['tmp_name'], $uploadPath);
            
            $sql_sua .= ", `hinhAnh` = '$hinhAnhName'";
            
            // Xóa hình ảnh cũ
            $oldImageQuery = mysqli_query($conn, "SELECT `hinhAnh` FROM `loaisanpham` WHERE id_loaisanpham ='$idloai' LIMIT 1");
            $oldImage = mysqli_fetch_assoc($oldImageQuery)['hinhAnh'];
            unlink('../../../img/' . $oldImage);
        }
        
        $sql_sua .= " WHERE id_loaisanpham='$idloai'";
        mysqli_query($conn, $sql_sua);
        
        header("Location:../../index.php?action=quanlyhangsanxuat&query=lietke");
        exit();
    }
} else {
    if (isset($_GET['idloai'])) {
        $idloai = $_GET['idloai'];
        
        // Xóa hình ảnh của loại sản phẩm
        $oldImageQuery = mysqli_query($conn, "SELECT `hinhAnh` FROM `loaisanpham` WHERE id_loaisanpham ='$idloai' LIMIT 1");
        $oldImage = mysqli_fetch_assoc($oldImageQuery)['hinhAnh'];
        unlink('../../../img/' . $oldImage);
        
        // Xóa loại sản phẩm
        $sql_xoa = "DELETE FROM loaisanpham WHERE id_loaisanpham = '$idloai'";
        mysqli_query($conn, $sql_xoa);
        
        header("Location:../../index.php?action=quanlyhangsanxuat&query=lietke");
    }
}