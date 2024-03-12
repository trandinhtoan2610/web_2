<?php
    // require header
    include_once 'header.php';
    if(isset($_GET['page'])&&($_GET['page']!=="")){
        switch(trim($_GET['page'])){
            case 'home':
                $category = getAllCategory();
                $result = getAllProduct();
                require_once 'home.php';
                break;

            case 'searchProduct':
                if(isset($_POST['btnsearch'])){
                    $ten = $_POST['kyw'];
                    $result = searchProduct($ten);
                    $category = getAllCategory();
                    if(count($result)==0) require('noFound.php');
                    else require_once('home.php');
                }
                break;

            case 'category':
                if(isset($_GET['hangsanxuat'])&&($_GET['hangsanxuat']!=="")){
                    // lay id cua hang san xuat
                    $id = getCategoryID($_GET['hangsanxuat']);
                    //getCategoryID($_GET['hangsanxuat']);
                    //lay ra nhung sp cung loai
                    $result = getProductByCategory($id);
                }
                else $result = getAllProduct();
                $category = getAllCategory();
                require_once 'home.php';
                break;
                
            default:
            //require homepage
            $category = getAllCategory();
            $result = getAllProduct();
            require_once 'home.php';
            break;
        }
    }
    else{
        //require homepage
        $category = getAllCategory();
        $result = getAllProduct();
        require_once 'home.php';
    }

    //require footer
    include_once 'footer.php';
?>