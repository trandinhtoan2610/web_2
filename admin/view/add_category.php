<?php
    include 'inc/header.php';
?>
<h1>Thêm Hãng Sản Xuất</h1>
	<form id="add-form-category" method="post" enctype="multipart/form-data">
		<div class="change_img">
			<img src="../uploads/uploads_category/pic.png" alt="logo" id="item_pic">
			<label for="item_file" class="change_button">Thêm</label>
			<input type="file" name="input_file" id="item_file" accept="image/*">
		</div>
		<div class="edit">
			<label for="tenHSX">Hãng sản xuất</label>
			<input type="text" name="tenHSX">
		</div>
		<div class="buttons">
			<a href="?page=category"><i class="fa-solid fa-x"></i>Đóng</a>
			<input type="hidden" name="add-category-btn" value="submit">
			<button type="submit" name="add-category-btn"><i class="fa-solid fa-plus"></i>Thêm</button>
		</div>
	</form>
</section>    
<?php
    include 'inc/footer.php';
?>