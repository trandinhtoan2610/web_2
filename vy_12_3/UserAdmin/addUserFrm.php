<h1>Thêm Người Dùng</h1>
                    <form action="index.php?page=addUser" id="formId" method="post" enctype="multipart/form-data">
						<div class="change_img">
							<img src="img/pic.png" alt="userAvatar" id="product_pic">
							<label for="input_file" class="change_button">Thêm</label>
							<input type="file" name="input_file" id="input_file" accept="image/*">
						</div>
						<div class="edit"> <!--phan loai-->
							<label for="loaiUser">Loại người dùng</label>
							<select name="phanquyen" id="loaiUser">
								<option value="0">Admin</option>
								<option value="1">Khách hàng</option>
							</select>
						</div>
						<div class="edit">
							<label for="product_name">Tên</label>
							<input type="text" name="ten" required>
						</div>
						<div class="edit">
							<label for="email">Email</label>
							<input type="text" name="email" pattern="^[^ ]+@[^ ]+\.[a-z]{2,3}$" required>
						</div>
                        <div class="edit">
							<label for="dienthoai">Điện thoại</label>
							<input type="text" name="dienthoai" pattern="0\d{9,10}" required>
						</div>
                        <div class="edit">
							<label for="diachi">Địa chỉ</label>
							<input type="text" name="diachi" required>
						</div>
						<div class="buttons">
							<button type="button" href="index.php?page=userAdmin"><i class="fa-solid fa-x"></i>Đóng</button>
							<button type="submit" name="btnadd"><i class="fa-solid fa-plus"></i>Thêm</button>
						</div>
                    </form>
            </section>    
