<head>
    <nav>
        <ul class="navbar-list">
            <!--link hompage-->
            <li class="left">
                <a href="productAdmin.html">
                    <img src="../img/thegioididong.png">
                </a>
            </li>
            <div class="right">
                <li>
                    <input type="text" placeholder="Tên sản phẩm...">
                    <a href="productAdmin.html"><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>
                <li>
                    <?php
                        // Bắt đầu phiên
                        session_start();
                        // Kiểm tra xem người dùng đã đăng nhập hay chưa
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            // Hiển thị nội dung cho người dùng đã đăng nhập
                            echo "<p>Xin chào, $username!</p>";
                            echo "<p><a href='../logout.php'>Đăng xuất</a></p>";
                        } else {
                            // Hiển thị nội dung cho người dùng chưa đăng nhập
                            echo "<a href='login.php'><i class='fa-solid fa-circle-user'></i>Đăng nhập</a>";
                        }
                        ?>
                </li>
            </div>
        </ul>
    </nav>
</head>