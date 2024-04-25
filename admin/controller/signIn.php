<?php
    if(!isset($_POST['signIn-btn']))
        // hien thi form dang nhap
        require_once 'view/signIn.php';
    else{
            $email = $_POST['email'];
            $matkhau = $_POST['matkhau'];
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

?>