<?php
// Kết nối CSDL
$servername = "localhost";
$username = "root"; // tên đăng nhập của bạn
$password = ""; // mật khẩu của bạn
$dbname = "web_2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy danh sách sản phẩm từ CSDL
$sql = "SELECT * FROM sanpham";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        .product img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <div class="product-container">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="product">
                <img src="path_to_your_images/<?php echo $row['hinhAnh']; ?>" alt="<?php echo $row['tensp']; ?>">
                <h2><?php echo $row['tensp']; ?></h2>
                <p>Giá: <?php echo number_format($row['giaGoc'], 0, ',', '.'); ?> VNĐ</p>
                <form action="index.php?quanly=giohang" method="post">
                    <input type="hidden" name="masp" value="<?php echo $row['masp']; ?>">
                    <label for="soluong_<?php echo $row['masp']; ?>">Số lượng:</label>
                    <input type="number" name="soluong" id="soluong_<?php echo $row['masp']; ?>" value="1" min="1">
                    <input type="submit" value="Thêm vào giỏ hàng">
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
