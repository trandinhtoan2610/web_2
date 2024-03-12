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
                            $username = $_SESSION['username'];
                            echo "<p>Xin chào, $username!</p>";
                            echo "";
                        ?>
                        <p><a href='./logout.php'>Đăng xuất</a></p>
                </li>
            </div>
        </ul>
    </nav>
</head>