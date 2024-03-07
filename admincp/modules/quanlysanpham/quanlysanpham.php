<?php
if (isset($_GET['action']) && isset($_GET['query'])) {
    $tam = $_GET['action'];
    $query = $_GET['query'];
} else {
    $tam = ' ';
    $query = ' ';
}
if ($tam == 'quanlysanpham' && $query == 'them') {
    include("themsanpham.php");
}
?>
<h1>Trang sản phẩm</h1>
<a href="?action=quanlysanpham&query=them" class="create-button"><i class="fas fa-plus"></i>Thêm</a>
<!--product list-->
<table>
    <!--noi dung tieu de-->
    <?php
    $i = 0;
    while ($row_sanpham = mysqli_fetch_array($sql_sanpham)) {
        $i++;
    ?>
        <tr class="title">
            <th>Mã</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng tồn kho</th>
            <th>Thao tác</th>
        </tr>

        <!--noi dung cac san pham-->
        <tr class="product">
            <td>
                <?php echo $i ?>
            </td>
            <td><a href="productDetail.html"><img src="<?php echo '../' . $row_sanpham['hinhAnh'] ?>"></a></td>
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
                <a href="?action=quanlysanpham&query=sua" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>
                <a href="?action=quanlysanpham&query=xoa&ma_sp=<?php echo $row_sanpham['masp'] ?>" class="action-button" onclick="warning(this)">
                    <i class="fas fa-trash-alt"></i>
                    <div class="action-tooltip">Xóa</div>

                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>