<main>
	<section id="main">
		<form method="POST" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
			<div class="edit">
				<label for="hinhAnh">Hình Ảnh</label>
				<input type="file" name="hinhAnh" class="hinhanh">
			</div>
			
			<div class="edit">
				<label for="id_loaisanpham">Loại</label>
				<!-- <input type="text" name="maloai"> -->
				<select name="id_loaisanpham" id="id_loaisanpham">
					<?php
					$sql_loaisanpham = mysqli_query($conn,'SELECT * FROM loaisanpham ');
					while($row_loaisanpham = mysqli_fetch_array($sql_loaisanpham)){
					?>
						<option value="<?php echo $row_loaisanpham['id_loaisanpham']?>"><?php echo $row_loaisanpham['tenloai']?></option>
					<?php
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
				<label for="giaGoc">Giá Gốc</label>
				<input type="text" name="giaGoc">
			</div>
			<div class="edit">
				<label for="soluong">Số lượng</label>
				<input type="number" name="soluong">
			</div>
			
			<div class="edit">
				<label for="tinhtrang">Tình trạng</label>
				<select name="tinhtrang">
					<option value="1">Kích hoạt</option>
					<option value="0">Ẩn</option>
				</select>
			</div>
			<div class="edit">
				<label for="product_quantity">Mô tả</label>
				<textarea name="textarea_field"></textarea>
			</div>

			<div class="buttons">
				<input type="submit" name="themsanpham" id="themsanpham" value="Thêm sản phẩm">
			</div>
		</form>
	</section>
</main>