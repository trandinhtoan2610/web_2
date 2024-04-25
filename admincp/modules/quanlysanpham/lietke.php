<?php
if (isset($_POST['timKiemSanPham'])) {
    $keyword = $_POST['timKiem'];
    // Thực hiện truy vấn SQL để tìm kiếm sản phẩm
    $sql_lietke = mysqli_query($conn, "SELECT * FROM sanpham WHERE (tinhtrang = 1 OR tinhtrang = 0) AND tensp LIKE '%$keyword%' ORDER BY sanpham.thutu ASC");
} else {
    // Truy vấn mặc định nếu không có từ khóa tìm kiếm
    $sql_lietke = mysqli_query($conn, 'SELECT * FROM sanpham WHERE tinhtrang = 1 OR tinhtrang = 0 ORDER BY sanpham.thutu ASC');
}
?>


<h1>Trang sản phẩm</h1>
<a href="?action=quanlysanpham&query=them" class="create-button"><i class="fas fa-plus"></i>Thêm</a>
<!--product list-->


<div class="sreach">
    <form action="" method="POST">
        <input style="width : 20%" type="text" name="timKiem" placeholder="Tên sản phẩm...">
        <input 
        style="height : 40px;"        
        
        type="submit" value="Tìm kiếm" name="timKiemSanPham">
    </form>
</div>


<table> 
    <!--noi dung tieu de-->
    
        <tr class="title">
            <th>Mã</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng tồn kho</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        <?php
    $i = 0;
    while ($row_sanpham = mysqli_fetch_array($sql_lietke)) {
        $i++;
    ?>
        <!--noi dung cac san pham-->
        <tr class="product">
            <td>
                <?php echo $i ?>
            </td>
            <td><a href="?action=quanlysanpham&query=sua&masanpham=<?php echo $row_sanpham['masp'] ?>">
                    <img src="../img/<?php echo $row_sanpham['hinhAnh'] ?>"></a></td>
            <td>
                <?php echo $row_sanpham['tensp'] ?>
            </td>
            <td>
                <?php echo $row_sanpham['giaGoc'] ?>
            </td>
            <td>
                <?php echo $row_sanpham['soluong'] ?>
            </td>

            <td>
                <?php
                if ($row_sanpham['tinhtrang'] == 1) {
                    echo 'Hiện';
                } else {
                    echo 'Ẩn';
                }
                ?>
            </td>

            <td>

                <a href="?action=quanlysanpham&query=sua&masanpham=<?php echo $row_sanpham['masp'] ?>" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>


                <a href="modules/quanlysanpham/xuly.php?masanpham=<?php echo $row_sanpham['masp'] ?>" class="action-button" onclick="warning(this)">
                    <i class="fas fa-trash-alt"></i>
                    <div class="action-tooltip">Xóa</div>

                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>