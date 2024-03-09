<?php
    include "./admincp/config/config.php";
    if((isset($_POST['dangnhap']))){
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($password == $row['password'] && $row['type'] == 1) {
                // Đăng nhập thành công
                session_start();
                $_SESSION['username'] = $row['username'];
                header("Location: index.php");
            } else if($password == $row['password'] && $row['type'] == 0) {
                session_start();
                $_SESSION['username'] = $row['username'];
                header("Location: admincp/index.php");
            } else{
                $error_msg = "Mật khẩu không chính xác";
            }
        } else {
            $error_msg = "Người dùng không tồn tại";
        }
        $stmt->close();
    }

    if((isset($_POST['dangky']))){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $re_password = $_POST['re-password'];
        if($password == $re_password){
            $stmt = $conn->prepare("INSERT INTO `user`(`username`, `password`, `type`) VALUES (?,?,1)");
            $stmt->bind_param("ss", $username,$password);
            $stmt->execute();
        }
    }
    $conn->close();
?>

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
    <div class="wrapper">
        <div class=" form-box login">
            <h1>Đăng nhập</h1>
            <form action="login.php" method="post">
                <input type="text" name="user" placeholder="Tên đăng nhập" > 
                <input type="password" name="pass" placeholder="Mật khẩu" >
                <?php
                    if (isset($error_msg)) {
                    echo '<span style="color: red;">' . $error_msg . '</span><br/>';
                    }
                ?>
                <button type="submit" name="dangnhap">ĐĂNG NHẬP</button>
                <p>Bạn mới biết đến Thế Giới Di Động ?</p> 
                <a href="#" class="register-link">Đăng ký</a>
            </form>
        </div>
    
        <div class="form-box register">
            <h1>Đăng ký</h1>
            <form action="login.php" method="post">
                <input id="txtUser" type="text" name="username" placeholder="Tên đăng nhập" onkeyup="showHint(this.value)" >
                <span id="txtHint" style="color: red"></span> 
                <input id="password" type="password" name="password" placeholder="Mật khẩu" >
                <input id="confirm_password" type="password" name="re-password" placeholder="Nhập lại mật khẩu" onkeyup="validatePassword()">
                <span id="confirmMessage"></span><br/>
                <span id="username_feedback"></span><br/>
                <label><input type="checkbox">Tôi đồng ý với các <a href="#"></a>Điều khoản dịch vụ</a> & <a href="#">Chính sách bảo mật</a></label>
                <button id="btn-register" type="submit" name="dangky" >ĐĂNG KÝ</button>
                <p>Bạn đã có tài khoản? <a href="#" class="login-link">Đăng nhập</a></p>
            </form>
        </div>
    </div>
    <script>
        const wrapper=document.querySelector('.wrapper');
        const loginLink=document.querySelector('.login-link');
        const registerLink=document.querySelector('.register-link');
        const title=document.querySelector('.title');
        const btn_register = document.getElementById("btn-register");
        const txtHint = document.getElementById("txtHint");                          
        registerLink.addEventListener('click',()=>{
            wrapper.classList.add('active');
        });
        loginLink.addEventListener('click',()=>{
            wrapper.classList.remove('active');
        });

        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var message = document.getElementById("confirmMessage");
            if(password == '' || confirmPassword==''){
                message.innerHTML = "";
            } else if (password == confirmPassword) {
                message.innerHTML = "Mật khẩu trùng khớp";
                message.style.color = "green";
                btn_register.disabled = false;
            } else {
                message.innerHTML = "Mật khẩu không trùng khớp";
                message.style.color = "red";
                btn_register.disabled = true;
            }
            if(document.getElementById("txtUser").value == "" && txtHint.innerText.trim() == ""){
                btn_register.disabled = true;
            } 
        }

        function showHint(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                txtHint.innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "gethint.php?q=" + str, true);
            xmlhttp.send();
            if(document.getElementById("txtUser").value != "" && txtHint.innerText.trim() == "" && document.getElementById("password").value == document.getElementById("confirm_password").value){
                btn_register.disabled = false;
            } else btn_register.disabled = true;
        }
    </script>
</body>
</html>