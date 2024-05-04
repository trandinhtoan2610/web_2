<header>
    <nav>
        <ul class="navbar-list">
            <!--link hompage-->
            <li>
                <a href="index.php?page=home">
                <img src="asset/img/logo.png">
                </a>
            </li>	
            <li>
                <form method="post" action="?page=search">
                    <input type="text" name="kyw" placeholder="Nhập tên sản phẩm...">
                    <button type="submit" name="search-btn"><i class="fa-solid fa-magnifying-glass"></i></a>
                </form>
            </li>
            <li>
                <a href="?page=advSrch">Tìm kiếm nâng cao</a>
            </li>
            <li>
                <a onclick="remind()">
                <i class="fa-solid fa-cart-shopping"></i>
                Giỏ hàng 
                </a>
            </li>
            <li>
                <?php
                    if(!isset($_SESSION['tenTK'])){
                ?>
                <a onclick="remind()">
                <i class="fa-solid fa-clock-rotate-left"></i>
                Lịch sử mua hàng
                </a>
                <?php
                    }else{
                ?>
                <a href="?page=history">
                <i class="fa-solid fa-clock-rotate-left"></i>
                Lịch sử mua hàng
                </a>
                <?php
                    }
                ?>
            </li>

            <li>
                <?php
                    if(!isset($_SESSION['tenTK'])){
                ?>
                <a href="./login.php">
                <i class="fa-solid fa-circle-user"></i>Đăng nhập
                </a>
                <?php
                    }else{
                ?>
                    <a href="./logout.php">
                    <i class="fa-solid fa-circle-user"></i>Đăng xuất
                    </a>
                <?php
                    }
                ?>
            </li>
        </ul>
    </nav>
</header> 
    