<?php
	include_once 'inc/header.php';
?>
    <h1>Người Dùng</h1>
    <!--create button-->
    <!-- mình dùng lại code của trang sửa thông tin sản phẩm -->
    <a href="addUser.php" class="create-button"><i class="fas fa-plus"></i> Thêm</a>
    <!-- user's information list-->
    <table>
        <!--noi dung tieu de-->
        <tr class="title">
            <th>Mã</th>
            <th>Avatar</th>
            <th>Người dùng</th>
            <th>Email</th>
            <th>Loại người dùng</th>
            <th>Chức năng</th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
            <th>Khóa người dùng</th>
        </tr>
        <!--thong tin users -->
        <tr class="user">
            <td>#1</td>
            <td><a href="userDetail.php"><img src="../../img/per1.jpg" alt="per1"></a>
            <td>Nguyễn Mạnh Hùng</td>
            <td>manhhung271193@gmail.com</td>
            <td>Admin</td>
            <td>
                <a href="editUser.php" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>
                <a class="action-button" onclick="warning(this)">
                    <i class="fas fa-trash-alt"></i>
                    <div class="action-tooltip">Xóa</div>
                </a>
            </td>
            <td>
                <input type="checkbox">
            </td>
        </tr>
        <tr class="user">
            <td>#2</td>
            <td><a href="userDetail.php"><img src="../../img/per2.jpg" alt="per2"></a></td>
            <td>Phạm Hoàng Phú</td>
            <td>phamphu130880@gmail.com</td>
            <td>Khách hàng</td>
            <td>
                <a href="editUser.php" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>
                <a class="action-button" onclick="warning(this)">
                    <i class="fas fa-trash-alt"></i>
                    <div class="action-tooltip">Xóa</div>
                </a>
            </td>
            <td>
                <input type="checkbox">
            </td>
        </tr>
        <tr class="user">
            <td>#3</td>
            <td><a href="userDetail.php"><img src="../../img/per3.jpg" alt="per3"></a></td>
            <td>Lê Thị Uyên</td>
            <td>uyenle030984@gmail.com</td>
            <td>Khách hàng</td>
            <td>
                <a href="editUser.php" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>
                <a class="action-button" onclick="warning(this)">
                    <i class="fas fa-trash-alt"></i>
                    <div class="action-tooltip">Xóa</div>
                </a>
            </td>
            <td>
                <input type="checkbox">
            </td>
        </tr>
    </table>
    <div class="pagination">
        <a href="userAdmin.php">&lt;</a>
        <a href="userAdmin.php">1</a>
        <a href="userAdmin2.php" class="active">2</a>
        <a href="userAdmin2.php">&gt;</a>
    </div>
<?php
    include_once 'inc/footer.php';
?>          