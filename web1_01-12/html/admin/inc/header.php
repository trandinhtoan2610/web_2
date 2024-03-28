<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/1acf2d22a5.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/style_AddProduct.css"> <!-- css style - co the sua lai -->
		<link rel="stylesheet" href="../../css/style_OrderAdmin.css"> <!-- css style - co the sua lai -->
		<link rel="stylesheet" href="../../css/style_UserAdmin.css"> <!-- css style - co the sua lai -->
		<link rel="stylesheet" href="../../css/style_Thongke.css"> <!-- css style - co the sua lai -->
        <link rel="stylesheet" href="../../css/style_ProductAdmin.css"> <!-- css style - co the sua lai -->
		<title>Thêm sản phẩm</title>
	</head>
    <body>
        <header>
            <nav>
                    <ul class="navbar-list">
                        <!--link hompage-->
                        <li class="left">
                            <a href="productAdmin.php">
                            <img src="../../img/thegioididong.png">
                            </a>
                        </li>
                        <div class="right">
                            <li>
                                <input type="text" placeholder="Tên sản phẩm..."> 
                                <a href="productAdmin.php"><i class="fa-solid fa-magnifying-glass"></i></a>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-user"></i> Thanh
                            </li>
                        </div>
                    </ul>
            </nav>
        </header>
        <main>
			<aside id="mySidebar">
				<ul>
					<li><a onclick="w3_close()">Đóng &times;</a></li>
					<li><a href="productAdmin.php">Sản phẩm</a></li>
					<li><a href="orderAdmin.php">Đơn hàng</a></li>
					<li><a href="userAdmin.php">Người dùng</a></li>
					<li><a href="thongKeAdmin.php">Thống kê</a></li>
				</ul>
			</aside>
			<section id="main"> 
				<button id="openNav" class="menu-button" onclick="w3_open()">&#9776; Menu</button>