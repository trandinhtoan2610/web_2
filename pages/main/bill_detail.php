<?php
  include "./admincp/config/config.php";
  $id_bill = $_GET['id_bill'];
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
                    $sql_history = mysqli_query($conn, "SELECT sanpham.tensp, bill_detail.soluongmua, sanpham.giaGoc FROM `bill_detail` JOIN `bill` ON bill_detail.id_bill = bill.id_bill JOIN `sanpham` ON bill_detail.masp = sanpham.masp WHERE bill.username = '$_SESSION[username]' AND bill_detail.id_bill = $id_bill");
                    while ($row = mysqli_fetch_array($sql_history)) {
                        $i++;    
                  ?>
                    <tr>
                      <th scope="row"><?php echo $i ?></th>
                      <td><?php echo $row['tensp'] ?></td>
                      <td class="text-end"><?php echo  $row['soluongmua']?></td>
                      <td class="text-end"><?php echo  number_format($row['giaGoc'],0,',','.').'đ'?></td>
                      <td class="text-end"><?php echo  number_format($row['giaGoc'] * $row['soluongmua'],0,',','.').'đ'?></td>
                    </tr>
                    <?php
                    $tongtien += $row['giaGoc'] * $row['soluongmua'];
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