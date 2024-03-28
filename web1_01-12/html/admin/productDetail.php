<?php
	include_once 'inc/header.php';
?>
	<h1>Thêm Sản Phẩm</h1>
	<form action="#" id="formId">
		<div class="change_img">
			<img src="../../img/lap1.png" alt="laptop" id="product_pic" style="margin-bottom: 10px;">
		</div>
		<div class="edit">
			<label for="product_name">Loại</label>
			<input type="text" value="ACER" disabled>
		</div> 
		<div class="edit">
			<label for="product_name">Tên</label>
			<input type="text" value="laptop ACER" disabled>
		</div> 
		<div class="edit">
			<label for="product_price">Giá</label>
			<input type="text" value="18.999.999đ" disabled>
		</div>
		<div class="edit">
			<label for="product_ram">RAM</label>
			<input type="text" value="8 GBDDR4 2 khe (1 khe 8 GB onboard + 1 khe trống) 3200 MHz" disabled>
		</div>
		<div class="edit">
			<label for="product_quantity">Số lượng</label>
			<input type="text" value="15" disabled>
		</div>
		<div class="edit">
			<label for="product_quantity">Mô tả</label>
			<textarea name="textarea_field" disabled>Laptop Accer còn có lối thiết kế hầm hố với sắc đen nam tính, tạo nên sự mạnh mẽ, đậm tính thể thao.</textarea>
		</div>
		<div class="buttons">
			<a href="productAdmin.php"><i class="fa-solid fa-x"></i>Đóng</a>
			<a href="editProduct.php"><i class="fas fa-edit"></i>Chỉnh sửa</a>
		</div>
	</form>
<?php
    include_once 'inc/footer.php';
?>            