		<main>
			<section id="main"> 
                    <form method="POST" action="modules/quanlysanpham/xuly.php">
						<div class="change_img">
							<img src="../../img/pic.png" alt="laptop" id="product_pic">
							<label for="input_file" class="change_button">Thêm</label>
							<input type="file" id="input_file" accept="image/*">
						</div>
						
						<div class="edit">
							<label for="maloai">Loại</label>
							<input type="text" name="maloai">
						</div>
						
						<div class="edit">
							<label for="thutu">Thứ tự</label>
							<input type="text" name="thutu">
						</div>
						
						<div class="edit">
							<label for="hinhAnh">Hình Ảnh</label>
							<input type="text" name="hinhAnh" >
						</div>

						<div class="edit">
							<label for="product_name">Tên</label>
							<input type="text" name="product_name" >
						</div> 
						<div class="edit">
							<label for="product_price">Giá</label>
							<input type="text" name="product_price" >
						</div>
						<div class="edit">
							<label for="product_quantity">Số lượng</label>
							<input type="number" name="product_quantity" >
						</div>
						<div class="edit">
							<label for="product_quantity">Mô tả</label>
							<textarea name="textarea_field"></textarea>
						</div>
						<div class="buttons">
							<input type="submit" name="themsanpham" id="themsanpham" value="Thêm sản phẩm" >
						</div>
                    </form>
            </section>    
        </main>
