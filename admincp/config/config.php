<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web_2";
    
    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Kiểm tra kết nối
    if (!$conn) {
        echo("ket noi khong thanh cong");
    }

?>