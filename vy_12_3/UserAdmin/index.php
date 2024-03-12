<?php
    // require header
    include_once 'header.php';
    if(isset($_GET['page'])&&($_GET['page']!=="")){
        switch(trim($_GET['page'])){
            case 'userAdmin':
                $result = getAllUser();
                require_once('userAdmin.php');
                break;
            
            case 'addUserFrm':
                require_once('addUserFrm.php');
                break;

            case 'addUser':
                if(isset($_POST['btnadd'])){
                    //avata
                    $images = $_FILES['input_file']['name'];
                    $tmp_dir = $_FILES['input_file']['tmp_name'];
                    $imageSize = $_FILES['input_file']['size'];

                    if($imageSize===0){
                        $picProfile="person.png";
                    }
                    else{
                    $upload_dir='uploads/';
                    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
                    $picProfile = rand(1000, 1000000).'.'.$imgExt;
                    move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
                    }
                    $ten = $_POST['ten'];
                    $email = $_POST['email'];
                    $dienthoai = $_POST['dienthoai'];
                    $diachi = $_POST['diachi'];
                    $phanquyen = $_POST['phanquyen'];
                    addUser($picProfile, $ten, $email, $dienthoai, $diachi, $phanquyen, 1);
                }

                //**** note: kiem tra: email, dienthoai khong duoc trung ****
                //neu trung thi xuat thong bao
                //load lai page
                $result = getAllUser();
                require_once('userAdmin.php');
                break;

            case 'detailUserFrm':
                if(isset($_GET['id'])&& ($_GET['id']>0)){
                    $result = getUserByID($_GET['id']);
                    require_once('detailUserFrm.php');
                }
                else{
                    $result = getAllUser();
                    require_once('userAdmin.php');
                }
                break;

            case 'editUserFrm':
                if(isset($_GET['id'])&& ($_GET['id']>0)){
                    $result = getUserByID($_GET['id']);
                    require_once('editUserFrm.php');
                }
                else{
                    $result = getAllUser();
                    require_once('userAdmin.php');
                }
                break;

            case 'editUser':
                    //cap nhat value moi va load lai trang
                if(isset($_POST['btnedit'])){
                    //avata
                    $images = $_FILES['input_file']['name'];
                    $tmp_dir = $_FILES['input_file']['tmp_name'];
                    $imageSize = $_FILES['input_file']['size'];

                    if($imageSize===0){ //khong thay doi
                        $picProfile=$_POST['curr_img'];
                    }
                    else{
                    $upload_dir='uploads/';
                    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
                    $picProfile = rand(1000, 1000000).'.'.$imgExt;
                    move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
                    }

                    $id = $_POST['id'];
                    $ten = $_POST['ten'];
                    $email = $_POST['email'];
                    $dienthoai = $_POST['dienthoai'];
                    $diachi = $_POST['diachi'];
                    $phanquyen = $_POST['phanquyen'];
                    $trangthai = $_POST['trangthai']; //hoat dong
                    editUser($id,$picProfile,$ten,$email,$dienthoai,$diachi,$phanquyen,$trangthai);
                }
                $result = getAllUser();
                require_once('userAdmin.php');
                break;

            case 'deleteUser':
                if(isset($_GET['id'])&&($_GET['id']>0)) //nguoi nay co ton tai neu khong se load lai trang
                    {
                        $id=$_GET['id'];
                        deleteUser($id);
                    }
                $result = getAllUser();
                require_once('userAdmin.php');
                break;
            
            case 'searchUser':
                if(isset($_POST['btnsearch'])){
                    $ten = $_POST['kyw'];
                    $result = searchUser($ten);
                    if(count($result)==0) require('noFound.php');
                    else require_once('userAdmin.php');
                }
                break;

            default:
            //require homepage
            $result = getAllUser();
            require_once 'userAdmin.php';
            break;
        }
    }
    else{
        //require homepage
        $result = getAllUser();
        require_once 'userAdmin.php';
    }

    //require footer
    include_once 'footer.php';
?>