<main>
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

// Xử lý khi form được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Truy vấn các đơn hàng trong khoảng thời gian đã nhập
    $sql = "SELECT user.username, SUM(bill_detail.soluongmua * sanpham.giaGoc) AS total_amount
            FROM bill
            INNER JOIN bill_detail ON bill.id_bill = bill_detail.id_bill
            INNER JOIN user ON bill.id_user = user.id_user
            INNER JOIN sanpham ON bill_detail.masp = sanpham.masp
            WHERE bill.thoigian BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'
            GROUP BY user.username
            ORDER BY total_amount DESC
            LIMIT 5";

    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang admin Thống kê</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
        }

        .result h2 {
            margin-bottom: 10px;
        }

        .result ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .result li {
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .result li:hover {
            background-color: #f2f2f2;
        }

        .detail-link {
            color: #007bff;
            text-decoration: none;
        }

        .detail-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Trang admin Thống kê</h1>
        <form action="" method="post">
            <label for="start_date">Từ ngày:</label>
            <input type="date" id="start_date" name="start_date">

            <label for="end_date">Đến ngày:</label>
            <input type="date" id="end_date" name="end_date">

            <input type="submit" value="Thống kê">
        </form>

        <div class="result">
            <?php
            // Hiển thị kết quả nếu có
            if (isset($result)) {
                if ($result->num_rows > 0) {
                    echo "<h2>Top 5 người dùng có mức mua hàng cao nhất trong khoảng thời gian từ $start_date đến $end_date:</h2>";
                    echo "<ul>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<li><span>{$row['username']}</span> - <span class='total'>Tổng mua: " . number_format($row['total_amount'], 0, ',', '.') . " VNĐ</span> - <a class='detail-link' href='?action=qlthongke&query=chitietdonhang&username={$row['username']}'>Xem chi tiết</a></li>";

                    }
                    echo "</ul>";
                } else {
                    echo "<p>Không có dữ liệu thống kê trong khoảng thời gian đã chọn.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>


</main>