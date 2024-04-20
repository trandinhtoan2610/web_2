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
				<label for="tenhang">Tên hãng sản xuất</label>	
				<input type="text" name="tenhang">
			</div>

			<div class="buttons">
				<input type="submit" name="themhangsanxuat" id="themhangsanxuat" value="Thêm hãng sản xuất">
			</div>
		</form>
	</section>
</main>