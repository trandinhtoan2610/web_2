<header>
            <nav>
                    <ul class="navbar-list">
                        <!--link hompage-->
                        <li>
                            <a href="index.php">
                            <img src="./img/thegioididong.png">
                            </a>
                        </li>	
                        <li>
                            <input type="text" placeholder="Nhập tên sản phẩm..."> 
                            <a href="search1.html"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </li>
                        <li>
                            
                        </li>
                        <li>
                            <?php
                            session_start();
                            // Kiểm tra xem người dùng đã đăng nhập hay chưa
                            if (!isset($_SESSION['username'])) {
                                // Người dùng chưa đăng nhập, hiển thị nút thông báo hoặc thông báo khác
                                echo '<a onclick="alert(\'Vui lòng đăng nhập\')"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>';
                            } else {
                                echo '<a href="index.php?quanly=giohang"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>';
                            }
                            ?>
                        </li>
                        <li>
                            <?php
                            // Kiểm tra xem người dùng đã đăng nhập hay chưa
                            if (!isset($_SESSION['username'])) {
                                // Người dùng chưa đăng nhập, hiển thị nút thông báo hoặc thông báo khác
                                echo '<a onclick="alert(\'Vui lòng đăng nhập\')">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                Lịch sử mua hàng
                                </a>';
                            } else {
                                echo '<a href="index.php?quanly=history">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                Lịch sử mua hàng
                                </a>';
                            }
                            ?>        
                            
                        </li>
                        <li>
                        <?php
                        // Kiểm tra xem người dùng đã đăng nhập hay chưa
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            // Hiển thị nội dung cho người dùng đã đăng nhập
                            echo "<p>Xin chào, $username!</p>";
                            echo "<p><a href='logout.php'>Đăng xuất</a></p>";
                        } else {
                            // Hiển thị nội dung cho người dùng chưa đăng nhập
                            echo "<a href='login.php'><i class='fa-solid fa-circle-user'></i>Đăng nhập</a>";
                        }
                        ?>
                            
                        </li>
                    </ul>
            </nav>
        </header> 