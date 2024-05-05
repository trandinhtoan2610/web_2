<?php
    include 'inc/header.php';
?>
<h1>Sửa Thông Tin Người Dùng</h1>
<form id="edit-form-user" method="post" enctype="multipart/form-data">
	<input type="hidden" name="idTK" value="<?=$idTK?>">
	<div class="edit"> <!--phan loai user-->
		<label for="loaiUser">Loại người dùng</label>
		<select name="phanquyen" id="loaiUser">
			<option value="AD" 
			<?php if($phanquyen=="AD") echo'selected'; ?>>Admin</option>
			<option value="KH"
			<?php if($phanquyen=="KH") echo'selected'; ?>>Khách hàng</option>
		</select>
	</div>
	<div class="edit">
		<label for="tenTK">Tên</label>
		<input type="text" name="tenTK" value="<?=$tenTK?>">
	</div>
	<div class="edit">
		<label for="email">Email</label>
		<input type="text" name="email" value="<?=$email?>">
	</div>
	<div class="edit">
		<label for="dienthoai">Điện thoại</label>
		<input type="text" name="dienthoai" value="<?=$dienthoai?>">
	</div>
	<div class="edit">
		<label for="diachi">Địa chỉ</label>
		<input type="text" name="diachi" value="<?=$diachi?>">
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
	<div class="buttons">
		<a href="?page=user"><i class="fa-solid fa-x"></i>Đóng</a>
		<button type="submit" name="edit-user-btn"><i class="fa-solid fa-download"></i>Cập nhật</button>
	</div>
</form>
</section>
<?php
    include 'inc/footer.php';
?>