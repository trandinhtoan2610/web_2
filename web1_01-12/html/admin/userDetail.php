<?php
	include_once 'inc/header.php';
?>
	<h1>Thông Tin Người Dùng</h1>
	<form action="#" id="formId">
		<div class="change_img">
			<img src="../../img/per1.jpg" alt="avatar" id="product_pic" style="margin-bottom: 10px;">
		</div>
		<div class="edit">
			<label for="product_name">Loại người dùng</label>
			<input type="text" value="Admin" disabled>
		</div> 
		<div class="edit">
			<label for="product_name">Tên</label>
			<input type="text" value="Nguyễn Mạnh Hùng" disabled>
		</div> 
		<div class="edit">
			<label for="product_price">Email</label>
			<input type="text" value="manhhung271193@gmail.com" disabled>
		</div>
		<div class="buttons">
			<a href="userAdmin.php"><i class="fa-solid fa-x"></i>Đóng</a>
			<a href="editProduct.php"><i class="fas fa-edit"></i>Chỉnh sửa</a>
		</div>
	</form>
<?php
    include_once 'inc/footer.php';
?>             