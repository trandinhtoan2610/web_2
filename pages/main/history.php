<?php
    include "./admincp/config/config.php";
?>
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
        $sql_history = mysqli_query($conn, "SELECT * FROM `bill` WHERE `username` = '$_SESSION[username]'");
        while ($row = mysqli_fetch_array($sql_history)) {
            $i++;    
        ?>

            <!--noi dung cac san pham-->
            <tr class="product">
                <td>
                    <?php echo $i?>
                </td>
                
                <td>
                    <?php echo number_format($row['tong_tien'],0,',','.')?>    
                </td>

                <td>
                    <?php echo $row['thoigian']?>
                </td>

                <td>
                    <?php 
                        if($row['bill_status'] == 0){
                            echo "đơn hàng đang chờ xác nhận";
                        }else if($row['bill_status'] == 1){
                            echo '<p style="color: green;"> đơn hàng đã xác nhận </p>';
                        }else if($row['bill_status'] == 2){
                            echo "đơn hàng đang giao";
                        }else
                            echo '<p style="color: red;"> đơn hàng bị hủy </p>';
                    ?>
                </td>

                <td>
                    <?php
                    echo '<a href="index.php?quanly=bill_detail&id_bill='.$row['id_bill'].'">Chi tiết</a>';
                    ?>
                </td>
            </tr>
            <?php
            $tongtien += $row['tong_tien'];
        } 
        ?>
        <tr>
            <td style="font-size: large;">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'VNDđ'?></td>
        </tr>
    </table>
</main>