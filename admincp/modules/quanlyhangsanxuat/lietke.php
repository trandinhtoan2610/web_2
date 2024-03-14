<?php
$sql_lietke_loaisanpham = mysqli_query($conn, 'SELECT * FROM loaisanpham ORDER BY loaisanpham.thutu ASC');
?>

<h1>Trang hãng sản xuất </h1>
<a href="?action=quanlyhangsanxuat&query=them" class="create-button"><i class="fas fa-plus"></i>Thêm</a>
<!--product list-->
<table>
    <!--noi dung tieu de-->
    <?php
    $i = 0;
    while ($row_loaisanpham = mysqli_fetch_array($sql_lietke_loaisanpham)) {
        $i++;
        ?>
        <tr class="title">
            <th>Thứ tự</th>
            <th>Hình ảnh</th>
            <th>Tên loại</th>
            <th>Thao tác</th>
        </tr>

        <!--noi dung cac san pham-->
        <tr class="product">
            <td>
                <?php echo $i?>
            </td>
            
            <td><a href="?action=quanlyhangsanxuat&query=sua&idloai=<?php echo $row_loaisanpham['id_loaisanpham'] ?>">
                    <img src="../img/<?php echo $row_loaisanpham['hinhAnh'] ?>"></a></td>
            
                    <td>
                <?php echo $row_loaisanpham['tenloai'] ?>
            </td>
 
            <td>

                <a href="?action=quanlyhangsanxuat&query=sua&idloai=<?php echo $row_loaisanpham['id_loaisanpham'] ?>"
                    class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>


                <a href="modules/quanlyhangsanxuat/xuly.php?idloai=<?php echo $row_loaisanpham['id_loaisanpham'] ?>" class="action-button"
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