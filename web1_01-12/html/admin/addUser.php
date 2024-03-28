<?php
	include_once 'inc/header.php';
?>
	<h1>Thêm Người Dùng</h1>
	<form action="#" id="formId">
		<div class="change_img">
			<img src="../../img/pic.png" alt="userAvatar" id="product_pic">
			<label for="input_file" class="change_button">Thêm</label>
			<input type="file" id="input_file" accept="image/*">
		</div>
		<div class="edit"> <!--phan loai-->
			<label for="loaiUser">Loại người dùng</label>
			<select name="loaiUser" id="loaiUser">
				<option value="admin">Admin</option>
				<option value="client">Khách hàng</option>
			</select>
		</div>
		<div class="edit">
			<label for="product_name">Tên</label>
			<input type="text" name="product_name">
		</div>
		<div class="edit">
			<label for="email">Email</label>
			<input type="text" name="email">
		</div>
		<div class="buttons">
			<a href="userAdmin.php"><i class="fa-solid fa-x"></i>Đóng</a>
			<a onclick="warning()"><i class="fa-solid fa-plus"></i>Thêm</a>
		</div>
	</form>
<?php
	include_once 'inc/footer.php';
?>            