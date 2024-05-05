<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1acf2d22a5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="asset/css/style_giohang.css">
    <title>Lịch sử</title>
</head>
<body>
    <?php
        include 'inc/menu.php';
    ?>
    <main>
        <aside>
            <a><?=$_SESSION['tenTK']?></a>
            <a class="active" href="?page=history"><i class='bx bxs-receipt'></i>Đơn mua</a>
            <a href="?page=giohang"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>
        </aside>
    <section>
        <?php
            if($result == null) echo '<p style="font-size: 20px">Không có đơn hàng</p>';
            else{
        ?>
    <table>
        <!--noi dung tieu de-->
        <tr>
            <th>Thứ tự</th>
            <th>Tổng tiền</th>
            <th>Ngày mua</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
        <?php
        $i = 0;
        $tongtien = 0;
        
        foreach ($result as $item) {
            $i++;
             
        ?>
            <!--noi dung cac san pham-->
            <tr>
                <td>
                    <?php echo $i;?>
                </td>
                
                <td>
                    <?php echo number_format($item['tongtien'],0,',','.')?>đ    
                </td>

                <td>
                    <?php echo $item['ngaytao']?>
                </td>

                <td>
                    <?php 
                        if($item['trangthai'] == "cho"){
                            echo '<p style="color: green;"> Chờ duyệt </p>';
                        }else if($item['trangthai'] == "vc"){
                            echo '<p style="color: green;"> Đang vận chuyển </p>';
                        }else if($item['trangthai'] == "ht"){
                            echo '<p style="color: green;"> Hoàn tất </p>';
                        }else if($item['trangthai'] == "huykh")
                            echo '<p style="color: red;"> Bị hủy bởi bạn </p>';
                        else echo '<p style="color: red;"> Bị hủy bởi người bán </p>';
                    ?>
                </td>
                
                <td class="order-detail">
                    <form action="index.php" method="get">
                        <input type="hidden" name="page" value="ctdonhang">
                        <input type="hidden" name="idDH" value="<?php echo $item['idDH']; ?>">
                        <button type="submit">Xem chi tiết</button>
                    </form>
                </td>
            </tr>
            <?php
            $tongtien += $item['tongtien'];
        } 
        ?>
        <tr>
            <td style="font-size: large;">Tổng tiền</td>
            <td><?php echo number_format($tongtien,0,',','.').'đ'?></td>
        </tr>
    </table>
    <?php
        }
    ?>
    </section>
</main>
<?php 
    include_once 'inc/footer.php';
?>  
