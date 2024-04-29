<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1acf2d22a5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="asset/css/style_giohang.css">
    <title>Hóa đơn</title>
</head>
<body>
    <?php
        include 'inc/menu.php';
    ?>
    <main>
        <aside>
            <a><i class="fa-regular fa-circle-user"></i>Nhom2</a>
            <a  href="#" class="link"><i class='bx bxs-receipt' ></i>Đơn mua</a>
            <a class="active"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>
        </aside>
    <section>
    <form class="order-info">
        <div class="address">
            <div class="title"></i>Thông tin đơn hàng</div>
            <div class="firstEle">
                <p>Ngày tạo: <?=$ngaytao?></p>
                <p><?=$tenTK?> | SĐT: <?=$dienthoai?></p>
                <div>
                    <label for="diachigiao">Địa chỉ:</label> 
                    <span><?=$diachigiao?></span>
                </div>
                <div>
                    <label for="thanhtoan">Thanh toán:</label>
                    <?php
                        if($thanhtoan == "sau") echo '<span>Tiền mặt</span>';
                        else echo '<span>Thẻ</span>';
                    ?>
                </div>
            </div>
        </div>
    </form>
    <table>
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
        <?php
            foreach($sanpham as $item){
                extract($item);
        ?>
        <tr>
            <td><?=$tenSP?></td>
            <td><?=$soluong?></td>
            <td><?=number_format($giaban,0,"",".");?>đ</td>
            <td><?=number_format($giaban*$soluong,0,"",".");?>đ</td>
        </tr>
        <?php
            }
        ?>
        <tr class="total">
            <th colspan="3">Tổng tiền</th>
            <td><?=number_format($tongtien,0,"",".");?>đ</td>
        </tr>
    </table>
    </section>
</main>
<?php
    include_once 'inc/footer.php';
?>