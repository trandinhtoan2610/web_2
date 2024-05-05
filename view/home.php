<?php
    include_once 'inc/header_home.php';
    extract($result);
?>
<main>
<div class="container">
<!--phan loai theo hang san pham-->
    <div class="brand-list">
        <?php
            foreach($category as $item){
                extract($item);
                echo
                '<a href="?page=category&tenHSX='.$tenHSX.'&idHSX='.$idHSX.'"'; 
                if(isset($_GET['tenHSX'])&&($_GET['tenHSX']===$tenHSX))
                    echo 'class=active';
                echo'
                >
                <img src="uploads/uploads_category/'.$logo.'" alt="'.$tenHSX.'">
                </a>';
            }
        ?>
    </div>
    <!--List cac san pham-->
    <section class="product-one"> <!--section product list-->
        <h2>Các sản phẩm nổi bật</h2> <!--sap xep theo -->
        <?php 
            //chia mang result thanh tung trang
            //moi dong 5 sp, moi trang 10 sp
            $num_per_page = 8; //total records each page
            $num_per_row = 4;
            $rows = $num_per_page/$num_per_row; //so dong moi trang
            $curr_page = getPage();
            $start = ($curr_page-1)*$num_per_page; //start divide for this page
            $total_records = count($result);
            $keys = array_keys($result); //access vao nth element cua associative array
            for($i=0; $i<$rows; $i++){
            ?>
                <!--Start a new row-->
                <div class="product-row">
            <?php
                $end_col = $start+$i+$num_per_row;
                for($j=$start+$i; $j<$end_col && $j<$total_records; $j++){
                    // Start: Display
                    extract($result[$keys[$j]]);
                ?>
                    <div class="product-one-content-item1"> 
                    <a href="?page=productDetail&idSP=<?=$idSP?>"><img src="uploads/uploads_product/<?=$hinhanh?>"></a>
                    <ul class="product-one-content-text">
                        <li class="product-name"><?=$tenSP?></li>
                        <li style="color: #E83A45; font-size: 19px"><strong><?=number_format($giaban,0,"",".");?> <sup><u>đ</u></sup></strong></li>
                        <li>Lượt bán: <?=$luotban?> </li>
                        <li class="product-one-configuration"> RAM: <?=$ram?> </li>
                        <li class="product-one-configuration"> CPU: <?=$cpu?> </li>
                        <li class="product-one-configuration"> Card: <?=$card?> </li>
                        <li class="product-one-configuration"> Pin: <?=$pin?> </li>
                    </ul>
                    </div>
                <?php
                    // End: Display
                    $start=$j;
                }
                ?>
                <!--End row-->
                </div>
            <?php
            }
        ?>
    </section>
					
    <!--phan trang-->
    <div class="pagination">
    <?php           
        $total_pages = ceil($total_records/$num_per_page);

        //kiem tra neu currentpage la trang dau tien thi giu nguyen
        if($curr_page>1)
            echo '<a href="index.php?'.$pageTitle.'&index='.($curr_page-1).'">&lt;</a>';
        else echo '<a href="index.php?'.$pageTitle.'&index=1">&lt;</a>';

        for($i=1; $i<=$total_pages; $i++){
            if($curr_page==$i)
                echo '<a href="index.php?'.$pageTitle.'&index='.$i.'" class="active">'.$i.'</a>';
            else echo '<a href="index.php?'.$pageTitle.'&index='.$i.'">'.$i.'</a>';
        }
        
        if($curr_page<$total_pages)
            echo '<a href="index.php?'.$pageTitle.'&index='.($curr_page+1).'">&gt;</a>';
        else echo '<a href="index.php?'.$pageTitle.'&index='.$total_pages.'">&gt;</a>';
    ?>
    </div>
</div>
</main>
<?php
    include_once 'inc/footer.php';
?>