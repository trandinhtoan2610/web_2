<?php
    include 'inc/header_home.php';
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
    <section style="font-size: 20px; background: lightgrey; padding: 50px; text-align:center;">
        <h1>Không tìm thấy sản phẩm <i class="fa-regular fa-face-frown"></i></h1>
    </section>
</div>
</main>
<?php
    include 'inc/footer.php';
?>