<?php
    include 'inc/header.php';
?>
<h1>Thống Kê</h1>
<!--product list-->
<form class="filter" method="post" action="?page=search_thongke" onsubmit="return filterValidateDate(this)">
    <div class="date">
        <label for="start">Từ ngày: </label>
            <input type="date" name="start">
        <label for="start">đến </label>
            <input type="date" name="end">
    </div>
    <button type="submit" name="search-thongke-btn" class="show">Thống kê</button>
</form>
<?php
    if(isset($start) && isset($end)){
?>
<p style="margin-left: 120px; font-size: 18px; font-weight: 600; color: green">Từ ngày: <?=$startShow?> đến ngày: <?=$endShow?></p>
<?php
    }
?>
<!--product list-->
<table>
    <!--noi dung tieu de-->
    <tr class="title">
        <th>Mã</th>
        <th>Người dùng</th>
        <th>Điện thoại</th>
        <th>Tổng tiền</th>
        <th>Thao tác</th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
    </tr>
    <!--thong tin users -->
    <?php 
    if($result!=null){
        foreach($result as $item){
            extract($item);
    ?>
        <tr class="item">
            <td class="user_id"><?=$idTK?></td>
            <td><?=$tenTK?></td>
            <td><?=$dienthoai?></td>
            <td><?=number_format($tongtien,0,"",".");?>đ</td>
            <td>
                <a href="?page=detail_thongke&idTK=<?=$idTK?>&start=<?=$start?>&end=<?=$end?>" class="action-button">
                    <i class="fa-solid fa-circle-info"></i>
                    <div class="action-tooltip">Chi tiết</div>
                </a>
            </td>
        </tr>
    <?php
        }
    }
    else echo 
        '<tr>
            <td colspan="6" class="nofound">Không tìm thấy dữ liệu</td>
        </tr>'
    ?>
</table>
<?php
    include 'inc/footer.php';
?>