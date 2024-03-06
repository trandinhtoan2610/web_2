<link rel="stylesheet" href="../css/style_main_admin.css">
<main class='content'>
    <?php
		if(isset($_GET['quanly'])){
			$tam = $_GET['quanly'];
		}else{
			$tam = '';
		}

		if($tam=='thongke'){
			include('main/thongke.php');
		}
		else if($tam=='donhang'){
			include('main/donhang.php');
		}
		else if($tam=='nguoidung'){
			include('main/nguoidung.php');
		}
		else include('main/sanpham.php');
		
	?>
</main>

