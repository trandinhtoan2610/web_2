<?php
// // Bắt đầu hoặc khôi phục phiên
// session_start();

// Hủy phiên (session) hiện tại
// session_unset(); // Xóa tất cả các biến phiên
// session_destroy(); // Hủy toàn bộ phiên

unset($_SESSION['cart']);
unset($_SESSION['idTK']);
unset($_SESSION['tenTK']);
// Chuyển hướng người dùng đến trang chủ hoặc bất kỳ trang nào khác
header("Location: index.php");
exit();
?>