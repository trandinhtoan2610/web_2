<?php extract($result); ?>
<h1>Sửa Thông Tin Người Dùng</h1>
<form action="index.php?page=editUser" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?=$ID?>">
	<div class="change_img">
		<img src="uploads/<?=$avatar?>" alt="userAvatar" id="user_pic">
		<input type="hidden" name="curr_img" value="<?=$avatar?>"> <!--luu lai img hien tai-->
		<label for="input_file" class="change_button">Thay đổi</label>
		<input type="file" name="input_file" id="input_file" accept="image/*">
	</div>
	<div class="edit"> <!--phan loai user-->
		<label for="loaiUser">Loại người dùng</label>
		<select name="phanquyen" id="loaiUser">
			<option value="0" 
			<?php if($phanquyen==0) echo'selected'; ?>>Admin</option>
			<option value="1"
			<?php if($phanquyen==1) echo'selected'; ?>>Khách hàng</option>
		</select>
	</div>
	<div class="edit">
		<label for="user_name">Tên</label>
		<input type="text" name="ten" value="<?=$ten?>" required>
	</div>
	<div class="edit">
		<label for="email">Email</label>
		<input type="text" name="email" value="<?=$email?>" pattern="^[^ ]+@[^ ]+\.[a-z]{2,3}$" required>
	</div>
	<div class="edit">
		<label for="dienthoai">Điện thoại</label>
		<input type="text" name="dienthoai" value="<?=$dienthoai?>" pattern="0\d{9,10}" required>
	</div>
	<div class="edit">
		<label for="diachi">Địa chỉ</label>
		<input type="text" name="diachi" value="<?=$diachi?>" required>
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
		<a href="index.php?page=userAdmin"><i class="fa-solid fa-x"></i>Đóng</a>
		<button type="submit" onsubmit="return fillFrm()" name="btnedit"><i class="fa-solid fa-download"></i>Cập nhật</button>
	</div>
</form>
</section>