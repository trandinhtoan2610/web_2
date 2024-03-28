<?php 
	include_once '../inc/headerInfo.php';
?>
    <section>
    <div class="list">
        <div class="product">
            <input type="checkbox" class="check">
            <img src="../img/lap1.png" alt="Laptop MSI Modern 14">
            <div class="info">
                <p class="name">Laptop MSI Modern 14</p>
                <div class="quantity">
                    <div class="minus">-</div>
                    <input type="text" value="0">
                    <div class="plus">+</div>
                </div>
                <p>18.990.000đ<p>
            </div>
        </div>
    </div>
    <div class="list">
        <div class="product">
            <input type="checkbox" class="check">
            <img src="../img/lap2.png" alt="Laptop MSI Modern 14">
            <div class="info">
                <p class="name">Laptop MSI Modern 14</p>
                <div class="quantity">
                    <div class="minus">-</div>
                    <input type="text" value="0">
                    <div class="plus">+</div>
                </div>
                <p>18.990.000đ<p>
            </div>
        </div>
    </div>
    <div class="list">
        <div class="product">
            <input type="checkbox" class="check">
            <img src="../img/lap3.png" alt="Laptop MSI Modern 14">
            <div class="info">
                <p class="name">Laptop MSI Modern 14</p>
                <div class="quantity">
                    <div class="minus">-</div>
                    <input type="text" value="0">
                    <div class="plus">+</div>
                </div>
                <p>18.990.000đ<p>
            </div>
        </div>
    </div>
    <div class="list">
        <div class="product">
            <input type="checkbox" class="check">
            <img src="../img/lap4.png" alt="Laptop MSI Modern 14">
            <div class="info">
                <p class="name">Laptop MSI Modern 14</p>
                <div class="quantity">
                    <div class="minus">-</div>
                    <input type="text" value="0">
                    <div class="plus">+</div>
                </div>
                <p>18.990.000đ<p>
            </div>
        </div>
    </div>
    <div class="list">
        <div class="product">
            <input type="checkbox" class="check">
            <img src="../img/lap5.png" alt="Laptop MSI Modern 14">
            <div class="info">
                <p class="name">Laptop MSI Modern 14</p>
                <div class="quantity">
                    <div class="minus">-</div>
                    <input type="text" value="0">
                    <div class="plus">+</div>
                </div>
                <p>18.990.000đ<p>
            </div>
        </div>
    </div>
    <div class="confirm">
        <div class="address">
            <div class="title"><i class='bx bxs-map'></i>Địa Chỉ Nhận Hàng</div>
            <div class="firstEle">
                <p>Thảo Vy | SĐT: (+84)778 052 785</p>
                <p>Địa chỉ: 78 Trần Hưng Đạo, Tp Hồ Chí Minh</p>
                <a href="address.php">Thay đổi</a>
            </div>
        </div>
        <div class="pay">
            <p>Tổng thanh toán: 18.990.000đ</p>
            <a href="orderSuccess.php"><button>MUA HÀNG</button></a>
        </div>
    </div>
</div>
    </section>
<!--footer-->
<?php 
	include_once '../inc/footerInfo.php';
?>

<script>
var plus = document.getElementsByClassName('plus'),
    minus = document.getElementsByClassName('minus'),
    num = document.getElementsByClassName('num');

    for(var i=0; i<plus.length; i++){
    var buttonPlus = plus[i];
    var buttonMinus = minus[i];
    buttonPlus.addEventListener('click', function(event){
        var buttonClicked = event.target;
        var input = buttonClicked.parentElement.children[1];
        input.value=parseInt(input.value)+1;
    })

    buttonMinus.addEventListener('click', function(event){
        var buttonClicked = event.target;
        var input = buttonClicked.parentElement.children[1];
        if(input.value>0)
            input.value=parseInt(input.value)-1;
    })
}

</script>
</body>
</html>