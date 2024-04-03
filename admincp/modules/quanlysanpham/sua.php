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
					<img style="width: 10%;" src="../img/<?php echo $row['hinhAnh'] ?>">
					<input type="file" name="hinhAnh" class="hinhanh" style="cursor: pointer;">
				</div>

				<div class="edit">
					<label for="id_hangsanxuat">Hãng sản xuất</label>
					<select name="id_hangsanxuat" id="id_hangsanxuat">
						<?php
						$sql_hangsanxuat = mysqli_query($conn, 'SELECT * FROM hangsanxuat ORDER BY id_hangsanxuat DESC');
						while ($row_hangsanxuat = mysqli_fetch_array($sql_hangsanxuat)) {
							if ($row_hangsanxuat['id_hangsanxuat'] == $row['id_hangsanxuat']) {
								?>
								<option selected value="<?php echo $row_hangsanxuat['id_hangsanxuat'] ?>">
									<?php echo $row_hangsanxuat['tenhang'] ?>
								</option>
								<?php
							} else {
								?>
								<option value="<?php echo $row_hangsanxuat['id_hangsanxuat'] ?>">
									<?php echo $row_hangsanxuat['tenhang'] ?>
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
					<label for="tensp">Tên sản phẩm</label>
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
					<label for="moTa">Mô tả</label>
					<textarea name="moTa"></textarea>
				</div>
				<div class="buttons">
					<input type="submit" name="suasanpham" id="suasanpham" value="Sửa sản phẩm " style="color: black;
								border: 1px solid black;
								width: 150px;
								padding: 5px 10px;
								border-radius: 4px;
								text-decoration: none;
								margin-right: 4px;
								cursor: pointer">
				</div>

				<?php
			}
			?>
		</form>
	</section>
</main>
