<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/1acf2d22a5.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../css/style_Mainpage.css"> <!-- css style - co the sua lai -->
        <link rel="stylesheet" href="../css/style_Search.css"> <!-- css style - co the sua lai -->
		<title>Thế giới di động</title>
	</head>
	<body>
	    <header>
<!--Nav-bar gom: logo, xem gia tai tp, search-bar, gio hang, tra cứu đơn hàng, tài khoản, liên hệ-->
                <nav>
                    <ul class="navbar-list">
                        <!--link hompage-->
                        <li>
                            <a href="indexTK.php">
                            <img src="../img/thegioididong.png">
                            </a>
                        </li>
                        <li>
                            <!--<input type="text" placeholder="Bạn tìm gì..."> 
                            <i class="fa-solid fa-magnifying-glass"></i>  -->
                            <input type="text"  placeholder="Nhập tên sản phẩm..."> 
                            <a href="search1TK.php" class="srch">
                                <i class="fa-solid fa-magnifying-glass"></i> 
                            </a>
                        </li>
                        <li>
                            <a href="advSrchTK.php">Tìm kiếm nâng cao</a>
                        </li>
                        <li>
                            <a href="giohangTK.php">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Giỏ hàng 
                            </a>
                        </li>
                        <li>
                            <a href="receiptTK.php">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            Lịch sử mua hàng
                            </a>
                        </li>
                        <li>
                            <a href="index.php">Đăng xuất</a>
                        </li>
                        <li>
                            <span class="user-afterLog"><i class="fa-solid fa-circle-user"></i></span>Nhom2
                        </li>
                    </ul>
                </nav>
        </header>
        <main>
        <div class="container">
                <!--phan loai theo hang san pham-->
                <div class="brand-list">
                    <a href="acerTK.php">
                        <img src="../img/acer.png" alt="acer">
                    </a>
                    <a href="lenovoTK.php">
                        <img src="../img/lenovo.png" alt="lenovo">
                    </a>
                </div>