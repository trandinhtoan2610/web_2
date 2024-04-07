<?php
if (isset($_POST['locDonHang'])) {
    $dateStart = $_POST['dateStart'];
    $dateEnd = $_POST['dateEnd'];
    $filter_sql = "";

    // Kiểm tra xem người dùng đã nhập ngày hay chưa
    if (!empty($dateStart) && !empty($dateEnd)) {
        $filter_sql = " AND bill.thoigian BETWEEN '$dateStart' AND '$dateEnd'";
    }

    $sql_lietke_bill = mysqli_query($conn, "SELECT * FROM bill,user WHERE bill.id_user = user.id_user" . $filter_sql . " ORDER BY bill.id_bill ASC");

    if (!$sql_lietke_bill) {
        // Xử lý lỗi
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    // Nếu không có dữ liệu từ form, thực hiện truy vấn không có lọc
    $sql_lietke_bill = mysqli_query($conn, 'SELECT * FROM bill,user WHERE bill.id_user = user.id_user ORDER BY bill.id_bill ASC');
}
?>




<div class="filter">
    <form action="" method="POST">
    <div>
    <label for="dateStart">Từ ngày :</label>
    <input type="date" name="dateStart" id="dateStart">
    <br>
    <label for="dateEnd">Đến ngày :</label>
    <input style="margin-top: 20px;" type="date" name="dateEnd" id="dateEnd">
    <br>
    <input style="margin-top: 20px; 
    cursor: pointer;
    width: 100px;
    display : flex;
    text-align :center;
    justify-content: center;"
    
    type="submit" name="locDonHang"value="Lọc">
    </div>
    
    </form>
</div>


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
            <th>Số điện thoại</th>    
            <th>Thời gian</th>    
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
                <?php echo $row_bill['dienthoai']?>
            </td>
            
            <td>
                <?php 
                $dateFormatted = date('d/m/Y - h:m:i', strtotime($row_bill['thoigian']));
                echo $dateFormatted?>
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
