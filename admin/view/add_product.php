<?php
    include 'inc/header.php';
?>
<h1>Thêm Sản Phẩm</h1>
    <form id="add-form-product" method="POST" enctype="multipart/form-data">
        <div class="change_img">
			<img src="../uploads/uploads_product/pic.png" alt="productpic" id="item_pic">
			<label for="item_file" class="change_button">Thêm</label>
			<input type="file" name="input_file" id="item_file" accept="image/*">
		</div>
        <div class="edit">
            <label for="id_hangsanxuat">Hãng sản xuất</label>
            <select name="idHSX" id="idHSX">
                <?php
                    foreach($hangsanxuat as $item){
                        extract($item);
                ?>
                    <option value="<?=$idhangsanxuat?>"><?=$tenHSX?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="edit">
            <label for="tenSP">Tên sản phẩm</label>
            <input type="text" name="tenSP">
        </div>
        <div class="edit">
            <label for="giaban">Giá bán</label>
            <input type="text" name="giaban">
        </div>
        <div class="edit">
            <label for="tonkho">Tồn kho</label>
            <input type="text" name="tonkho">
        </div>
        <div class="edit">
            <label for="cpu">CPU</label>
            <input type="text" name="cpu">
        </div>
        <div class="edit">
            <label for="card">Card</label>
            <input type="text" name="card">
        </div>
        <div class="edit">
            <label for="pin">Pin</label>
            <input type="text" name="pin">
        </div>
        <div class="edit">
            <label for="ram">RAM</label>
            <input type="text" name="ram">
        </div>
        <div class="edit">
            <label for="mota">Mô tả</label>
            <textarea name="mota"></textarea>
        </div>
        <div class="buttons">
			<a href="?page=product"><i class="fa-solid fa-x"></i>Đóng</a>
			<input type="hidden" name="add-product-btn" value="submit">
			<button type="submit" name="add-product-btn"><i class="fa-solid fa-plus"></i>Thêm</button>
		</div>
    </form>
</section>
<?php
    include 'inc/footer.php';
?>