<?php
session_start();
// Kiểm tra nếu không có mã sản phẩm được gửi đến, chuyển hướng về trang giỏ hàng
if (!isset($_POST['masp'])) {
    header("Location: web_2-main/index.php?quanly=giohang");
    exit;
}

// Lấy mã sản phẩm cần xóa từ form POST
$masp_to_remove = $_POST['masp'];

// Kiểm tra xem mã sản phẩm cần xóa có trong giỏ hàng không
if (array_key_exists($masp_to_remove, $_SESSION['cart'])) {
    // Nếu có, xóa sản phẩm khỏi giỏ hàng
    unset($_SESSION['cart'][$masp_to_remove]);
}

// Chuyển hướng trở lại trang giỏ hàng
header("Location: web_2-main/index.php?quanly=giohang");
exit;
?>
