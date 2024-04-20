<?php
    include 'inc/header.php';
?>
<h1>Sửa Thông Tin Sản Phẩm</h1>
    <form action="?page=edit_product&idSP=<?=$idSP?>" method="post" enctype="multipart/form-data"  onsubmit="return formValidateProduct(this)">
        <input type="hidden" name="idSP" value="<?=$idSP?>">
    <div class="change_img">
		<img src="../uploads/uploads_product/<?=$hinhanh?>" alt="productpic" id="item_pic">
		<input type="hidden" name="curr_img" value="<?=$hinhanh?>"> <!--luu lai img hien tai-->
		<label for="item_file" class="change_button">Thay đổi</label>
		<input type="file" name="input_file" id="item_file" accept="image/*">
	</div>
        <div class="edit">
            <label for="idHSX">Hãng sản xuất</label>
            <select name="idHSX" id="idHSX">
                <?php
                    foreach($hangsanxuat as $item){
                        extract($item);
                ?>
                    <option value="<?=$idhangsanxuat?>"
                    <?php if($idHSX == $idhangsanxuat) echo 'selected'; ?>><?=$tenHSX?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="edit">
            <label for="tenSP">Tên sản phẩm</label>
            <input type="text" name="tenSP" value="<?=$tenSP?>">
        </div>
        <div class="edit">
            <label for="giaban">Giá bán</label>
            <input type="text" name="giaban" value="<?=$giaban?>">
        </div>
        <div class="edit">
            <label for="tonkho">Tồn kho</label>
            <input type="text" name="tonkho" value="<?=$tonkho?>">
        </div>
        <div class="edit">
            <label for="cpu">CPU</label>
            <input type="text" name="cpu" value="<?=$cpu?>">
        </div>
        <div class="edit">
            <label for="card">Card</label>
            <input type="text" name="card" value="<?=$card?>">
        </div>
        <div class="edit">
            <label for="pin">Pin</label>
            <input type="text" name="pin" value="<?=$pin?>">
        </div>
        <div class="edit">
            <label for="ram">RAM</label>
            <input type="text" name="ram" value="<?=$ram?>">
        </div>
        <div class="edit">
            <label for="trangthai">Trạng thái</label>
            <span style="padding-left: 0;">
                <label for="hoatdong" style="text-align: center; margin-left:10px; width:100px">Hoạt động</label>
                <input type="radio" name="trangthai" value="1" id="hoatdong"
                <?php if($trangthai==1) echo'checked'; ?>>
                <label for="khoa" style="text-align: center; width:100px;">Bị khóa</label>
                <input type="radio" name="trangthai" value="0" id="khoa"
                <?php if($trangthai==0) echo'checked'; ?>>
            </span>
        </div>
        <div class="edit">
            <label for="mota">Mô tả</label>
            <textarea name="mota"><?=$mota?></textarea>
        </div>
        <div class="buttons">
            <a href="?page=product"><i class="fa-solid fa-x"></i>Đóng</a>
            <button type="submit" name="edit-product-btn"><i class="fa-solid fa-download"></i>Cập nhật</button>
        </div>
        </form>
</section>
<?php
	if(isset($alert)){
		echo
		'<script>
		window.addEventListener("load", () => {
			alert("'.$alert.'");
		  });
		</script>';
	}
?>
<?php
    include 'inc/footer.php';
?>