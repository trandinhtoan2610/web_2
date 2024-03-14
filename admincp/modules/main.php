<section id="main">
    <?php
    if (isset($_GET['action']) && isset($_GET['query'])) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }

    switch ($tam) {
        case 'quanlysanpham':
            switch ($query) {
                case 'lietke':
                    include("../admincp/modules/quanlysanpham/lietke.php");
                    break;
                case 'them':
                    include("../admincp/modules/quanlysanpham/them.php");
                    break;
                case 'sua':
                    include("../admincp/modules/quanlysanpham/sua.php");
                    break;
                default:
                    include("../admincp/modules/quanlysanpham/chaomung.php");
                    break;
            }
            break;
        // case 'quanlyhangsanxuat':
        //     switch ($query) {
        //         case 'lietke':
        //             include("../admincp/modules/quanlyhangsanxuat/lietke.php");
        //             break;
        //         case 'them':
        //             include("../admincp/modules/quanlyhangsanxuat/themsanpham.php");
        //             break;
        //         case 'sua':
        //             include("../admincp/modules/quanlyhangsanxuat/sua.php");
        //             break;
        //         default:
        //             include("../admincp/modules/quanlyhangsanxuat/chaomung.php");
        //             break;
        //     }
            // break;

        default:
            include("../admincp/modules/chaomung.php");
            break;
    }
    ?>


</section>