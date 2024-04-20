<?php
    include 'inc/header.php';
?>
<h1>Người Dùng</h1>
<!--create button-->
<!-- mình dùng lại code của trang sửa thông tin sản phẩm -->
<a href="?page=add_user" class="create-button"><i class="fas fa-plus"></i> Thêm</a>
<!-- user's information list-->
<table>
    <!--noi dung tieu de-->
    <tr class="title">
        <th>Mã</th>
        <th>Avatar</th>
        <th>Người dùng</th>
        <th>Email</th>
        <th>Loại người dùng</th>
        <th>Trạng thái</th>
        <th>Chức năng</th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
    </tr>
    <!--thong tin users -->
    <?php 
        //chia mang result thanh tung trang
    $num_per_page = 2; //total records each page
    $curr_page = getPage();
    $start = ($curr_page-1)*$num_per_page; //start divide for this page
    $keys = array_keys($result);
    $total_records = count($result);
    echo '<input type="hidden" name="curr_page" class="curr_page" value="'.$curr_page.'">';

    for($i=$start; $i<$start+$num_per_page && $i<$total_records; $i++){
        extract($result[$keys[$i]]);
    ?>
        <tr class="item">
            <td class="user_id"><?=$idTK?></td>
            <td class="user"><img src="../uploads/uploads_user/<?=$avatar?>" alt="person"></td>
            <td><?=$tenTK?></td>
            <td><?=$email?></td>
        <?php
            if($phanquyen=="AD") //admin
                echo '<td>Admin</td>';
            else echo '<td>Khách hàng</td>';
            
            if($trangthai==0){
                echo '<td><span class="status red">Bị khóa</span></td>
                <td>
                <a class="action-button unlock_user">
                    <i class="fa-solid fa-lock"></i>
                    <div class="action-tooltip">Mở</div>
                </a>';
            }
            else{
                echo '<td><span class="status green">Hoạt động</span></td>
                <td>
                <a class="action-button lock_user">
                    <i class="fa-solid fa-unlock"></i>
                    <div class="action-tooltip">Khóa</div>
                </a>';
            }
        ?>
                <a href="?page=detail_user&idTK=<?=$idTK?>" class="action-button">
                    <i class="fa-solid fa-circle-info"></i>
                    <div class="action-tooltip">Chi tiết</div>
                </a>
                <a href="?page=edit_user&idTK=<?=$idTK?>" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="pagination">
<?php           
    $total_pages = ceil($total_records/$num_per_page);

    if($curr_page>1)
        echo '<a href="index.php?'.$pageTitle.'&index='.($curr_page-1).'">&lt;</a>';
    else echo '<a href="index.php?'.$pageTitle.'&index=1">&lt;</a>';

    for($i=1; $i<=$total_pages; $i++){
        if($curr_page==$i)
            echo '<a href="index.php?'.$pageTitle.'&index='.$i.'" class="active">'.$i.'</a>';
        else echo '<a href="index.php?'.$pageTitle.'&index='.$i.'">'.$i.'</a>';
    }

    //kiem tra neu currentpage la trang dau tien thi giu nguyen
    if($curr_page<$total_pages)
        echo '<a href="index.php?'.$pageTitle.'&index='.($curr_page+1).'">&gt;</a>';
    else echo '<a href="index.php?'.$pageTitle.'&index='.$total_pages.'">&gt;</a>';
    ?>
</div>
<?php
    include 'inc/footer.php';
?>