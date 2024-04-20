<?php
$sql_lietke_hangsanxuat = mysqli_query($conn, 'SELECT * FROM hangsanxuat WHERE tinhtrang = 0 or tinhtrang = 1 ORDER BY hangsanxuat.thutu ASC');
?>

<h1>Trang hãng sản xuất </h1>
<a href="?action=quanlyhangsanxuat&query=them" class="create-button"><i class="fas fa-plus"></i>Thêm</a>
<!--product list-->
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
                <?php echo $i?>
            </td>
            
            <td><a href="?action=quanlyhangsanxuat&query=sua&idhang=<?php echo $row_hangsanxuat['id_hangsanxuat'] ?>">
                    <img src="../img/<?php echo $row_hangsanxuat['hinhAnh'] ?>"></a></td>
            
            <td>
                <?php echo $row_hangsanxuat['tenhang'] ?>
            </td>
 
            <td>

                <a href="?action=quanlyhangsanxuat&query=sua&idhang=<?php echo $row_hangsanxuat['id_hangsanxuat'] ?>"
                    class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>


                <a href="modules/quanlyhangsanxuat/xuly.php?idhang=<?php echo $row_hangsanxuat['id_hangsanxuat'] ?>" class="action-button"
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