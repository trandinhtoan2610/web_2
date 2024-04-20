<?php
    include 'inc/header.php';
?>
<h1>Tìm kiếm</h1>
<!-- user's information list-->
<div class="search_result">
    <p><i class="fa-solid fa-magnifying-glass"></i> Kết quả tìm kiếm:</p>
    <span><?=$kyw?></span>
</div>
<table>
    <!--khong tim thay du lieu -->
    <tr>
        <td colspan="7" style="font-size: 20px; background: lightgrey; padding: 5px">Không tìm thấy dữ liệu <i class="fa-regular fa-face-frown"></i></td>
    </tr>
</table>
</section>
<?php
    include 'inc/footer.php';
?>