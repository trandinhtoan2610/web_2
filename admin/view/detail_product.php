<?php
    include 'inc/header.php';
?>
<h1>Thông Tin Sản Phẩm</h1>
    <form>
        <div class="change_img">
            <img src="../uploads/uploads_product/<?=$hinhanh?>" alt="productpic" id="item_pic" style="margin-bottom: 10px;">
        </div>
        <div class="edit">
            <label for="idHSX">Hãng sản xuất</label>
            <input type="text" value="<?=$hangsanxuat['tenHSX']?>" disabled>
        </div>
        <div class="edit">
            <label for="tenSP">Tên sản phẩm</label>
            <input type="text" name="tenSP" value="<?=$tenSP?>" disabled>
        </div>
        <div class="edit">
            <label for="giaban">Giá bán</label>
            <input type="text" name="giaban" value="<?=$giaban?>" disabled>
        </div>
        <div class="edit">
            <label for="tonkho">Tồn kho</label>
            <input type="text" name="tonkho" value="<?=$tonkho?>" disabled>
        </div>
        <div class="edit">
            <label for="cpu">CPU</label>
            <input type="text" name="cpu" value="<?=$cpu?>" disabled>
        </div>
        <div class="edit">
            <label for="card">Card</label>
            <input type="text" name="card" value="<?=$card?>" disabled>
        </div>
        <div class="edit">
            <label for="pin">Pin</label>
            <input type="text" name="pin" value="<?=$pin?>" disabled>
        </div>
        <div class="edit">
            <label for="ram">RAM</label>
            <input type="text" name="ram" value="<?=$ram?>" disabled>
        </div>
        <div class="edit">
            <label for="trangthai">Trạng thái</label>
            <span style="padding-left: 0;">
                <label for="hoatdong" style="text-align: center; margin-left:10px; width:100px">Hoạt động</label>
                <input type="radio" name="trangthai" value="1" id="hoatdong"  disabled
                <?php if($trangthai==1) echo'checked'; ?>>
                <label for="khoa" style="text-align: center; width:100px;">Bị khóa</label>
                <input type="radio" name="trangthai" value="0" id="khoa"  disabled
                <?php if($trangthai==0) echo'checked'; ?>>
            </span>
        </div>
        <div class="edit">
            <label for="mota">Mô tả</label>
            <textarea name="mota" disabled><?=$mota?></textarea>
        </div>
        <div class="buttons">
            <a href="?page=product"><i class="fa-solid fa-x"></i>Đóng</a>
        </div>
        </form>
</section>
<?php
    include 'inc/footer.php';
?>