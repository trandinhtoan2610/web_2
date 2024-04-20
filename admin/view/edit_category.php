<?php
    include 'inc/header.php';
?>
<h1>Sửa Thông Tin Hãng Sản Xuất</h1>
    <form action="?page=edit_category&idHSX=<?=$idHSX?>" method="post" enctype="multipart/form-data"  onsubmit="return formValidateCategory(this)">
        <input type="hidden" name="idHSX" value="<?=$idHSX?>">
    <div class="change_img">
		<img src="../uploads/uploads_category/<?=$logo?>" alt="categorypic" id="item_pic">
		<input type="hidden" name="curr_img" value="<?=$logo?>"> <!--luu lai img hien tai-->
		<label for="item_file" class="change_button">Thay đổi</label>
		<input type="file" name="input_file" id="item_file" accept="image/*">
	</div>
        <div class="edit">
            <label for="tenSP">Tên hãng sản xuất</label>
            <input type="text" name="tenHSX" value="<?=$tenHSX?>">
        </div>
        <div class="edit">
            <label for="trangthai">Trạng thái</label>
            <span style="padding-left: 0;">
                <label for="hoatdong" style="text-align: center; margin-left:10px; width:100px">Hoạt động</label>
                <input type="radio" name="trangthai" value="1" id="hoatdong"
                <?php if($trangthai==1) echo'checked'; ?>>
                <label for="khoa" style="text-align: center; width:100px;">Bị khóa</label>
                <input type="radio" name="trangthai" value="0" id="khoa"
                <?php if($trangthai==0) echo'checked'; ?>>
            </span>
        </div>
        <div class="buttons">
            <a href="?page=category"><i class="fa-solid fa-x"></i>Đóng</a>
            <button type="submit" name="edit-category-btn"><i class="fa-solid fa-download"></i>Cập nhật</button>
        </div>
        </form>
</section>
<?php
	if(isset($alert)){
		echo
		'<script>
		window.addEventListener("load", () => {
			alert("'.$alert.'");
		  });
		</script>';
	}
?>
<?php
    include 'inc/footer.php';
?>