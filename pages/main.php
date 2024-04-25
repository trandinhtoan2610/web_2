<main>
	<?php
		if(isset($_GET['quanly'])){
			$tam = $_GET['quanly'];
		}else{
			$tam = '';
		}

		if($tam=='giohang'){
			include('main/giohang.php');
		}
		else if($tam=='history'){
			include('main/history.php');
		}
		else if($tam=='bill_detail'){
			include('main/bill_detail.php');
		}
		else include('main/index.php');
		
	?>
</main>