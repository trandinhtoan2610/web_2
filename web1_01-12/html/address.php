<?php 
    include_once '../inc/headerInfo.php';
?>
    <section>
        <h2>Địa chỉ</h2>
        <div class="address">
            <input type="radio" class="radio-button" name="address-option" id="option1" value="option1" checked>
            <div class="detail">
                <p><strong>Thảo Vy</strong> | (+84) 778 052 785</p>
                <p>122/46 đường Vành đai đại học quốc gia, Phường Đông Hoà, Thành phố Dĩ An, Bình Dương</p>
            </div>
            <p class="default">Mặc định</p>
        </div>
        <div class="address">
            <input type="radio" class="radio-button" name="address-option" id="option1" value="option1">
            <div class="detail">
                <p><strong>Thảo Vy</strong> | (+84) 778 052 785</p>
                <p>121/46 đường Vành đai đại học quốc gia, Phường Đông Hoà, Thành phố Dĩ An, Bình Dương</p>
            </div>
        </div>
        <a href="addressForm.php" class="add"><i class='bx bx-plus-circle'></i>Thêm địa chỉ mới</a>
        <a href="giohangTK.php"><button>XÁC NHẬN</button></a>
    </section>
<?php 
    include_once '../inc/footerInfo.php';
?>