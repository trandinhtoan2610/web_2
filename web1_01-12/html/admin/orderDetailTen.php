<?php
	include_once 'inc/header.php';
?>
    <h2>Chi Tiết Đơn Hàng</h2>
    <h1>Danh sách sản phẩm</h1>
    <hr>
    <table>
        <!--noi dung tieu de-->
    <tr class="title">
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th> <!--don gia/ san pham-->
        <th>Tổng</th>
    </tr>
    <!--noi dung cac san pham-->
    <tr class="product">
        <td><a href="productDetail.php"><img src="../../img/lap1.png" alt="lap1"></a></td>
        <td>MSI Gaming GF63 Thin 11SC i5 11400H (664VN)</td>
        <td>1</td>
        <td>16.490.000đ</td>
        <td>16.490.000đ</td>
    </tr>
    <tr class="product">
        <td><a href="productDetail.php"><img src="../../img/lap2.png" alt="lap1"></a></td>
        <td>MSI Gaming GF63 Thin 11SC i5 11400H (664VN)</td>
        <td>1</td>
        <td>16.490.000đ</td>
        <td>16.490.000đ</td>
    </tr>
    <tr class="product">
        <td><a href="productDetail.php"><img src="../../img/lap3.png" alt="lap2"></a></td>
        <td>MSI Gaming GF63 Thin 11SC i5 11400H (664VN)</td>
        <td>2</td>
        <td>16.490.000đ</td>
        <td>32.980.000đ</td>
    </tr>
    </table>
    <div id="main_infor"> 
    <h1>Thông tin đơn hàng</h1>
    <hr>
        <form action="#">
            <div class="info"> <!--phan loai-->
                <label for="product_brand">Họ tên</label>
                <input type="text" value="Nguyễn Phương Anh" disabled>
            </div>
            <div class="info">
                <label for="product_name">Email</label>
                <input type="text" value="anhnguyen123@gmail.com" disabled>
            </div>
            <div class="info">
                <label for="product_price">Điện thoại</label>
                <input type="text" value="0933159357" disabled>
            </div>
            <div class="info">
                <label for="product_ram">Địa chỉ</label>
                <input type="text" value="123 Trần Hưng Đạo, Quận 5, TpHCM" disabled>
            </div>
            <div class="info">
                <label for="product_quantity">Thanh toán</label>
                <input type="text" value="Thanh toán khi nhận hàng" disabled>
            </div>
            <div class="option">
                <label for="product_quantity">Trạng thái</label>
                <label for="option1">Chưa xử lý</label>
                <input type="radio" id="option" name="option" value="chuaXuLy" disabled>
                <label for="option2">Đã xử lý</label>
                <input type="radio" id="option" name="option" value="daXuLy" checked>
            </div>
            
            <div class="buttons">
                <a href="thongKeTen.php"><i class="fa-solid fa-x"></i>Đóng</a>
            </div>
        </form>
    </div>
<?php
    include_once 'inc/footer.php';
?>  