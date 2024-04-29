<?php
include_once 'inc/header_detail.php';
?>
		<main>
			<section id="product">
					<div class = "characteristics"> 
                        <input type="hidden" name="idSP" value="<?=$idSP?>">
                        <input type="hidden" name="hinhanh" value="<?=$hinhanh?>">
						<img src="uploads/uploads_product/<?=$hinhanh?>">
                        <div>
                            <input type="hidden" name="tenSP" value="<?=$tenSP?>">
                            <h1 class="tenSP"><?=$tenSP?></h1>
                            <hr></hr>
                            <input type="hidden" name="giaban" value="<?=$giaban?>">
                            <div class="price"><?=number_format($giaban,0,"",".");?>đ</div>
                            <button class="addToCart">THÊM VÀO GIỎ HÀNG</button>
                        </div>
                    </div>
                    
                    <hr>
                    <h2>Cấu hình</h2>
                    <div class="configure">
                        <ul>
                            <li><strong>Thương hiệu:</strong> <?=$hangsanxuat?></li>
                            <li><strong>Lượt bán:</strong> <?=$luotban?></li>
                        </ul>
                        <ul>
                            <li><strong>CPU:</strong> <?=$cpu?></li>
                            <li><strong>Card:</strong> <?=$card?></li>
                        </ul>
                        <ul>
                            <li><strong>Pin:</strong> <?=$pin?></li>
                            <li><strong>Ram:</strong> <?=$ram?></li>
                        </ul>
                    </div>
                    <hr>
                    <div>
                        <h2>Mô tả</h2>
                        <?=$mota?>
                    </div>
			</section>
		</main>
<?php
	include_once 'inc/footer.php';
?>