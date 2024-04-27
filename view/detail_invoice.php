<?php
  include 'inc/header_home.php';
?>


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<section class="py-3 py-md-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
          <div class="row gy-3 mb-3">
            <div class="col-6">
              <h2 class="text-uppercase text-endx m-0">Hóa đơn</h2>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col" class="text-uppercase">#</th>
                      <th scope="col" class="text-uppercase">Sản phẩm</th>
                      <th scope="col" class="text-uppercase text-end">Số lượng</th>
                      <th scope="col" class="text-uppercase text-end">Giá</th>
                      <th scope="col" class="text-uppercase text-end">Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                  <?php
                    $i = 0;
                    $tongtien = 0; 
                    foreach ($result as $item){
                        $i++;    
                  ?>
                    <tr>
                      <th scope="row"><?php echo $i ?></th>
                      <td><?php echo $item['tenSP'] ?></td>
                      <td class="text-end"><?php echo  $item['quantity']?></td>
                      <td class="text-end"><?php echo  number_format($item['giaban'],0,',','.').'đ'?></td>
                      <td class="text-end"><?php echo  number_format($item['giaban'] * $item['quantity'],0,',','.').'đ'?></td>
                    </tr>
                    <?php
                    $tongtien += $item['giaban'] * $item['quantity'];
                      } 
                    ?>
                    <tr>
                      <th scope="row" colspan="4" class="text-uppercase text-end">Total</th>
                      <td class="text-end"><?php echo number_format($tongtien,0,',','.').'đ' ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>