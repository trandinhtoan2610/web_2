<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--đổi title khi nhấn registerLink-->
    <title class="title">Đăng nhập</title>
    <link rel="stylesheet" href="asset/css/style_signIn.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="asset/js/script.js"></script>
    <script src="asset/js/signIn.js"></script>
</head>
<body>
    <img src="asset/img/logo.png" alt="thegioididong">
    <div class="wrapper">
        <div class="form-box login">
            <h1>Đăng nhập</h1>
            <form id="signIn-form">
                <input type="text" name="email" placeholder="Email" required> 
                <input type="password" name="pass" placeholder="Mật khẩu" required>
                <input type="hidden" name="signIn-btn" value="submit">
                <button type="submit" name="signIn-btn">ĐĂNG NHẬP</button>
            </form>
        </div>
    </div>
</body>
</html>