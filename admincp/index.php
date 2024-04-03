<?php
include("../admincp/config/config.php");
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['type'])) {
    header("Location: login.php");
    exit(); 
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1acf2d22a5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style_AddProduct.css">
    <link rel="stylesheet" href="css/style_ProductAdmin.css">
    <title>Sản phẩm</title>
</head>

<body>

    <?php include("../admincp/modules/header.php"); ?>
 
    <main>
        <?php
        include("../admincp/modules/menu.php");
        include("../admincp/modules/main.php");
        ?>
    </main>
</body> 
<script>
    // js cua phan aside menu
    function w3_open() {
        document.getElementById("main").style.marginLeft = "15%";
        document.getElementById("mySidebar").style.width = "15%";
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("openNav").style.display = 'none';
    }
    function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
    }
    //js xoa 
</script>

</html>