<?php
    include 'inc/header.php';
?>
<h1>Thông Tin Người Dùng</h1>
<form>
    <div class="change_img">
        <img src="../uploads/uploads_user/<?=$avatar?>" alt="avatar" id="item_pic" style="margin-bottom: 10px;">
    </div>
    <div class="edit">
        <label for="product_name">Loại người dùng</label>
        <input type="text" 
        value="<?php
            if($phanquyen=="AD") echo 'Admin';
            else echo 'Khách hàng';
        ?>" disabled>
    </div> 
    <div class="edit">
        <label for="product_name">Tên</label>
        <input type="text" value="<?=$tenTK?>" disabled>
    </div> 
    <div class="edit">
        <label for="product_price">Email</label>
        <input type="text" value="<?=$email?>" disabled>
    </div>
    <div class="edit">
        <label for="dienthoai">Điện thoại</label>
        <input type="text" name="dienthoai" value="<?=$dienthoai?>" disabled>
    </div>
    <div class="edit">
        <label for="diachi">Địa chỉ</label>
        <input type="text" name="diachi" value="<?=$diachi?>" disabled>
    </div>
    <div class="edit">
        <label for="trangthai">Trạng thái</label>
        <span style="padding-left: 0;">
            <label for="hoatdong" style="text-align: center; margin-left:10px; width:100px">Hoạt động</label>
            <input type="radio" name="trangthai" value="1" id="hoatdong" disabled
            <?php if($trangthai==1) echo'checked'; ?>>
            <label for="khoa" style="text-align: center; width:100px;">Bị khóa</label>
            <input type="radio" name="trangthai" value="0" id="khoa" disabled
            <?php if($trangthai==0) echo'checked'; ?>>
        </span>
    </div>
    <div class="buttons">
        <a href="?page=user"><i class="fa-solid fa-x"></i>Đóng</a>
    </div>
</form>
</section>    
<?php
    include 'inc/footer.php';
?>