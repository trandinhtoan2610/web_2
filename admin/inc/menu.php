<header>
<nav>
    <ul class="navbar-list">
        <!--link hompage-->
        <li class="left">
            <a href="?page=product">
            <img src="asset/img/logo.png">
            </a>
        </li>
        <?php
            if($title == "Người dùng"){
        ?>
            <form class="right" method="post" action="?page=search_user">
                <li>
                    <input type="text" name="kyw" placeholder="Nhập từ khóa tìm kiếm ..."> 
                    <button type="submit" name="search-user-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </li>
                <li>
                    <img src="account.jpg"><span>Thanh</span> 
                </li>
            </form>
        <?php
            }
            else if($title = "Sản phẩm"){
        ?>
            <form class="right" method="post" action="?page=search_product">
                <li>
                    <input type="text" name="kyw" placeholder="Nhập từ khóa tìm kiếm ..."> 
                    <button type="submit" name="search-product-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </li>
                <li>
                    <img src="account.jpg"><span>Thanh</span> 
                </li>
            </form>
        <?php
            }
        ?>
    </ul>
</nav>
</header> 
<main>
    <aside id="mySidebar">
        <ul>
            <li><a onclick="w3_close()">Đóng &times;</a></li>
            <li><a href="?page=product">Sản phẩm</a></li>
            <li><a href="?page=category">Hãng sản xuất</a></li>
            <li><a href="?page=user">Người dùng</a></li>
            <li><a href="orderAdmin.html">Đơn hàng</a></li>
            <li><a href="thongKeAdmin.html">Thống kê</a></li>
        </ul>
    </aside>
    <section id="main">
        <button id="openNav" class="menu-button" onclick="w3_open()">&#9776; Menu</button>