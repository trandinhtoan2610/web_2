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
		<link rel="stylesheet" href="userAdmin_style.css"> <!-- css style - co the sua lai -->
        <link rel="stylesheet" href="addUser_style.css"> <!-- css style - co the sua lai -->
		<title>Người dùng</title>
	</head>
    <body>
        <header>
            <nav>
                <ul class="navbar-list">
                    <!--link hompage-->
                    <li class="left">
                        <a href="index.php?page=userAdmin">
                        <img src="../../img/thegioididong.png">
                        </a>
                    </li>
                    <form class="right" method="post" action="index.php?page=searchUser">
                        <li>
                            <input type="text" name="kyw" placeholder="Tên khách hàng..."> 
                            <button type="submit" name="btnsearch"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </li>
                        <li>
                            <img src="account.jpg"><span>Thanh</span> 
                        </li>
                    </form>
                </ul>
        </nav>
        </header> 
        <main>
            <aside id="mySidebar">
				<ul>
					<li><a onclick="w3_close()">Đóng &times;</a></li>
					<li><a href="productAdmin.html">Sản phẩm</a></li>
					<li><a href="orderAdmin.html">Đơn hàng</a></li>
					<li><a class="active">Người dùng</a></li>
					<li><a href="thongKeAdmin.html">Thống kê</a></li>
				</ul>
			</aside>
            <section id="main">
                <button id="openNav" class="menu-button" onclick="w3_open()">&#9776; Menu</button>