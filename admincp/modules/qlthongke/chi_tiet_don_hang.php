<?php
// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy thông tin người dùng từ tham số trên URL
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Truy vấn CSDL để lấy chi tiết đơn hàng của người dùng
    $sql = "SELECT bill.*, sanpham.tensp, sanpham.giaGoc, bill_detail.soluongmua
            FROM bill
            INNER JOIN bill_detail ON bill.id_bill = bill_detail.id_bill
            INNER JOIN sanpham ON bill_detail.masp = sanpham.masp
            INNER JOIN user ON bill.id_user = user.id_user
            WHERE user.username = '$username'";

    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$total_amount = 0; // Tổng tiền của tất cả sản phẩm trong đơn hàng

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .back-btn {
            display: block;
            width: 100px;
            margin: 20px auto;
            text-align: center;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chi tiết đơn hàng của <?php echo $username; ?></h1>
        <?php
        // Hiển thị thông tin đơn hàng nếu có
        if (isset($result) && $result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Mã đơn hàng</th><th>Sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Thành tiền</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id_bill']}</td>";
                echo "<td>{$row['tensp']}</td>";
                echo "<td>{$row['giaGoc']} VNĐ</td>";
                echo "<td>{$row['soluongmua']}</td>";
                $thanh_tien = $row['giaGoc'] * $row['soluongmua']; // Tính thành tiền cho sản phẩm
                echo "<td>{$thanh_tien} VNĐ</td>";
                echo "</tr>";
                
                // Cập nhật tổng tiền của tất cả sản phẩm
                $total_amount += $thanh_tien;
            }
            echo "<tr><td colspan='4' style='text-align: right;'>Tổng tiền:</td><td>{$total_amount} VNĐ</td></tr>";
            echo "</table>";
        } else {
            echo "<p>Không có đơn hàng nào cho người dùng này.</p>";
        }
        ?>
        <a class="back-btn" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Quay lại</a>
    </div>
</body>
</html>

