<?php
    include 'inc/header.php';
?>
<h1>Thêm Người Dùng</h1>
	<form id="add-form-user" method="post" enctype="multipart/form-data">
		<div class="edit"> <!--phan loai-->
			<label for="loaiUser">Loại người dùng</label>
			<select name="phanquyen" id="loaiUser">
				<option value="AD">Admin</option>
				<option value="KH">Khách hàng</option>
			</select>
		</div>
		<div class="edit">
			<label for="tenTK">Tên</label>
			<input type="text" name="tenTK">
		</div>
		<div class="edit">
			<label for="email">Email</label>
			<input type="text" name="email">
		</div>
		<div class="edit">
			<label for="dienthoai">Điện thoại</label>
			<input type="text" name="dienthoai">
		</div>
		<div class="edit">
			<label for="diachi">Địa chỉ</label>
			<input type="text" name="diachi">
		</div>
		<div class="edit">
			<label for="matkhau">Mật khẩu</label>
			<input type="password" name="matkhau">
		</div>
		<div class="buttons">
			<a href="?page=user"><i class="fa-solid fa-x"></i>Đóng</a>
			<input type="hidden" name="add-user-btn" value="submit">
			<button type="submit" name="add-user-btn"><i class="fa-solid fa-plus"></i>Thêm</button>
		</div>
	</form>
</section>    
<?php
    include 'inc/footer.php';
?>