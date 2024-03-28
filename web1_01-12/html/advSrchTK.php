<?php 
	include_once '../inc/headerSrch.php';
?>
    <main>
        <section>
            <h2>Tìm kiếm nâng cao</h2>
            <form action="search1TK.php">
                    <div>
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" id="name" required>
                    </div>
                    <div>
                        <label for="brand">Thương hiệu</label>
                        <select id="brand">
                            <option value="acer">ACER</option>
                            <option value="lenovo">LENOVO</option>
                        </select>
                    </div>
                    <div>
                        <label for="purpose">Mục đích sử dụng</label>
                        <select id="purpose">
                            <option value="gaming">Gaming</option>
                            <option value="hoctap-vanphong">Học tập - Văn phòng</option>
                            <option value="dohoa-kythuat">Đồ họa - Kỹ thuật</option>
                        </select>
                    </div>
                    <div>
                        <label for="priceFrom">Giá từ</label>
                        <input type="number" id="priceFrom">
                        <label for="priceFrom">đến khoảng</label>
                        <input type="number" id="priceTo">
                    </div>
                <button>Tìm kiếm</button>
            </form>
        </section>
    </main>
<?php 
	include_once '../inc/footerSrch.php';
?>