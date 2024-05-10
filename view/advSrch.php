<?php 
    include_once 'inc/headerSrch.php';
?>
    <main>
        <section>
            <h2>Tìm kiếm nâng cao</h2>
            <form action="?page=search" method="post" onsubmit="return formSrchValidate(this)">
                    <div>
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" name="tenSP">
                    </div>
                    <div>
                        <label for="brand">Thương hiệu</label>
                        <select id="brand" name="idHSX">
                        <?php
                        
                            foreach($category as $item){
                                extract($item);
                        ?>
                            <option value="<?=$idHSX?>"><?=strtoupper($tenHSX)?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label for="priceFrom">Giá từ</label>
                        <input type="number" name="priceFrom" min="0">
                        <label for="priceFrom">đến khoảng</label>
                        <input type="number" name="priceTo" min="0">
                    </div>
                <button type="submit" name="filter-btn" >Tìm kiếm</button>
            </form>
        </section>
    </main>
<?php 
    include_once 'inc/footer.php';
?>  
