<?php 
    include_once '../inc/headerSrch.php';
?>
    <main>
        <section>
            <h2>Tìm kiếm nâng cao</h2>
            <form action="index.php?page=advSrch" method="post">
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
                        <label for="priceFrom">Giá từ</label>
                        <input type="number" id="priceFrom">
                        <label for="priceFrom">đến khoảng</label>
                        <input type="number" id="priceTo">
                    </div>
                <button type="submit">Tìm kiếm</button>
            </form>
        </section>
    </main>
<?php 
    include_once '../inc/footerSrch.php';
?>  
