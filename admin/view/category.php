<?php
    include 'inc/header.php';
?>
<h1>Hãng sản xuất</h1>
<div class="admin-controller">
    <a href="?page=add_category" class="create-button"><i class="fas fa-plus"></i> Thêm</a>
    <form class="filter" method="post" action="?page=search_category">
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="kyw" placeholder="Nhập tên hãng sản xuất">
        </div>
        <button type="submit" name="search-category-btn" class="show">Lọc</button>
    </form>
</div>
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
    if($result!=null){
            //chia mang result thanh tung trang
        $num_per_page = 8; //total records each page
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
                <a href="?page=edit_category&idHSX=<?=$idhangsanxuat?>" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>
            </td>
        </tr>
    <?php
        }
    }
    else echo 
        '<tr>
            <td colspan="5" class="nofound">Không tìm thấy dữ liệu</td>
        </tr>'
    ?>
</table>
<div class="pagination">
<?php           
    if($result!=null){
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
    }
    ?>
</div>
<?php
    include 'inc/footer.php';
?>