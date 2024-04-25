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
    <form id="edit-form-order">
        <input type="hidden" name="idDH" value="<?=$idDH?>">
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
            <input type="text" name="ngaycapnhat" value="<?=$ngaycapnhat?>" disabled>
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
            <select name="trangthai">
                <?php
                    if($trangthai=="cho"){
                        echo '<option value="cho" selected>Chờ duyệt</option>';
                        echo '<option value="vc">Đang vận chuyển</option>';
                        echo '<option value="huynv">Hủy bởi nhân viên</option>';
                    }
                    else if($trangthai=="vc"){
                        echo '<option value="vc" selected>Đang vận chuyển</option>';
                        echo '<option value="ht">Hoàn tất</option>';
                    }
                ?>
            </select>
        </div>
        <div class="buttons">
            <a href="?page=order"><i class="fa-solid fa-x"></i>Đóng</a>
            <button type="submit" name="edit-order-btn"><i class="fa-solid fa-download"></i>Cập nhật</button>
        </div>
    </form>
<?php
    include_once 'inc/footer.php';
?>