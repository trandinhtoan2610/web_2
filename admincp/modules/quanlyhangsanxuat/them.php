<main>
	<section id="main">
		<form method="POST" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
			<div class="edit">
				<label for="maloai">Loại</label>
				<!-- <input type="text" name="maloai"> -->
				<select name="maloai" id="maloai">
					<?php
					while ($row_loaisanpham = mysqli_fetch_assoc($sql_loaisanpham)) {
						echo "<option value='" . $row_loaisanpham['maloai'] . "'>" . $row_loaisanpham['maloai'] . "</option>";
					}
					?>
				</select>
			</div>

			<div class="edit">
				<label for="thutu">Thứ tự</label>
				<input type="text" name="thutu">
			</div>

			<div class="edit">
				<label for="tensanpham">Tên</label>
				<input type="text" name="tensp">
			</div>
			<div class="edit">
				<label for="hinhAnh">Hình Ảnh</label>
				<input type="file" name="hinhAnh" class="hinhanh">
			</div>

			<div class="edit">
				<label for="product_price">Giá</label>
				<input type="text" name="product_price">
			</div>
			<div class="edit">
				<label for="soluong">Số lượng</label>
				<input type="number" name="soluong">
			</div>
			<div class="edit">
				<label for="product_quantity">Mô tả</label>
				<textarea name="textarea_field"></textarea>
			</div>

			<div class="edit">
				<label for="tinhtrang">Tình trạng</label>
				<select name="tinhtrang">
					<option value="1">Kích hoạt</option>
					<option value="0">Ẩn</option>
				</select>
			</div>

			<div class="buttons">
				<input type="submit" name="themsanpham" id="themsanpham" value="Thêm sản phẩm">
			</div>
		</form>
	</section>
</main>