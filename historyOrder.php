<?php
include("conection.php"); 
session_start();
if (isset($_SESSION['ID_ThanhVien'])) {
  $ID_ThanhVien=$_SESSION['ID_ThanhVien'];
  $sql_getOrder="SELECT * FROM hoadon where hoadon.ID_ThanhVien=$ID_ThanhVien and hoadon.XuLy='1' ";
  $query_getOrder=mysqli_query($mysqli,$sql_getOrder);
  $sql_NoOrder="SELECT * FROM hoadon where hoadon.ID_ThanhVien=$ID_ThanhVien and hoadon.XuLy='0' ";
  $query_NoOrder=mysqli_query($mysqli,$sql_NoOrder);
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8>
  <title>Trang chủ</title>
  <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet"  href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet"  href="bootstrap/js/bootstrap.bundle.js">
  <link rel="stylesheet"  href="bootstrap/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="./home.css">
  <link rel="stylesheet" href="./footer-home.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">
</head>
<body> 
  <?php @include("./menu-home.php"); ?>
  
  <div class="container">
    <div class="duyet daDuyet" style="width:500px; float:left;" >
      <h3>Đơn Đã được duyệt</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Mã Đơn Hàng</th>
          <th scope="col">Thời gian đặt</th>
          <th scope="col">Địa Chỉ</th>
          <th scope="col">Ghi chú</th> 
          <th scope="col">Giá tiền</th> 
          <th scope="col">Số điện thoại</th>
        </tr>
      </thead>
        <tbody >

        <?php
        if (isset($_SESSION['ID_ThanhVien'])) {
          $i=0;
        while($row_getOrder = mysqli_fetch_array($query_getOrder)){
          $i++;
        ?>

            <td><?php echo $i ?></td>
            <td><?php echo $row_getOrder['ID_HoaDon']; ?></td>  
            <td><?php echo $row_getOrder['ThoiGianLap']; ?></td> 
            <td><?php echo $row_getOrder['DiaChi']; ?></td>
            <td><?php echo $row_getOrder['GhiChu']; ?></td>  
            <td><?php echo number_format($row_getOrder['GiaTien'], 0, ',', '.') ?></td>
            <td><?php echo $row_getOrder['SoDienThoai']; ?></td>
          
      </tbody>

  <?php
          }
        }else{
          ?>
          <h4>Không có lịch sử đặt hàng</h4>
          <?php
        }
        ?>
    </table>
    </div>
    <div class="duyet chuaDuyet" style="width:500px; float:right">
      <h3>Đơn chưa được duyệt</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Mã Đơn Hàng</th>
          <th scope="col">Thời gian đặt</th>
          <th scope="col">Địa Chỉ</th>
          <th scope="col">Ghi chú</th> 
          <th scope="col">Giá tiền</th> 
          <th scope="col">Số điện thoại</th>
        </tr>
      </thead>
        <tbody >
        <?php
        if (isset($_SESSION['ID_ThanhVien'])) {
          $i=0;
          while($row_NoOrder = mysqli_fetch_array($query_NoOrder)){
            $i++;
          ?>
            <td style="color: red;"><?php echo $i ?></td> 
            <td style="color: red;"><?php echo $row_NoOrder['ID_HoaDon']; ?></td> 
            <td style="color: red;"><?php echo $row_NoOrder['ThoiGianLap']; ?></td> 
            <td style="color: red;"><?php echo $row_NoOrder['DiaChi']; ?></td>
            <td style="color: red;"><?php echo $row_NoOrder['GhiChu']; ?></td>  
            <td style="color: red;"><?php echo number_format($row_NoOrder['GiaTien'], 0, ',', '.') ?></td>
            <td style="color: red;"><?php echo $row_NoOrder['SoDienThoai']; ?></td>
              
          </tbody>
          <?php
          }
        }else{
          ?>
          <h4>Không có lịch sử đặt hàng</h4>
          <?php
        }
        ?>
      </table>
      </div>
  </div>
  <?php @include("./footer-home.php"); ?>
</body>
</html>

<style>
  @media screen and (max-width: 1024px) { 
    .daDuyet {
      position: relative;
      width: 100% !important;
      margin-top: 50px;
      left: 0;
      height: auto;
    }
    .chuaDuyet {
      position: relative;
      width: 100% !important;
      left: 0;
      right: 0;
      height: auto;
    }
    h3 {
      display: flex;
      justify-content: center;
      margin: 5% 0;
    }
  }
</style>