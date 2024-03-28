<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--đổi title khi nhấn registerLink-->
    <title class="title">Đăng nhập</title>
    <link rel="stylesheet" href="../css/style_Reglog.css">
</head>
<body>
    <img src="../img/thegioididong.png" alt="thegioididong">
    <div class="wrapper">
        <div class=" form-box login">
            <h1>Đăng nhập</h1>
            <form action="indexTK.php">
                <input type="text" placeholder="Tên đăng nhập" required> 
                <input type="password" placeholder="Mật khẩu" required>
                <button>ĐĂNG NHẬP</button>
                <p>Bạn mới biết đến Thế Giới Di Động ?</p> 
                <a href="#" class="register-link">Đăng ký</a>
            </form>
        </div>
    
        <div class="form-box register">
            <h1>Đăng ký</h1>
            <form action="indexTK.php">
                <input type="email" placeholder="Email" required> 
                <input type="tel" placeholder="Số điện thoại" required>
                <input type="text" placeholder="Tên đăng nhập" required> 
                <input type="password" placeholder="Mật khẩu" required>
                <input type="password" placeholder="Nhập lại mật khẩu" required>
                <label><input type="checkbox">Tôi đồng ý với các <a href="#"></a>Điều khoản dịch vụ</a> & <a href="#">Chính sách bảo mật</a></label>
                <button>ĐĂNG KÝ</button>
                <p>Bạn đã có tài khoản? <a href="#" class="login-link">Đăng nhập</a></p>
            </form>
        </div>
    </div>
    <script>
        const wrapper=document.querySelector('.wrapper');
        const loginLink=document.querySelector('.login-link');
        const registerLink=document.querySelector('.register-link');
        const title=document.querySelector('.title');

        registerLink.addEventListener('click',()=>{
            wrapper.classList.add('active');
        });

        loginLink.addEventListener('click',()=>{
            wrapper.classList.remove('active');
        });
    </script>
</body>
</html>