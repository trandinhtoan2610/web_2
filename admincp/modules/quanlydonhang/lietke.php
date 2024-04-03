<?php
$sql_lietke_bill = mysqli_query($conn, 'SELECT * FROM bill,user WHERE bill.id_user =user.id_user ORDER BY bill.id_bill ASC');
?>

<!--product list-->
<table>
    <!--noi dung tieu de-->
    <?php
    // $i = 0;
    while ($row_bill = mysqli_fetch_array($sql_lietke_bill)) {
        
        // $i++;
        ?>
        <tr class="title">
            <!-- <th>Thứ tự</th> -->
            <th>Mã đơn hàng</th>
            <th>Username</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Số điện thoại</th>        
            <th>Tình trạng</th>    
            <th>Quản lý</th>
            
        </tr>

        <!--noi dung cac san pham-->
        <tr class="product">
            <!-- <td>
                
            </td> -->
            
            <td>
                <?php echo $row_bill['id_bill']?>
            </td>
            
            <td>
                <?php echo $row_bill['username']?>
            </td>

            <td>
                <?php echo $row_bill['diachi']?>
            </td>

            <td>
                <?php echo $row_bill['email']?>
            </td>
            
            <td>
                <?php echo $row_bill['dienthoai']?>
            </td>
            
            <td>
                <?php
                if ($row_bill['bill_status'] ==1){
                    echo '<a href="modules/quanlydonhang/xuly.php?idbill='.$row_bill['id_bill'].'">Đơn hàng mới</a>';
                } else {
                    echo '<a href="">Đã duyệt đơn hàng</a>';
                }
                ?>
            </td>

            <td>
                <a href="index.php?action=quanlydonhang&query=xemdonhang&idbill=<?php echo $row_bill['id_bill']?>">Xem đơn hàng</a>
            </td>
        </tr>
        <?php
    
    }
    ?>
</table>
