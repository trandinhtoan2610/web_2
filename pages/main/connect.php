<?php
$servername = "localhost"; // Địa chỉ máy chủ MySQL
$username = "root"; // Mặc định là 'root' nếu bạn không thiết lập mật khẩu
$password = ""; // Mặc định là rỗng nếu bạn không thiết lập mật khẩu
$dbname = "web_2"; // Tên của cơ sở dữ liệu bạn muốn kết nối

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
