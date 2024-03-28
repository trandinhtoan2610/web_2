<?php
	include_once 'inc/header.php';
?>
        <h1>Đơn Hàng</h1>
        <!--product list-->
        <div class="filter">
            <div class="date">
                <label for="start">Từ ngày: </label>
                    <input type="date" id="start" name="start" value="2023-11-24" min="2018-01-01" max="2023-12-31">
                    <label for="start">đến </label>
                    <input type="date" id="end" name="end" value="2023-11-30" min="2018-01-01" max="2023-12-31">
            </div>
            <a href="orderAdmin.php" class="show"></i>Xem</a>
        </div>
        <table>
            <!--noi dung tieu de-->
            <tr class="title">
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Địa chỉ</th>
                <th>Thành tiền</th>
                <th>Trạng thái</th>
            </tr>
            <!--noi dung cac san pham-->
            <tr class="product">
                <td><a href="orderDetail.php">#1</a></td>
                <td>Nguyễn Mạnh Hùng</td>
                <td>123 Nguyễn Thị Minh Khai, Quận 1, TpHCM</td>
                <td>16.490.000đ</td>
                <td class="state">Đã nhận</td>
            </tr>
            <tr class="product">
                <td><a href="orderDetail.php">#2</a></td>
                <td>Phạm Hoàng Phú</td>
                <td>123 Nguyễn Thị Minh Khai, Quận 1, TpHCM</td>
                <td>16.490.000đ</td>
                <td class="state">Đã nhận</td>
            </tr>
            <tr class="product">
                <td><a href="orderDetail.php">#3</a></td>
                <td>Lê Thị Uyên</td>
                <td>123 Nguyễn Thị Minh Khai, Quận 1, TpHCM</td>
                <td>16.490.000đ</td>
                <td class="state">Đã nhận</td>
            </tr>
        </table>
        <div class="pagination">
            <a href="orderAdmin.php">&lt;</a>
            <a href="orderAdmin.php">1</a>
            <a href="orderAdmin2.php" class="active">2</a>
            <a href="orderAdmin2.php">&gt;</a>
        </div>
<?php
    include_once 'inc/footer.php';
?>   