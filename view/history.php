<?php 
    include_once 'inc/header_home.php';
?>
    <main>
    <main>
    <style>  
        table{
            margin: 10px auto;
            width: 90%;
            text-align: center;
            border-collapse: separate;
            border-spacing: 20px;
        }

        th{
            font-size: 20px;
        }

        .product img{
            width: 100px;
            height: 70px;
        }

        .product{
            font-size: 16px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 4px;
        }

        .product td{
            padding: 10px 0 10px 20px;
            border-radius: 4px;
        }
    </style>
    <table>
        <!--noi dung tieu de-->
        <tr class="title">
            <th>Thứ tự</th>
            <th>Tổng tiền</th>
            <th>Ngày mua</th>
            <th>Trạng thái</th>
                
       
        </tr>
        <?php
        $i = 0;
        $tongtien = 0;
        
        foreach ($result as $item) {
            $i++;
             
        ?>
            <!--noi dung cac san pham-->
            <tr class="product">
                <td>
                    <?php echo $i;?>
                </td>
                
                <td>
                    <?php echo number_format($item['tongtien'],0,',','.')?>    
                </td>

                <td>
                    <?php echo $item['ngaytao']?>
                </td>

                <td>
                    <?php 
                        if($item['trangthai'] == 0){
                            echo "đơn hàng đang chờ xác nhận";
                        }else if($item['trangthai'] == 1){
                            echo '<p style="color: green;"> đơn hàng đã xác nhận </p>';
                        }else if($item['trangthai'] == 2){
                            echo "đơn hàng đang giao";
                        }else
                            echo '<p style="color: red;"> đơn hàng bị hủy </p>';
                    ?>
                </td>
                
                <td>
                    <form action="?page=detail_invoice" method="post">
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
            <td style="font-size: large;">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'VNDđ'?></td>
        </tr>
    </table>
</main>
    </main>
<?php 
    include_once 'inc/footerSrch.php';
?>  
