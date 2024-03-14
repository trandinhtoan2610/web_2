<?php
$sql_lietke = mysqli_query($conn, 'SELECT * FROM sanpham ORDER BY sanpham.thutu ASC');
?>

<h1>Trang sản phẩm</h1>
<a href="?action=quanlysanpham&query=them" class="create-button"><i class="fas fa-plus"></i>Thêm</a>
<!--product list-->
<table>
    <!--noi dung tieu de-->
    <?php
    $i = 0;
    while ($row_sanpham = mysqli_fetch_array($sql_lietke)) {
        $i++;
        ?>
        <tr class="title">
            <th>Mã</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng tồn kho</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>

        <!--noi dung cac san pham-->
        <tr class="product">
            <td>
                <?php echo $i?>
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
                    echo 'Kích hoạt';
                } else{
                    echo 'Ẩn';
                }
                ?>
            </td>

            <td>

                <a href="?action=quanlysanpham&query=sua&masanpham=<?php echo $row_sanpham['masp'] ?>"
                    class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>


                <a href="modules/quanlysanpham/xuly.php?masanpham=<?php echo $row_sanpham['masp'] ?>" class="action-button"
                    onclick="warning(this)">
                    <i class="fas fa-trash-alt"></i>
                    <div class="action-tooltip">Xóa</div>

                </a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>