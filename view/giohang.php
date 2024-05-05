<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1acf2d22a5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="asset/css/style_giohang.css">
    <title>Giỏ hàng</title>
</head>
<body>
    <?php
        include 'inc/menu.php';
    ?>
    <main>
        <aside>
            <a><?=$_SESSION['tenTK']?></a>
            <a href="?page=history"><i class='bx bxs-receipt'></i>Đơn mua</a>
            <a class="active" href="?page=giohang"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>
        </aside>
    <section>
        <?php
            if(isset($_SESSION['cart']) && $_SESSION['cart']['tongtien']!=0) 
            foreach($_SESSION['cart']['items'] as $idSP => $product){
        ?>
    <div class="list">
        <div class="product">
                <button class="remove-item"><i class="fa-solid fa-xmark"></i></button>
                <input type="hidden" name="idSP" value="<?=$idSP?>">
                <img src="uploads/uploads_product/<?=$product['hinhanh']?>" alt="<?=$product['tenSP']?>">
                <div class="info">
                    <p class="name"><?=$product['tenSP']?></p>
                    <div class="quantity">
                        <div class="minus">-</div>
                        <input type="number" name="qty" value="<?=$product['soluong']?>" min="1" max="<?=$product['tonkho']?>">
                        <div class="plus">+</div>
                    </div>
                    <p class="price"><?=number_format($product['giaban'],0,"",".");?>đ<p>
                </div>
        </div>
    </div>
    <?php
        }
    ?> 
    <form class="confirm" id="order-form">
        <div class="address">
            <div class="title"><i class='bx bxs-map'></i>Địa Chỉ Nhận Hàng</div>
            <div class="firstEle">
                <p><?=$account['tenTK']?> | SĐT: <?=$account['dienthoai']?></p>
                <div>
                    <label for="diachi">Địa chỉ:</label> 
                    <input type="text" name="diachigiao" value="<?=$account['diachi']?>">
                </div>
            </div>
        </div>
        <div class="pay">
            <div class="payment">
                <span>Thanh toán</span>
                <input type="radio" name="thanhtoan" value="sau" checked><label for="sau">Tiền mặt</label>
                <input type="radio" name="thanhtoan" value="trc"><label for="trc">Thẻ</label>
            </div>
            <?php
                if(isset($_SESSION['cart'])){
            ?>
            <input type="hidden" name="tongtien" value="<?=$_SESSION['cart']['tongtien']?>">
            <p>Tổng thanh toán: <span class="total"><?=number_format($_SESSION['cart']['tongtien'],0,"",".");?>đ</span></p>
            <?php
                }
                else{
            ?>
            <input type="hidden" name="tongtien" value="0">
            <p>Tổng thanh toán: <span class="total">0đ</span></p>
            <?php   
                }
            ?>
            
            <button type="submit" name="order-btn">MUA HÀNG</button>
        </div>
    </form>
    </section>
</main>
<?php
    include_once 'inc/footer.php';
?>