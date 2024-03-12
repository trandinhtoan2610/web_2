<main>
<div class="container">
<!--phan loai theo hang san pham-->
    <div class="brand-list">
        <?php
            displayCategory($category);
        ?>
    </div>
    <!--List cac san pham-->
    <section class="product-one"> <!--section product list-->
        <h2>Các sản phẩm nổi bật</h2> <!--sap xep theo -->
        <?php 
            //chia mang result thanh tung trang
            //moi dong 5 sp, moi trang 10 sp
            $num_per_page = 10; //total records each page
            $num_per_row = 5;
            $rows = $num_per_page/$num_per_row; //so dong moi trang
            $curr_page = getPage();
            $start = ($curr_page-1)*$num_per_page; //start divide for this page
            $total_records = count($result);
            $keys = array_keys($result); //access vao nth element cua associative array
            for($i=0; $i<$rows; $i++){
                //Start a new row
                echo '<div class="product-row">';
                $end_col = $start+$i+$num_per_row;
                for($j=$start+$i; $j<$end_col && $j<$total_records; $j++){
                    displayProduct($result[$keys[$j]]);
                    $start=$j;
                }
                //End row
                echo '</div>';
            }
        ?>
    </section>
					
    <!--phan trang-->
    <div class="pagination">
    <?php           
        $total_pages = ceil($total_records/$num_per_page);

        //kiem tra neu currentpage la trang dau tien thi giu nguyen
        if($curr_page>1)
            echo '<a href="index.php?page=home&index='.($curr_page-1).'">&lt;</a>';
        else echo '<a href="index.php?page=home&index=1">&lt;</a>';

        for($i=1; $i<=$total_pages; $i++){
            if($curr_page==$i)
                echo '<a href="index.php?page=home&index='.$i.'" class="active">'.$i.'</a>';
            else echo '<a href="index.php?page=home&index='.$i.'">'.$i.'</a>';
        }

       
        if($curr_page<$total_pages)
            echo '<a href="index.php?page=home&index='.($curr_page+1).'">&gt;</a>';
        else echo '<a href="index.php?page=home&index='.$total_pages.'">&gt;</a>';
    ?>
    </div>
</div>
</main>