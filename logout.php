<?php
// Bắt đầu hoặc khôi phục phiên
session_start();

// Hủy phiên (session) hiện tại
session_unset(); // Xóa tất cả các biến phiên
session_destroy(); // Hủy toàn bộ phiên

header("Location: index.php");
exit();
?>