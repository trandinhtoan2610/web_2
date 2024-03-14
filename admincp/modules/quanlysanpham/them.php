<main>
	<section id="main">
		<form method="POST" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
			<div class="edit">
				<label for="hinhAnh">Hình Ảnh</label>
				<input type="file" name="hinhAnh" class="hinhanh">
			</div>
			
			<div class="edit">
				<label for="id_hangsanxuat">Hãng sản xuất</label>
				<select name="id_hangsanxuat" id="id_hangsanxuat">
					<?php
					$sql_hangsanxuat = mysqli_query($conn, 'SELECT * FROM hangsanxuat');
					while ($row_hangsanxuat = mysqli_fetch_array($sql_hangsanxuat)) {
					?>
						<option value="<?php echo $row_hangsanxuat['id_hangsanxuat']?>"><?php echo $row_hangsanxuat['tenhang']?></option>
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
				<label for="tensp">Tên sản phẩm</label>
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
				<label for="moTa">Mô tả</label>
				<textarea name="moTa"></textarea>
			</div>

			<div class="buttons">
				<input type="submit" name="themsanpham" id="themsanpham" value="Thêm sản phẩm">
			</div>
		</form>
	</section>
</main>
