<?php
	include_once 'inc/header.php';
?>
    <!--create button-->
    <h1>Sản Phẩm</h1>
    <a href="addProduct.php" class="create-button"><i class="fas fa-plus"></i> Thêm</a>
    <!--product list-->
    <table>
        <!--noi dung tieu de-->
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
            <td>#1</td>
            <td><a href="productDetail.php"><img src="../../img/lap1.png" alt="lap1"></a></td>
            <td>MSI Gaming GF63 Thin 11SC i5 11400H (664VN)</td>
            <td>16.490.000đ</td>
            <td>15</td>
            <td>
                <a href="editProduct.php" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>
                <a class="action-button" onclick="warning(this)">
                    <i class="fas fa-trash-alt"></i>
                    <div class="action-tooltip">Xóa</div>
                </a>
            </td>
        </tr>
        <tr class="product">
            <td>#2</td>
            <td><a href="productDetail.php"><img src="../../img/lap3.png" alt="lap1"></a></td>
            <td>MSI Gaming GF63 Thin 11SC i5 11400H (664VN)</td>
            <td>16.490.000đ</td>
            <td>15</td>
            <td>
                <a href="editProduct.php" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>
                <a class="action-button" onclick="warning(this)">
                    <i class="fas fa-trash-alt"></i>
                    <div class="action-tooltip">Xóa</div>
                </a>
            </td>
        </tr>
        <tr class="product">
            <td>#3</td>
            <td><a href="productDetail.php"><img src="../../img/lap2.png" alt="lap2"></a></td>
            <td>MSI Gaming GF63 Thin 11SC i5 11400H (664VN)</td>
            <td>16.490.000đ</td>
            <td>15</td>
            <td>
                <a href="editProduct.php" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>
                <a class="action-button" onclick="warning(this)">
                    <i class="fas fa-trash-alt"></i>
                    <div class="action-tooltip">Xóa</div>
                </a>
            </td>
        </tr>
    </table>
    <div class="pagination">
        <a href="productAdmin.php">&lt;</a>
        <a href="productAdmin.php">1</a>
        <a href="productAdmin2.php" class="active">2</a>
        <a href="productAdmin2.php">&gt;</a>
    </div>
<?php
    include_once 'inc/footer.php';
?>  