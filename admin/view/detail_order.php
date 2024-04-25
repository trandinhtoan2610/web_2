<?php
    include_once 'inc/header.php';
?>  
    <h1>Thông Tin Đơn Hàng</h1>
    <table class="detail-order">
        <!--noi dung tieu de-->
    <tr class="title">
        <th>Mã</th>
        <th>Hình ảnh</th>
        <th>Sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th> <!--don gia/ san pham-->
        <th>Thành tiền</th>
    </tr>
    <!--noi dung cac san pham-->
    <?php
        foreach($sanpham as $item){
            extract($item);
    ?>
        <tr>
            <td class="product_id"><?=$idSP?></td>
            <td class="product"><img src="../uploads/uploads_product/<?=$hinhanh?>" alt="person"></td>
            <td><?=$tenSP?></td>
            <td><?=$soluong?></td>
            <td><?=number_format($giaban,0,"",".");?>đ</td>
            <td><?=number_format($giaban*$soluong,0,"",".");?>đ</td>
        </tr>
    <?php
        }
    ?>
    <tr>
        <th colspan="5">Tổng tiền</th>
        <td style="color: red;"><?=number_format($tongtien,0,"",".");?>đ</td>
    </tr>
    </table>
    <form>
        <div class="edit"> <!--phan loai-->
            <label for="tenTK">Khách hàng</label>
            <input type="text" value="<?=$tenTK?>" disabled>
        </div>
        <div class="edit">
            <label for="email">Email</label>
            <input type="text" value="<?=$email?>" disabled>
        </div>
        <div class="edit">
            <label for="dienthoai">Điện thoại</label>
            <input type="text" value="<?=$dienthoai?>" disabled>
        </div>
        <div class="edit">
            <label for="diachigiao">Địa chỉ giao</label>
            <input type="text" value="<?=$diachigiao?>" disabled>
        </div>
        <div class="edit">
            <label for="ngaytao">Ngày tạo</label>
            <input type="text" value="<?=$ngaytao?>" disabled>
        </div>
        <div class="edit">
            <label for="ngaycapnhat">Ngày cập nhật</label>
            <input type="text" value="<?=$ngaycapnhat?>" disabled>
        </div>
        <div class="edit">
            <label for="thanhtoan">Thanh toán</label>
            <input type="text" 
            <?php
                if($thanhtoan == "trc") echo 'value = "Trực tuyến"';
                else echo 'value = "Tiền mặt"';
            ?>
            disabled>
        </div>
        <div class="edit">
            <label for="trangthai">Trạng thái</label>
            <input type="text" 
            <?php
                if($trangthai=="cho") echo 'value= "Chờ duyệt""';
                if($trangthai=="vc") echo 'value= "Đang vận chuyển"';
                if($trangthai=="ht") echo 'value= "Hoàn tất"';
                if($trangthai=="huykh") echo 'value= "Hủy bởi khách hàng"';
                if($trangthai=="huynv") echo 'value= "Hủy bởi nhân viên"';
            ?>
            disabled>
        </div>
        <div class="buttons">
            <a href="?page=order"><i class="fa-solid fa-x"></i>Đóng</a>
        </div>
    </form>
<?php
    include_once 'inc/footer.php';
?>