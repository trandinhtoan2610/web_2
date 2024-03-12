<?php
    function getAllUser(){
        $sql='select * from User';
        return getAll($sql);
    }

    function getUserByID($id){
        $sql = 'select * from User where ID='.$id;
        return getOne($sql);
    }
    
    function displayUser($item){
            extract($item);
            echo '
            <tr class="user">
            <td>'.$ID.'</td>
            <td><a href="#"><img src="uploads/'.$avatar.'" alt="per1"></a>
            <td>'.$ten.'</td>
            <td>'.$email.'</td>';
            if($phanquyen==0) //admin
                echo '<td>Admin</td>';
            else echo '<td>Khách hàng</td>';
            if($trangthai==0)
                echo '<td><span class="status red">Bị khóa</span></td>';
            else
                echo '<td><span class="status green">Hoạt động</span></td>';
            echo 
            '<td>
            <a href="index.php?page=detailUserFrm&id='.$ID.'" class="action-button">
                <i class="fa-solid fa-circle-info"></i>
                <div class="action-tooltip">Chi tiết</div>
            </a>
            <a href="index.php?page=editUserFrm&id='.$ID.'" class="action-button">
                <i class="fas fa-edit"></i>
                <div class="action-tooltip">Chỉnh sửa</div>
            </a>
            <a href="index.php?page=deleteUser&id='.$ID.'" class="action-button">
                <i class="fas fa-trash-alt"></i>
                <div class="action-tooltip">Xóa</div>
            </a>
            </td>';
    }

    function addUSer($avatar, $ten, $email, $dienthoai, $diachi, $phanquyen, $trangthai){
        $sql='insert into User(avatar, ten, email, dienthoai, diachi, phanquyen, trangthai) values ("'.$avatar.'","'.$ten.'","'.$email.'","'.$dienthoai.'","'.$diachi.'",'.$phanquyen.','.$trangthai.')';
        insert($sql);
    }

    function editUser($id,$picProfile,$ten, $email, $dienthoai, $diachi, $phanquyen, $trangthai){
        $sql = 
        'UPDATE User 
        SET avatar = "'.$picProfile.'",
        ten = "'.$ten.'",
        email = "'.$email.'",
        dienthoai = "'.$dienthoai.'",
        diachi = "'.$diachi.'",
        phanquyen = '.$phanquyen.',
        trangthai = '.$trangthai.'
        WHERE id='.$id;
        edit($sql);
    }

    function deleteUser($id){
        $sql='DELETE FROM User WHERE id='.$id;
        delete($sql);
    }

    function searchUser($ten){
        $sql='SELECT * FROM User WHERE ten LIKE "%'.$ten.'%"';
        return getAll($sql);
    }
?>