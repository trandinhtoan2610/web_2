<?php
	include_once 'inc/header.php';
?>
    <h1>Thống Kê</h1>
    <!--product list-->
    <div class="filter">
        <!--chon filter-->
        <span><input type="radio" name="chon" value="ten" id="ten" onclick="checkTen()" checked>Theo tên sản phẩm</span>
        <span><input type="radio" name="chon" value="loai" id="loai" onclick="checkLoai()">Theo loại sản phẩm</span>
        <!--thong ke theo ten sp-->
        <input type="text" name="tenSp" id="tenSp" value="laptop Acer">
        <!--thong ke theo loai san pham-->
        <select name="loaiSp" id="loaiSp">
            <option value="acer">ACER</option>
            <option value="dell">LENOVO</option>
        </select>
        <div class="date">
            <label for="start">Từ ngày: </label>
            <input type="date" id="start" name="start" value="2023-11-24" min="2018-01-01" max="2023-12-31">
            <label for="start">đến </label>
            <input type="date" id="end" name="end" value="2023-11-30" min="2018-01-01" max="2023-12-31">
        </div>
        <a onclick="move()" class="thongKe"></i>Thống kê</a>
    </div>
    
    <table>
        <!--noi dung tieu de-->
        <tr class="title">
            <th>Mã đơn hàng</th>
            <th>Khách hàng</th>
            <th>Địa chỉ</th>
            <th>Thành tiền</th>
            <th>Trạng thái</th>
            <th>Số Lượng / Đơn Hàng</th>
        </tr>
        <!--noi dung cac san pham-->
        <tr class="product">
            <td><a href="orderDetailTen.php">#1</a></td>
            <td>Nguyễn Mạnh Hùng</td>
            <td>123 Nguyễn Thị Minh Khai, Quận 1, TpHCM</td>
            <td>16.490.000đ</td>
            <td class="state">Đã nhận</td>
            <td>2</td>
        </tr>
        <tr class="product">
            <td><a href="orderDetailTen.php">#2</a></td>
            <td>Phạm Hoàng Phú</td>
            <td>123 Nguyễn Thị Minh Khai, Quận 1, TpHCM</td>
            <td>16.490.000đ</td>
            <td class="state">Đã nhận</td>
            <td>1</td>
        </tr>
        <tr class="product">
            <td><a href="orderDetailTen.php">#3</a></td>
            <td>Lê Thị Uyên</td>
            <td>123 Nguyễn Thị Minh Khai, Quận 1, TpHCM</td>
            <td>16.490.000đ</td>
            <td class="state">Đã nhận</td>
            <td>3</td>
        </tr>
        <tr class="product sum">
            <td colspan="5" class="tong">Tổng</td>
            <td>6</td>
        </tr>
    </table>

    <div class="pagination">
        <a href="thongKeAdmin.php">&lt;</a>
        <a href="thongKeAdmin.php">1</a>
        <a href="thongKeAdmin2.php" class="active">2</a>
        <a href="thongKeAdmin2.php">&gt;</a>
    </div>
<?php
    include_once 'inc/footer.php';
?>     