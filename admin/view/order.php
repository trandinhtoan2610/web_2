<?php
    include 'inc/header.php';
?>
<h1>Đơn Hàng</h1>
<!--product list-->
<form class="filter" method="post" action="?page=search_order" onsubmit="return filterValidateOrder(this)">
    <select name="trangthai">
        <option value="all">Tất cả</option>
        <option value="cho">Chờ duyệt</option>
        <option value="vc">Đang vận chuyển</option>
        <option value="ht">Hoàn tất</option>
        <option value="huykh">Hủy bởi khách hàng</option>
        <option value="huynv">Hủy bởi nhân viên</option>
    </select>
    <div class="date">
        <label for="start">Từ ngày: </label>
            <input type="date" name="start">
        <label for="start">đến </label>
            <input type="date" name="end">
    </div>
    <button type="submit" name="search-order-btn" class="show">Lọc</button>
</form>
<!--product list-->
<table>
    <!--noi dung tieu de-->
    <tr class="title">
        <th>Mã đơn hàng</th>
        <th>Khách hàng</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhật</th>
        <th>Tổng tiền</th>            
        <th>Trạng thái</th>            
        <th>Thao tác</th>            
    </tr>
    <?php 
    if($result!=null){
        //chia mang result thanh tung trang
        $num_per_page = 5; //total records each page
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
            <td class="order_id"><?=$idDH?></td>
            <td><?=$tenTK?></td>
            <td><?=$ngaytao?></td>
            <td><?=$ngaycapnhat?></td>
            <td><?=number_format($tongtien,0,"",".");?>đ</td>
            <?php
                if($trangthai=="cho") echo '<td><span class="status yellow">Chờ duyệt</span></td>';
                if($trangthai=="vc") echo '<td><span class="status blue">Đang vận chuyển</span></td>';
                if($trangthai=="ht") echo '<td><span class="status green">Hoàn tất</span></td>';
                if($trangthai=="huynv") echo '<td><span class="status orange">Hủy bởi nhân viên</span></td>';
            ?>
            <td>
                <a href="?page=detail_order&idDH=<?=$idDH?>" class="action-button">
                    <i class="fa-solid fa-circle-info"></i>
                    <div class="action-tooltip">Chi tiết</div>
                </a>
                <?php
                    if($trangthai != "huynv"){
                ?>
                <a href="?page=edit_order&idDH=<?=$idDH?>" class="action-button">
                    <i class="fas fa-edit"></i>
                    <div class="action-tooltip">Chỉnh sửa</div>
                </a>
                <?php
                    }
                ?>
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