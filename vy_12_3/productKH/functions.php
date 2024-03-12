<?php
    // ***FUNCTION: PRODUCT***
    function getAllProduct(){
        $sql='select * from Product order by luotban';
        return getAll($sql);
    }
    
    function displayProduct($item){
            extract($item);
            $giaban = number_format($gia,0,"",".");
            echo
            '<div class="product-one-content-item1"> 
            <a href="#"><img src="../../img/lap5.png"></a>
            <ul class="product-one-content-text">
                <li class="sale">HSSV GIẢM 500K</li>
                <li class="product-name">'.$ten.'</li>
                <li class="product-one-content1-item1"> RAM '.$ram.' </li>';
                if($ssd!=="") echo '<li class="product-one-content1-item1"> SSD '.$ssd.' </li>';
                echo'
                <li style="font-size: 15px"><del>16.490.000 <sup><u>đ</u></sup></del> -9% </li>
                <li style="color: #E83A45; font-size: 19px"><strong>'.$giaban.' <sup><u>đ</u></sup></strong></li>
                <li class="product-one-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i> 
                </li>
                <li class="product-one-configuration"> Màn hình: '.$manhinh.' </li>
                <li class="product-one-configuration"> CPU: '.$cpu.' </li>
                <li class="product-one-configuration"> Card: '.$card.' </li>
                <li class="product-one-configuration"> Pin: '.$pin.' </li>
                <li class="product-one-configuration"> Khối lượng: '.$khoiluong.' </li>
            </ul>
            </div>';
    }

    function searchProduct($ten){
        $sql='SELECT * FROM Product WHERE ten LIKE "%'.$ten.'%"';
        return getAll($sql);
    }

    // ***FUNCTION: PRODUCT***
    function getAllCategory(){
        $sql='select * from hangsanxuat';
        return getAll($sql);
    }

    function displayCategory($result){
        foreach($result as $item){
            extract($item);
            echo
            '<a href="index.php?page=category&hangsanxuat='.$ten.'"'; 
            if(isset($_GET['hangsanxuat'])&&($_GET['hangsanxuat']===$ten))
                echo 'class=active';
            echo'
            >
            <img src="category_img/'.$logo.'" alt="'.$ten.'">
            </a>';
        }
    }

    function getCategoryID($ten){
        $sql = 'select id from hangsanxuat where ten="'.$ten.'"';
        $result= getOne($sql);
        //var_dump($result['id']);
        return $result['id'];
    }

    function getProductByCategory($id){
        $sql='select * from Product where id_hangsanxuat="'.$id.'" order by luotban';
        return getAll($sql);
    }
?>