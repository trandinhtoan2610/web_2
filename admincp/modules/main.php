<section id="main">
    <?php
    if (isset($_GET['action'])) {
        $tam = $_GET['action'];
    } else {
        $tam = ' ';
    }

    if ($tam == 'quanlysanpham') {
        include("../admincp/modules/quanlysanpham/quanlysanpham.php");
    } else if ($tam == 'quanlynguoidung') {

    } else if ($tam == 'quanlydonhang') {
        include("../admincp/modules/quanlysanpham/quanlydonhang.php");
    } else if ($tam == 'thongke') {

    } else {
        include("../admincp/modules/quanlysanpham/chaomung.php");
    }
    ?>
</section>