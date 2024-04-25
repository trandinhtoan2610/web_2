<?php
    include 'inc/header.php';
?>
<h1>Sản Phẩm</h1>
<div class="admin-controller">
    <a href="?page=add_product" class="create-button"><i class="fas fa-plus"></i> Thêm</a>
    <form class="filter" method="post" action="?page=search_product">
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="kyw" placeholder="Nhập tên sản phẩm">
        </div>
        <button type="submit" name="search-product-btn" class="show">Lọc</button>
    </form>
</div>
<!--product list-->
<table> 
    <!--noi dung tieu de-->
    <tr class="title">
        <th>Mã</th>
        <th>Hình ảnh</th>
        <th>Sản phẩm</th>
        <th>Giá bán</th>
        <th>Tồn kho</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
    </tr>
    <?php 
    if($result!=null){
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
            <td class="product_id"><?=$idSP?></td>
            <td class="product"><img src="../uploads/uploads_product/<?=$hinhanh?>" alt="person"></td>
            <td><?=$tenSP?></td>
            <td><?=number_format($giaban,0,"",".");?>đ</td>
            <td><?=$tonkho?></td>
            <?php
                if($trangthai==0) echo '<td><span class="status red">Bị ẩn</span></td>';
                else echo '<td><span class="status green">Đang bán</span></td>';
            ?>
            <td>
                <a href="?page=detail_product&idSP=<?=$idSP?>" class="action-button">
                    <i class="fa-solid fa-circle-info"></i>
                    <div class="action-tooltip">Chi tiết</div>
                </a>
                <a href="?page=edit_product&idSP=<?=$idSP?>" class="action-button">
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
            <td colspan="7" class="nofound">Không tìm thấy dữ liệu</td>
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