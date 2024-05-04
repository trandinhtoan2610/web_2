<?php
    session_start();
    ob_start();
    include "./lib/connect.php";
    include "./model/user.php";
    if((isset($_POST['dangnhap']))){
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $result = checkuser($username,md5($password));
        if($result != null){
            if($result['phanquyen'] == "KH" && $result['password']) {
                $_SESSION['idUser'] = $result['idTK'];
                $_SESSION['tenTK'] = $result['tenTK'];
                header("Location: index.php");
            }else{
                $error_msg = "Mật khẩu không chính xác";
            }
        } else {
            $error_msg = "Người dùng không tồn tại";
        }
    }

    if((isset($_POST['dangky']))){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $re_password = $_POST['re-password'];
        $diachi = $_POST['phuong'] . ", " .$_POST['quan'] .", ". $_POST['tinh'];
        $phone = $_POST['phonenumber'];
        $username = $_POST['username'];
        if($password == $re_password){
            $hashed_password = md5($password);
            registerUser($username, $diachi, $email , $phone, 'test.png', $hashed_password);
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
    <link rel="stylesheet" href="./asset/css/style_Reglog.css">
    <style type="text/css">
      
    </style>
</head>
<body>
    <img src="./img/thegioididong.png" alt="thegioididong">
    <div class="wrapper" >
        <div class=" form-box login" >
            <h1>Đăng nhập</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
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
    
        <div class="form-box register" >
            <h1>Đăng ký</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <input id="txtUser" type="text" name="email" placeholder="Email" onkeyup="showHint(this.value)" >
                <span id="txtHint" style="color: red"></span> 
                <input id="password" type="password" name="password" placeholder="Mật khẩu" onkeyup="validatePassword()">
                <input id="confirm_password" type="password" name="re-password" placeholder="Nhập lại mật khẩu" onkeyup="validatePassword()">
                <span id="confirmMessage"></span><br/>
                <input id="txtUserName" type="text" name="username" placeholder="Họ và tên"  >
                <input id="txtPhoneNumber" type="text" name="phonenumber" placeholder="Số điện thoại" onkeyup="showHint(this.value)" >
                <div class="css_select_div">
                    <select class="css_select" id="tinh" name="tinh" title="Chọn Tỉnh Thành">
                        <option value="0">Tỉnh Thành</option>
                    </select>
                    <select class="css_select" id="quan" name="quan" title="Chọn Quận Huyện">
                        <option value="0">Quận Huyện</option>
                    </select>
                    <select class="css_select" id="phuong" name="phuong" title="Chọn Phường Xã">
                        <option value="0">Phường Xã</option>
                    </select>
                </div>
                
                <button id="btn-register" type="submit" name="dangky" disabled>ĐĂNG KÝ</button>
                <p>Bạn đã có tài khoản? <a href="#" class="login-link">Đăng nhập</a></p>
            </form>
        </div>
    </div>
    <script src="https://esgoo.net/scripts/jquery.js"></script>
    <script src="./asset/js/login.js"></script>
        
    
</body>
</html>