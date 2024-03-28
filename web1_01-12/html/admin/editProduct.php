<?php
	include_once 'inc/header.php';
?>
	<h1>Sửa Thông Tin Sản Phẩm</h1>
	<form action="#">
		<div class="change_img">
			<img src="../../img/lap1.png" alt="laptop" id="product_pic">
			<div class="change_action">
			<label for="input_file" class="change_button">Thay đổi</label>
			<input type="file" id="input_file" accept="image/*"> 
			<label class="change_button" onclick="del()">Xóa</label>
			</div>
		</div>
		<div class="edit"> <!--phan loai-->
			<label for="product_brand">Loại</label>
			<select name="product_brand" id="product_name">
				<option value="acer">ACER</option>
				<option value="dell">LENOVO</option>
			</select>
		</div>
		<div class="edit">
			<label for="product_name">Tên</label>
			<input type="text" name="product_name" value="laptop Dell">
		</div>
		<div class="edit">
			<label for="product_price">Giá</label>
			<input type="text" name="product_price" value="18.999.999đ">
		</div>
		<div class="edit">
			<label for="product_quantity">Số lượng</label>
			<input type="number" name="product_quantity" value="15">
		</div>
		<div class="edit">
			<label for="product_quantity">Mô tả</label>
			<textarea name="textarea_field">Laptop Asus còn có lối thiết kế hầm hố với sắc đen nam tính, tạo nên sự mạnh mẽ, đậm tính thể thao.</textarea>
		</div>
		<div>
		<div class="buttons">
			<a href="productAdmin.php"><i class="fa-solid fa-x"></i>Đóng</a>
			<a onclick="warning()"><i class="fa-solid fa-download"></i>Cập nhật</a>
		</div>
	</form>  
<?php
	include_once 'inc/footer.php';
?>                 