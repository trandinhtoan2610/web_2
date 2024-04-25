<?php
if (isset($_POST['locDonHang'])) {
    $dateStart = $_POST['dateStart'];
    $dateEnd = !empty($_POST['dateEnd']) ? $_POST['dateEnd'] : date('Y-m-d');
    $trangThai = $_POST['trangThai'];
    $filter_sql = "";

    // Kiểm tra xem ngày bắt đầu phải trước ngày kết thúc
    if (!empty($dateStart) && !empty($dateEnd)) {
        if ($dateStart > $dateEnd) {
            echo "Ngày bắt đầu phải trước ngày kết thúc!";
        }
    }


    // Tiếp tục thực hiện lọc dữ liệu nếu ngày bắt đầu hợp lệ

    // Kiểm tra xem người dùng đã chọn trạng thái đơn hàng hay chưa
    if ((!empty($dateStart) && !empty($dateEnd)) || !empty($trangThai)) {
        // Nếu ngày hoặc trạng thái đơn hàng được chọn, thực hiện lọc
        if (!empty($dateStart) && !empty($dateEnd)) {
            $filter_sql .= " AND bill.thoigian BETWEEN '$dateStart' AND '$dateEnd'";
        }
        if (!empty($trangThai)) {
            $filter_sql .= " AND bill.bill_status = $trangThai";
        }

        $sql_lietke_bill = mysqli_query($conn, "SELECT * FROM bill, user WHERE bill.id_user = user.id_user" . $filter_sql . " ORDER BY bill.id_bill ASC");

        // if (!$sql_lietke_bill) {
        //     // Xử lý lỗi
        //     echo "Lỗi: " . mysqli_error($conn);
        // } else {
        //     if (mysqli_num_rows($sql_lietke_bill) == 0) {
        //         echo "Không tìm thấy kết quả!";
        //     }
        // }
    } else {
        // Nếu không nhập ngày lọc và không chọn trạng thái đơn hàng, hiển thị tất cả đơn hàng
        $sql_lietke_bill = mysqli_query($conn, 'SELECT * FROM bill, user WHERE bill.id_user = user.id_user ORDER BY bill.id_bill ASC');
    }
} else {
    // Nếu không có dữ liệu từ form, thực hiện truy vấn không có lọc
    $sql_lietke_bill = mysqli_query($conn, 'SELECT * FROM bill, user WHERE bill.id_user = user.id_user ORDER BY bill.id_bill ASC');
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



            <select name="trangThai" id="trangThai" style="width: 200px;">
                <option value="">Chọn trạng thái</option>
                <option value="1">Đơn hàng mới</option>
                <option value="0">Đã duyệt đơn hàng</option>
                <option value="-1">Đã hủy</option>
            </select>

            <input style="margin-top: 20px; 
    cursor: pointer;
    width: 100px;
    display : flex;
    text-align :center;
    justify-content: center;" type="submit" name="locDonHang" value="Lọc">
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
                <?php echo $row_bill['id_bill'] ?>
            </td>

            <td>
                <?php echo $row_bill['username'] ?>
            </td>

            <td>
                <?php echo $row_bill['diachi'] ?>
            </td>

            <td>
                <?php echo $row_bill['dienthoai'] ?>
            </td>

            <td>
                <?php
                $dateFormatted = date('d/m/Y - h:m:i', strtotime($row_bill['thoigian']));
                echo $dateFormatted ?>
            </td>

            <td>
                <?php
                if ($row_bill['bill_status'] == 0) {
                    echo '<a href="modules/quanlydonhang/xuly.php?action=duyet&idbill=' . $row_bill['id_bill'] . '">Xác nhận | </a>';
                    echo '<a href="modules/quanlydonhang/xuly.php?action=huy&idbill=' . $row_bill['id_bill'] . '">Hủy đơn hàng</a>';
                } else if ($row_bill['bill_status'] == 1) {
                    echo '<a href="">Đang giao</a>';
                } else if ($row_bill['bill_status'] == 2) {
                    echo '<a href="">Đã giao hàng</a>';
                } else if ($row_bill['bill_status'] == -1) {
                    echo '<a href="">Đơn hàng đã hủy</a>';
                }
                ?>
            </td>

            <td>
                <a href="index.php?action=quanlydonhang&query=xemdonhang&idbill=<?php echo $row_bill['id_bill'] ?>">Xem đơn hàng</a>
            </td>
        </tr>
    <?php

    }
    ?>
</table>