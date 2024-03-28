<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--đổi title khi nhấn registerLink-->
    <title class="title">Đăng nhập</title>
    <link rel="stylesheet" href="../../css/style_LoginAdmin.css">
</head>
<body>
    <img src="../../img/thegioididong.png" alt="thegioididong">
    <div class="wrapper">
        <div class=" form-box login">
            <h1>Đăng nhập</h1>
            <form action="productAdmin.php">
                <input type="text" placeholder="Tên đăng nhập" required> 
                <input type="password" placeholder="Mật khẩu" required>
                <button>ĐĂNG NHẬP</button>
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