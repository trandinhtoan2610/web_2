<?php
include "./config/config.php";
if((isset($_POST['dangnhap']))){
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($password == $row['password'] && $row['type'] == 0) {
            // Đăng nhập thành công
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['type'] = $row['type'];
            header("Location: index.php");
        }  else{
            $error_msg = "Mật khẩu không chính xác";
        }
    } else {
        $error_msg = "Người dùng không tồn tại";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_Reglog.css">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
    <div class=" form-box login">
            <h1 style="color: red">Đăng nhập ADMIN</h1>
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
    </div>
    
</body>
</html>