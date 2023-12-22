<?php
include("conection.php");
$sql_product = "SELECT * FROM sanpham ORDER BY ID_SanPham LIMIT 8";
$query_product = mysqli_query($mysqli, $sql_product);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset=utf-8>
  <title>Trang chủ</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap/js/bootstrap.bundle.js">
  <link rel="stylesheet" href="bootstrap/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="./home.css">
  <link rel="stylesheet" href="./footer-home.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">
</head>

<body>
  
  <?php @include("./menu-home.php"); ?>
  <div class="position-fixed" style="align-items:center;top:200px; left:10px;z-index: 10000;">
    <a href="./sanpham/index.php">
      <img style="width:150px;" src="./image/quangcaoo/thanh1.jpg" width="50%">
    </a>
  </div>
  <div class="position-fixed" style="align-items:center;top:160px; right: 10px;z-index: 10000;">
    <a href="./sanpham/index.php">
      <img style="width:150px;" src="./image/quangcaoo/thanh2.jpg" width="30%">
    </br>
      <img style="width:150px;" src="./image/quangcaoo/thanh3.jpg" width="30%">
    </a>
  </div>

  <div class="container">
    <div id="slides" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
        <li data-target="#slides" data-slide-to="3"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img style="text-align: center ;width: 100%; height: auto; " src="./image/quangcaoo/bia1.jpg" alt="">
        </div>
        <div class="carousel-item">
          <img style="text-align: center ;width: 100%; height: auto; " src="./image/quangcaoo/bia2.jpg" alt="">
        </div>
        <div class="carousel-item">
          <img style="text-align: center ;width: 100%; height: auto; " src="./image/quangcaoo/bia3.jpg" alt="">
        </div>
        <div class="carousel-item">
          <img style="text-align: center ;width: 100%; height: auto; " src="./image/quangcaoo/bia4.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
  </div>


  <!-- midle -->
  <div class="text-center">
    <img style="width: 638px; height: auto" src="image/hotdealtrongthang.png">
  </div>

  <div style="width:100%">

    <?php
    while ($row_product = mysqli_fetch_array($query_product)) {
      ?>
      <?php if (isset($_SESSION['TenDangNhap'])) {
        ?>
        <div class="container">
          <form action="sanpham/infoProduct.php?id_product=<?php echo $row_product['ID_SanPham']; ?>" method="POST" >
            <div style="margin: 20px;">
              <div class="card" style=" float: left; text-align: center;">
                <img src="image/product/<?php echo $row_product['Img']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h2>
                    <?php echo $row_product['TenSanPham']; ?>
                  </h2>
                  <h6>Giá:
                    <?php echo number_format($row_product['GiaBan'], 0, ',', '.') ?> VND
                  </h6>
                  <input type="submit" class="btn btn-info" name='submit' value="Mua">
                </div>
              </div>
            </div>

          </form>
        </div>
      </div>
      <?php

      } else {
        ?>
      <div class="container">
        <form action="sanpham/infoProduct.php?id_product=<?php echo $row_product['ID_SanPham']; ?>" method="POST">
          <div class="card" style=" float: left; text-align: center  ">
            <img src="image/product/<?php echo $row_product['Img']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h2>
                <?php echo $row_product['TenSanPham']; ?>
              </h2>
              <h6>Giá:
                <?php echo number_format($row_product['GiaBan'], 0, ',', '.') ?> VND
              </h6>
              <input type="submit" class="btn btn-info" name='submit' value="Xem Thông Tin">
            </div>
          </div>
        </form>
      </div>
      <?php
      }
    }
    ?>
  </div>
  <?php @include("./footer-home.php"); ?>
</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>