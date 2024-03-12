<?php
    include_once "../connect.php";
    include_once "functions.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/1acf2d22a5.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="mainPage_style.css"> <!-- css style - co the sua lai -->
		<title>Thế giới di động</title>
	</head>
	<body>
		<header>
            <nav>
                    <ul class="navbar-list">
                        <!--link hompage-->
                        <li>
                            <a href="index.php?page=home">
                            <img src="../../img/thegioididong.png">
                            </a>
                        </li>	
                        <li>
                            <form method="post" action="index.php?page=searchProduct">
                                <input type="text" name="kyw" placeholder="Nhập tên sản phẩm...">
                                <button type="submit" name="btnsearch"><i class="fa-solid fa-magnifying-glass"></i></a>
                            </form>
                        </li>
                        <li>
                            <a href="advSrch.html">Tìm kiếm nâng cao</a>
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
                            <a href="reglog.html">
                            <i class="fa-solid fa-circle-user"></i>Đăng nhập
                            </a>
                        </li>
                    </ul>
            </nav>
        </header> 
			