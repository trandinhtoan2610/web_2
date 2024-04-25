<?php
    include 'inc/header.php';
?>
<h1>Thống Kê</h1>
<!--product list-->
<form class="filter" method="post" action="?page=search_thongke" onsubmit="return filterValidateThongKe(this)">
    <div class="date">
        <label for="start">Từ ngày: </label>
            <input type="date" name="start">
        <label for="start">đến </label>
            <input type="date" name="end">
    </div>
    <button type="submit" name="search-thongke-btn" class="show">Thống kê</button>
</form>
<?php
    include 'inc/footer.php';
?>