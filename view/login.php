<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--đổi title khi nhấn registerLink-->
    <title class="title">Đăng nhập</title>
    <link rel="stylesheet" href="./css/style_Reglog.css">
</head>
<body>
    <img src="./img/thegioididong.png" alt="thegioididong">
    <div class="wrapper" style="height: 650px;">
        <div class=" form-box login">
            <h1>Đăng nhập</h1>
            <form id="login-form">
                <input type="email" name="email" placeholder="Email" > 
                <input type="password" name="pass" placeholder="Mật khẩu" >
                <input type="hidden" name="dangnhap" value="submit">
                <button type="submit" name="dangnhap">ĐĂNG NHẬP</button>
                <p>Bạn mới biết đến Thế Giới Di Động ?</p> 
                <a href="#" class="register-link">Đăng ký</a>
            </form>
        </div>
    
        <div class="form-box register">
            <h1>Đăng ký</h1>
            <form id="signUp-form">
                <input type="text" name="tenTK" placeholder="Tên đăng nhập" > 
                <input type="email" name="email" placeholder="Email" > 
                <input type="text" name="dienthoai" placeholder="Số điện thoại" > 
                <input type="text" name="diachi" placeholder="Địa chỉ" > 
                <input id="password" type="password" name="pass" placeholder="Mật khẩu" >
                <input id="confirm_password" type="password" name="re_pass" placeholder="Nhập lại mật khẩu">
                <input type="hidden" name="dangky" value="submit">
                <button id="btn-register" type="submit" name="dangky">ĐĂNG KÝ</button>
                <p>Bạn đã có tài khoản? <a href="#" class="login-link">Đăng nhập</a></p>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="asset/js/account.js"></script>
    <script src="asset/js/account_ajax.js"></script>
</body>
</html>