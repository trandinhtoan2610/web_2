<?php
$sql_sua_loaisanpham = mysqli_query($conn, "SELECT * FROM loaisanpham where id_loaisanpham='$_GET[idloai]' LIMIT 1");
?>
<h1>Sửa danh mục</h1>
<main>
	<section id="main">
		<form method="POST" action="modules/quanlyhangsanxuat/xuly.php?idloai=<?php echo $_GET['idloai'] ?>"
			enctype="multipart/form-data">
			<?php
			while ($row = mysqli_fetch_array($sql_sua_loaisanpham)) {
				?>
				<div class="edit">
					<label for="hinhAnh">Hình Ảnh</label>
					<img src="../img/<?php echo $row['hinhAnh'] ?>">
					<input type="file" name="hinhAnh" class="hinhanh">
				</div>

				<div class="edit">
					<label for="tenloai">Tên</label>
					<input type="text" name="tenloai" value="<?php echo $row['tenloai'] ?>">
				</div>

				<div class="edit">
					<label for="thutu">Thứ tự</label>
					<input type="text" name="thutu" value="<?php echo $row['thutu'] ?>">
				</div>

				<div class="buttons">
					<input type="submit" name="sualoaisanpham" id="sualoaisanpham" value="Sửa loại sản phẩm">
				</div>

				<?php
			}
			?>
		</form>
	</section>
</main>