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
            <nav>
				<ul class="navbar-list">
					<!--link hompage-->
					<li>
						<a href="index.php">
						<img src="../img/thegioididong.png">
						</a>
					</li>	
					<li>
						<input type="text" placeholder="Nhập tên sản phẩm..."> 
						<a href="search1.php"><i class="fa-solid fa-magnifying-glass"></i></a>
					</li>
					<li>
						<a href="advSrch.php">Tìm kiếm nâng cao</a>
					</li>
					<li>
						<a onclick="remind()">
						<i class="fa-solid fa-cart-shopping"></i>
						Giỏ hàng 
						</a>
					</li>
					<li>
						<a onclick="remind()">
						<i class="fa-solid fa-clock-rotate-left"></i>
						Lịch sử mua hàng
						</a>
					</li>
					<li>
						<a href="reglog.php">
						<i class="fa-solid fa-circle-user"></i>Đăng nhập
						</a>
					</li>
				</ul>
            </nav>
        </header> 
		<main>
		<div class="container">
				<!--phan loai theo hang san pham-->
				<div class="brand-list">
					<a href="acer.php">
						<img src="../img/acer.png" alt="acer">
					</a>
					<a href="lenovo.php">
						<img src="../img/lenovo.png" alt="lenovo">
					</a>
				</div>