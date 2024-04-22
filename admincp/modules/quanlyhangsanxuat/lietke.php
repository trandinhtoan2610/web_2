<?php
if (isset($_POST['timKiemHang'])) {
    $keyword = $_POST['timKiem'];
    // Thực hiện truy vấn SQL để tìm kiếm sản phẩm
    $sql_lietke_hangsanxuat = mysqli_query($conn, "SELECT * FROM hangsanxuat WHERE (tinhtrang = 1 OR tinhtrang = 0) AND tenhang LIKE '%$keyword%' ORDER BY hangsanxuat.thutu ASC");
} else {
    // Truy vấn mặc định nếu không có từ khóa tìm kiếm
    $sql_lietke_hangsanxuat = mysqli_query($conn, 'SELECT * FROM hangsanxuat WHERE tinhtrang = 0 or tinhtrang = 1 ORDER BY hangsanxuat.thutu ASC');
}
?>

<h1>Trang hãng sản xuất </h1>
<a href="?action=quanlyhangsanxuat&query=them" class="create-button"><i class="fas fa-plus"></i>Thêm</a>
<!--product list-->


<div class="sreach">
    <form action="" method="POST">
        <input style="width : 20%" type="text" name="timKiem" placeholder="Tên hãng...">
        <input style="height : 40px;" type="submit" value="Tìm kiếm" name="timKiemHang">
    </form>
</div>

<table>
    <!--noi dung tieu de-->
    <?php
    $i = 0;
    while ($row_hangsanxuat = mysqli_fetch_array($sql_lietke_hangsanxuat)) {
        $i++;
    ?>
        <tr class="title">
            <th>Thứ tự</th>
            <th>Hình ảnh</th>
            <th>Tên hãng sản xuất</th>
            <th>Thao tác</th>
        </tr>

        <!--noi dung cac san pham-->
        <tr class="product">
            <td>
                <?php echo $i ?>
            </td>

            <td><a href="?action=quanlyhangsanxuat&query=sua&idhang=<?php echo $row_hangsanxuat['id_hangsanxuat'] ?>">
                    <img src="../img/<?php echo $row_hangsanxuat['hinhAnh'] ?>"></a></td>

            <td>
                <?php echo $row_hangsanxuat['tenhang'] ?>
            </td>

            <td>

                <a href="?action=quanlyhangsanxuat&query=sua&idhang=<?php echo $row_hangsanxuat['id_hangsanxuat'] ?>" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>


                <a href="modules/quanlyhangsanxuat/xuly.php?idhang=<?php echo $row_hangsanxuat['id_hangsanxuat'] ?>" class="action-button" onclick="warning(this)">
                    <i class="fas fa-trash-alt"></i>
                    <div class="action-tooltip">Xóa</div>

                </a>
            </td>


        </tr>
    <?php
    }
    ?>
</table>