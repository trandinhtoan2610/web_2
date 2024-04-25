<?php
    include_once 'inc/header.php';
?>  
    <h1>Thông Tin Các Đơn Hàng</h1>
    <table class="detail-order">
        <!--noi dung tieu de-->
        <tr class="title">
        <th>Mã đơn hàng</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhật</th>
        <th>Tổng tiền</th>                     
        <th>Thao tác</th>            
    </tr>
    <!--noi dung cac san pham-->
    <?php
        $alltongtien = 0;
        foreach($result as $item){
            extract($item);
            $alltongtien+=$tongtien
    ?>
        <tr class="item">
            <td class="order_id"><?=$idDH?></td>
            <td><?=$ngaytao?></td>
            <td><?=$ngaycapnhat?></td>
            <td><?=number_format($tongtien,0,"",".");?>đ</td>
            <td>
                <a href="?page=detail_order_thongke&idDH=<?=$idDH?>&idTK=<?=$_GET['idTK']?>&start=<?=$_GET['start']?>&end=<?=$_GET['end']?>" class="action-button">
                    <i class="fa-solid fa-circle-info"></i>
                    <div class="action-tooltip">Chi tiết</div>
                </a>
            </td>
  
        </tr>
        <?php
    }
    ?>
    <tr>
        <th colspan="3">Tổng tiền</th>
        <td style="color: red;"><?=number_format($alltongtien,0,"",".");?>đ</td>
    </tr>
    </table>
    <div class="buttons">
        <a href="?page=search_thongke&start=<?=$_GET['start']?>&end=<?=$_GET['end']?>"><i class="fa-solid fa-x"></i>Đóng</a>
    </div>
<?php
    include_once 'inc/footer.php';
?>