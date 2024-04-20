<?php
$sql_sua_hangsanxuat = mysqli_query($conn, "SELECT * FROM hangsanxuat where id_hangsanxuat='$_GET[idhang]' LIMIT 1");
?>
<h1>Sửa thông tin hãng sản xuất</h1>
<main>
	<section id="main">
		<form method="POST" action="modules/quanlyhangsanxuat/xuly.php?idhang=<?php echo $_GET['idhang'] ?>"
			enctype="multipart/form-data">
			<?php
			while ($row = mysqli_fetch_array($sql_sua_hangsanxuat)) {
				?>
				<div class="edit">
					<label for="hinhAnh">Hình Ảnh</label>
					<img src="../img/<?php echo $row['hinhAnh'] ?>">
					<input type="file" name="hinhAnh" class="hinhanh">
				</div>

				<div class="edit">
					<label for="tenhang">Tên hãng sản xuất</label>
					<input type="text" name="tenhang" value="<?php echo $row['tenhang'] ?>">
				</div>

				<div class="edit">
					<label for="thutu">Thứ tự</label>
					<input type="text" name="thutu" value="<?php echo $row['thutu'] ?>">
				</div>

				<div class="buttons">
					<input type="submit" name="suahangsanxuat" id="suahangsanxuat" value="Sửa hãng sản xuất" style="color: black;
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