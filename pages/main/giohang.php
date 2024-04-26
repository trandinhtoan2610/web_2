<?php

// Kiểm tra nếu giỏ hàng không tồn tại, tạo mới
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý khi thêm hoặc xóa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Xử lý khi nhấn nút thêm vào giỏ hàng
    if (isset($_POST['masp']) && isset($_POST['soluong'])) {
        $masp = $_POST['masp'];
        $soluong = $_POST['soluong'];

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (array_key_exists($masp, $_SESSION['cart'])) {
            // Nếu có, cập nhật số lượng
            $_SESSION['cart'][$masp] += $soluong;
        } else {
            // Nếu không, thêm mới vào giỏ hàng
            $_SESSION['cart'][$masp] = $soluong;
        }
    }
    // Xử lý khi nhấn nút xóa sản phẩm khỏi giỏ hàng
    elseif (isset($_POST['xoa_masp'])) {
        $xoa_masp = $_POST['xoa_masp'];

        // Kiểm tra xem mã sản phẩm cần xóa có trong giỏ hàng không
        if (array_key_exists($xoa_masp, $_SESSION['cart'])) {
            // Nếu có, xóa sản phẩm khỏi giỏ hàng
            unset($_SESSION['cart'][$xoa_masp]);
        }
    }
    // Xử lý khi nhấn nút thanh toán
    elseif (isset($_POST['thanhtoan'])) {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['username'])) {
            header("Location: login.php"); // Chuyển hướng nếu chưa đăng nhập
            exit;
        }

        // Lấy thông tin đăng nhập của người dùng
        $username = $_SESSION['username'];

        // Truy vấn CSDL để lấy id_user tương ứng với username đã đăng nhập
        $sql = "SELECT id_user FROM user WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_user = $row['id_user'];

            // Tạo đơn hàng trong CSDL
            $thoigian = date('Y-m-d H:i:s'); // Thời gian hiện tại
            $bill_status = 'pending'; // Trạng thái đơn hàng

            $sql = "INSERT INTO bill (bill_status, id_user, thoigian) VALUES ('$bill_status', '$id_user', '$thoigian')";
            $conn->query($sql);

            $id_bill = $conn->insert_id; // Lấy ID của đơn hàng vừa được tạo

            // Tạo các bản ghi trong bảng bill_detail cho từng sản phẩm trong giỏ hàng
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $masp => $soluong) {
                    $sql = "INSERT INTO bill_detail (id_bill, masp, soluongmua) VALUES ('$id_bill', '$masp', '$soluong')";
                    $conn->query($sql);
                }
            }

            // Xóa giỏ hàng sau khi thanh toán
            $_SESSION['cart'] = [];

            // Chuyển hướng người dùng đến trang cảm ơn hoặc trang chính
            header("Location: index.php"); // Điều hướng đến trang cảm ơn
            exit;
        } else {
            echo "Không tìm thấy id_user cho người dùng đã đăng nhập.";
            exit;
        }
    }
}

// Lấy thông tin sản phẩm từ CSDL
$cart_items = [];
$total_price = 0; // Tổng tiền
if (!empty($_SESSION['cart'])) {
    $masp_list = implode(",", array_keys($_SESSION['cart']));
    $sql = "SELECT * FROM sanpham WHERE masp IN ($masp_list)";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $row['soluong'] = $_SESSION['cart'][$row['masp']];
        $cart_items[] = $row;
        // Tính tổng tiền từng sản phẩm
        $total_price += $row['giaGoc'] * $row['soluong'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
</head>
<body>
    <h1 style="text-align:center;margin:30px;">Giỏ hàng</h1>
    <div class="table-wrapper">
    <table>
        <tr>
            <th>Mã SP</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Xóa</th> <!-- Thêm cột xóa -->
        </tr>
        <?php if (!empty($cart_items)): ?>
            <?php foreach ($cart_items as $item): ?>
            <tr>
                <td><?php echo $item['masp']; ?></td>
                <td><?php echo $item['tensp']; ?></td>
                <td><?php echo $item['giaGoc']; ?></td>
                <td><?php echo $item['soluong']; ?></td>
                <td> <!-- Nút xóa -->
                    <form action="" method="post">
                        <input type="hidden" name="xoa_masp" value="<?php echo $item['masp']; ?>">
                        <input class="delete-btn" type="submit" value="Xóa">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Không có sản phẩm trong giỏ hàng</td>
            </tr>
        <?php endif; ?>
        <tr>
            <td>&nbsp;</td>
            <td>Tổng:</td>
            <td>&nbsp;</td>
            <td><?php echo number_format($total_price, 0, ',', '.'); ?> VNĐ</td>
            <td>&nbsp;</td> <!-- Thêm cột xóa -->
        </tr>
    </table>
    </div>
    

    <!-- Nút thanh toán -->
    <div class="right">
        <form action="" method="post">
            <input class="thanhtoan-btn" type="submit" name="thanhtoan" value="Thanh toán">
        </form>
    </div>
</body>
</html>
