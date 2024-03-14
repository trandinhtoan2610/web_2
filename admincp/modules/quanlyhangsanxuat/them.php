<main>
	<section id="main">
		<form method="POST" action="modules/quanlyhangsanxuat/xuly.php" enctype="multipart/form-data">
			<div class="edit">
				<label for="hinhAnh">Hình Ảnh</label>
				<input type="file" name="hinhAnh" class="hinhanh">
			</div>
			
			<div class="edit">
				<label for="thutu">Thứ tự</label>
				<input type="text" name="thutu">
			</div>

			<div class="edit">
				<label for="tenloai">Tên loại</label>	
				<input type="text" name="tenloai">
			</div>

			

			<div class="buttons">
				<input type="submit" name="themloaisanpham" id="themloaisanpham" value="Thêm hãng sản xuất">
			</div>
		</form>
	</section>
</main>