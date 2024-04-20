<?php
    include 'inc/header.php';
?>
<h1>Hãng sản xuất</h1>
<a href="?page=add_category" class="create-button"><i class="fas fa-plus"></i> Thêm</a>
<!--product list-->
<table>
    <!--noi dung tieu de-->
    <tr class="title">
        <th>Mã</th>
        <th>Logo</th>
        <th>Hãng sản xuất</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
    </tr>
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
        <!--noi dung cac san pham-->
        <tr class="item">
            <td class="category_id"><?=$idhangsanxuat?></td>
            <td class="category"><img src="../uploads/uploads_category/<?=$logo?>" alt="category"></td>
            <td><?=$tenHSX?></td>
            <?php
                if($trangthai==0){
                    echo '<td><span class="status red">Bị ẩn</span></td>
                    <td>
                    <a class="action-button unlock_category">
                        <i class="fa-solid fa-lock"></i>
                        <div class="action-tooltip">Mở</div>
                    </a>';
                }
                else{
                    echo '<td><span class="status green">Hoạt động</span></td>
                    <td>
                    <a class="action-button lock_category">
                        <i class="fa-solid fa-unlock"></i>
                        <div class="action-tooltip">Khóa</div>
                    </a>';
                }
            ?>
                <a href="?page=edit_category&idhangsanxuat=<?=$idhangsanxuat?>" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>
            </td>
        </tr>
    <?php
        }
    ?>
</table>