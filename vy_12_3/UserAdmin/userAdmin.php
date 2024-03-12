<h1>Người Dùng</h1>
<!--create button-->
<!-- mình dùng lại code của trang sửa thông tin sản phẩm -->
<a href="index.php?page=addUserFrm" class="create-button"><i class="fas fa-plus"></i> Thêm</a>
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
    for($i=$start; $i<$start+$num_per_page && $i<$total_records; $i++)
        displayUser($result[$keys[$i]]);
    ?>
</table>
<div class="pagination">
<?php           
    $total_pages = ceil($total_records/$num_per_page);

    if($curr_page>1)
        echo '<a href="index.php?page=userAdmin&index='.($curr_page-1).'">&lt;</a>';
    else echo '<a href="index.php?page=userAdmin&index=1">&lt;</a>';

    for($i=1; $i<=$total_pages; $i++){
        if($curr_page==$i)
            echo '<a href="index.php?page=userAdmin&index='.$i.'" class="active">'.$i.'</a>';
        else echo '<a href="index.php?page=userAdmin&index='.$i.'">'.$i.'</a>';
    }

    //kiem tra neu currentpage la trang dau tien thi giu nguyen
    if($curr_page<$total_pages)
        echo '<a href="index.php?page=userAdmin&index='.($curr_page+1).'">&gt;</a>';
    else echo '<a href="index.php?page=userAdmin&index='.$total_pages.'">&gt;</a>';
    ?>
</div>

</section>