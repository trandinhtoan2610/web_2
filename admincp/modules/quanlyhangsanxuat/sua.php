<?php
	$masanpham = $_GET['masanpham'];
    $sql_sua_sanpham = mysqli_query($conn,"SELECT * FROM sanpham where masp='$masanpham' LIMIT 1");
?>
<h1>Sửa danh mục</h1>
<main>
			<section id="main"> 
                    <form method="POST" action="modules/quanlysanpham/xuly.php?masanpham=<?php echo $_GET['masanpham']?>">
						<?php
                        while ( $row = mysqli_fetch_array($sql_sua_sanpham) ){
                        ?>
                        <div class="change_img">
							<img src="../../img/pic.png" alt="laptop" id="product_pic">
							<label for="input_file" class="change_button">Thêm</label>
							<input type="file" id="input_file" accept="image/*">
						</div>
						
						<div class="edit">
							<label for="maloai">Loại</label>
							<input type="text" name="maloai" value = "<?php echo $row['maloai']?>">
						</div>
						
						<div class="edit">
							<label for="thutu">Thứ tự</label>
							<input type="text" name="thutu" value = "<?php echo $row['thutu']?>">
						</div>
						
						<div class="edit">
							<label for="hinhAnh">Hình Ảnh</label>
							<input type="text" name="hinhAnh" value = "<?php echo $row['hinhAnh']?>" >
						</div>

						<div class="edit">
							<label for="product_name">Tên</label>
							<input type="text" name="tensp" value = "<?php echo $row['tensp']?>">
						</div> 
						<div class="edit">
							<label for="product_price">Giá</label>
							<input type="text" name="giagoc" value = "<?php echo $row['giaGoc']?>">
						</div>
						<div class="edit">
							<label for="product_quantity">Số lượng</label>
							<input type="number" name="soluong" value = "<?php echo $row['soluong']?>">
						</div>
						<div class="edit">
							<label for="product_quantity">Mô tả</label>
							<textarea name="textarea_field"></textarea>
						</div>
						<div class="buttons">
							<input type="submit" name="suasanpham" id="suasanpham" value="Sửa sản phẩm" >
						</div>

                        <?php
                        }
                        ?>
                    </form>
            </section>    
        </main>
