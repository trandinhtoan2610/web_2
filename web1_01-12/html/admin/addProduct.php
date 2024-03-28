<?php
	include_once 'inc/header.php';
?>
	<h1>Thêm Sản Phẩm</h1>
	<form action="#" id="formId">
		<div class="change_img">
			<img src="../../img/pic.png" alt="laptop" id="product_pic">
			<label for="input_file" class="change_button">Thêm</label>
			<input type="file" id="input_file" accept="image/*">
		</div>
		<div class="edit"> <!--phan loai-->
			<label for="product_brand">Loại</label>
			<select name="product_brand" id="product_name">
				<option value="acer">ACER</option>
				<option value="lenovo">LENOVO</option>
			</select>
		</div>
		<div class="edit">
			<label for="product_name">Tên</label>
			<input type="text" name="product_name" required>
		</div> 
		<div class="edit">
			<label for="product_price">Giá</label>
			<input type="text" name="product_price" required>
		</div>
		<div class="edit">
			<label for="product_quantity">Số lượng</label>
			<input type="number" name="product_quantity" required>
		</div>
		<div class="edit">
			<label for="product_quantity">Mô tả</label>
			<textarea name="textarea_field"></textarea>
		</div>
		<div class="buttons">
			<a href="productAdmin.php"><i class="fa-solid fa-x"></i>Đóng</a>
			<a onclick="warning()" class="save" id="saveButton"><i class="fa-solid fa-plus"></i>Thêm</a>
		</div>
	</form>
<?php
	include_once 'inc/footer.php';
?>           