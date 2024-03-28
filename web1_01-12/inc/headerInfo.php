<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1acf2d22a5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style_Address.css">
    <link rel="stylesheet" href="../css/style_AddressForm.css">
    <link rel="stylesheet" href="../css/style_OrderDetailUser.css">
    <link rel="stylesheet" href="../css/style_OrderSuccess.css">
    <title>Địa chỉ</title>
</head>
<body>
    <header>
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
        <aside>
            <a><i class="fa-regular fa-circle-user"></i>Nhom2</a>
            <a  href="receiptTK.php" class="link"><i class='bx bxs-receipt' ></i>Đơn mua</a>
            <a class="active"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>
        </aside>