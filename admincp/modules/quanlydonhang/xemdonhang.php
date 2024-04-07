<?php
$idbill = $_GET['idbill'];
$sql_lietke_billdetail = mysqli_query($conn, "SELECT * FROM bill_detail,sanpham WHERE bill_detail.masp =sanpham.masp 
and bill_detail.id_bill ='$idbill' ORDER BY bill_detail.id_billdetail ASC");
?>




<!--product list-->
<table>
    <!--noi dung tieu de-->
    <tr class="title">
        <th>Thứ tự</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>            
        
    </tr>
    <?php
    $i = 0;
    $tongtien = 0;
    
    while ($row_bill = mysqli_fetch_array($sql_lietke_billdetail)) {
        $i++;
        $thanhtien = $row_bill['giaGoc']*$row_bill['soluongmua'];
        $tongtien += $row_bill['giaGoc']*$row_bill['soluongmua'];
        ?>

        <!--noi dung cac san pham-->
        <tr class="product">
            <td>
                <?php echo $i?>
            </td>
            
            <td>
                <?php echo $row_bill['tensp']?>
            </td>

            <td>
                <?php echo $row_bill['soluongmua']?>
            </td>

            <td>
                <?php echo number_format($row_bill['giaGoc'],0,',','.').'VNDđ'?>
            </td>
            
            <td>
                <?php echo 
                number_format($thanhtien,0,',','.')
                 .'VNDđ'?>
            </td>

  
        </tr>
        <?php
    } 
    ?>
    <tr>
        <td style="font-size: large;">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'VNDđ'?></td>
    </tr>
</table>

