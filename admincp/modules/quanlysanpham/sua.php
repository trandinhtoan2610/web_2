<?php
$sql_sua_sanpham = mysqli_query($conn, "SELECT * FROM sanpham where masp='$_GET[masanpham]' LIMIT 1");
?>
<h1>Sửa danh mục</h1>
<main>
	<section id="main">
		<form method="POST" action="modules/quanlysanpham/xuly.php?masanpham=<?php echo $_GET['masanpham'] ?>"
			enctype="multipart/form-data">
			<?php
			while ($row = mysqli_fetch_array($sql_sua_sanpham)) {
				?>
				<div class="edit">
					<label for="hinhAnh">Hình Ảnh</label>
					<img src="../img/<?php echo $row['hinhAnh'] ?>">
					<input type="file" name="hinhAnh" class="hinhanh">
				</div>

				<div class="edit">
					<label for="id_loaisanpham">Loại</label>
					<select name="id_loaisanpham" id="id_loaisanpham">
						<?php
						$sql_loai = mysqli_query($conn, 'SELECT * FROM loaisanpham ORDER BY id_loaisanpham DESC');
						while ($row_loai = mysqli_fetch_array($sql_loai)) {
							if ($row_loai['id_loaisanpham'] == $row['id_loaisanpham']) {
								?>
								<option selected value="<?php echo $row_loai['id_loaisanpham'] ?>">
									<?php echo $row_loai['tenloai'] ?>
								</option>
								<?php
							} else {
								?>
								<option value="<?php echo $row_loai['id_loaisanpham'] ?>">
									<?php echo $row_loai['tenloai'] ?>
								</option>
								<?php
							}
						}
						?>
					</select>
				</div>


				<div class="edit">
					<label for="thutu">Thứ tự</label>
					<input type="text" name="thutu" value="<?php echo $row['thutu'] ?>">
				</div>


				<div class="edit">
					<label for="product_name">Tên</label>
					<input type="text" name="tensp" value="<?php echo $row['tensp'] ?>">
				</div>
				<div class="edit">
					<label for="giaGoc">Giá</label>
					<input type="text" name="giaGoc" value="<?php echo $row['giaGoc'] ?>">
				</div>
				<div class="edit">
					<label for="soluong">Số lượng</label>
					<input type="number" name="soluong" value="<?php echo $row['soluong'] ?>">
				</div>

				<div class="edit">
					<label for="tinhtrang">Tình trạng</label>
					<select name="tinhtrang" id="tinhtrang">
						<?php
						if ($row['tinhtrang'] == 1) {
							?>
							<option value="1" selected>Kích hoạt</option>
							<option value="0">Ẩn</option>
							<?php
						} else {
							?>
							<option value="1">Kích hoạt</option>
							<option value="0" selected>Ẩn</option>
							<?php
						}
						?>
					</select>

				</div>
				<div class="edit">
					<label for="product_quantity">Mô tả</label>
					<textarea name="textarea_field"></textarea>
				</div>
				<div class="buttons">
					<input type="submit" name="suasanpham" id="suasanpham" value="Sửa sản phẩm">
				</div>

				<?php
			}
			?>
		</form>
	</section>
</main>