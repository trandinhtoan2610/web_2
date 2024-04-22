<?php
include('../../config/config.php');

// Kiểm tra xem đã có tham số action và idbill được gửi từ URL hay không
if (isset($_GET['action']) && isset($_GET['idbill'])) {
    // Lấy giá trị của action và idbill từ URL
    $action = $_GET['action'];
    $idbill = $_GET['idbill'];

    // Kiểm tra action để xác định hành động cần thực hiện
    if ($action == "duyet") {
        // Nếu action là "duyet", cập nhật trạng thái của đơn hàng thành đã duyệt (0)
        $sql = mysqli_query($conn, "UPDATE bill SET bill_status = 0 WHERE id_bill = '$idbill'");
    } elseif ($action == "huy") {
        // Nếu action là "huy", cập nhật trạng thái của đơn hàng thành đã hủy (-1)
        $sql = mysqli_query($conn, "UPDATE bill SET bill_status = -1 WHERE id_bill = '$idbill'");
    }

    // Sau khi thực hiện hành động, điều hướng người dùng trở lại trang quản lý đơn hàng
    header("Location: ../../index.php?action=quanlydonhang&query=lietke");
} else {
    // Nếu không có đủ tham số từ URL, có thể hiển thị thông báo lỗi hoặc xử lý theo cách khác
    echo "Lỗi: Thiếu tham số!";
}
?>
