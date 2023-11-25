<?php
include("../conection.php");
$sql_product = "SELECT * FROM sanpham ORDER BY ID_SanPham LIMIT 8";
$query_product = mysqli_query($mysqli,$sql_product);

?>
<?php
$sql_vege = "SELECT * FROM sanpham where ID_DanhMuc='1' LIMIT 4";
$query_vege = mysqli_query($mysqli,$sql_vege);
?>
<?php
$sql_fru = "SELECT * FROM sanpham where ID_DanhMuc='2' LIMIT 4";
$query_fru = mysqli_query($mysqli,$sql_fru);
?>
<?php
$sql_meat = "SELECT * FROM sanpham where ID_DanhMuc='3' LIMIT 4";
$query_meat = mysqli_query($mysqli,$sql_meat);
?>

<?php
$sql_getList = "SELECT * FROM danhmuc ORDER BY ID_DanhMuc DESC";
$query_getList= mysqli_query($mysqli, $sql_getList);
?>
<?php
  session_start();
?>


<!DOCTYPE html >
<html style="scroll-behavior: smooth">
<head>
  <meta charset=utf-8>
  <title>Sản phẩm</title>
  <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet"  href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet"  href="../bootstrap/js/bootstrap.bundle.js">
  <link rel="stylesheet"  href="../bootstrap/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="../home.css">
  <link rel="stylesheet" href="../menu.css">
  <link rel="stylesheet" href="../footer.css">
  <link rel="stylesheet"  href="../themify-icons/themify-icons.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">

</head>
<body>
  <?php @include("../menu.php"); ?>
    <div class="position-fixed" style="align-items:center;top:225px; left:15px;color:white;">
      <ul class="nav flex-column">
        <h4>Liệt kê theo</h4>
        </br>
        <?php
          while ($row_getList= mysqli_fetch_array($query_getList)) {
            ?>
            <a class="btn btn-primary" href="actionSanpham.php?danhmucsanpham&id=<?php echo $row_getList['ID_DanhMuc']?>"><?php echo $row_getList['TenDanhMuc']?></a>
          </br>
          </br>
        <?php
        }
        ?>
      </ul>
</div>
    <div class="container">
      <div class= "container-fluid">
        <div class= "row d-inline-flex">
        </br>
        <div id="allproduct">
          <div style="text-align: center;">
            <h1 style="text-transform:uppercase;margin:40px">Tất cả sản phẩm</h1>
          </div>
          <?php
          while($row_product = mysqli_fetch_array($query_product)){
          ?>
          
          <form class="card" style="float:left" action="infoProduct.php?id_product=<?php echo $row_product['ID_SanPham'];?>" method="POST">
            <div class="d-flex flex-column text-center border">
              <img src="../image/product/<?php echo $row_product['Img']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h2><?php echo $row_product['TenSanPham'];?></h2>
                <h6>Giá: <?php echo $row_product['GiaBan'];?> VND</h6>
                <?php if(isset($_SESSION['TenDangNhap'])) { ?>
                <input type="submit" class="btn btn-info" name='submit' value="Mua">  
                <?php }else{ ?>
                <input type="submit" class="btn btn-info" name='submit' value="Xem Thông Tin">
                <?php 
                } 
                ?>
              </div>
            </div>
          </form>
          <?php
        }
        ?>
      </div>
    </br>
  </br>
    <div id="vege">
        <?php
        while($row_vege = mysqli_fetch_array($query_vege)){
        ?>
        <form class="card" style="float:left" action="infoProduct.php?id_product=<?php echo $row_vege['ID_SanPham'];?>" method="POST">
          <div class="d-flex flex-column text-center border">
            <img src="../image/product/<?php echo $row_product['Img']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h2><?php echo $row_product['TenSanPham'];?></h2>
              <h6>Giá: <?php echo $row_product['GiaBan'];?> VND</h6>
              <?php if(isset($_SESSION['TenDangNhap'])) { ?>
              <input type="submit" class="btn btn-info" name='submit' value="Mua">  
              <?php }else{ ?>
              <input type="submit" class="btn btn-info" name='submit' value="Xem Thông Tin">
              <?php 
              } 
              ?>
            </div>
          </div>
        </form>
        <?php
          }
        ?>
      </div>

    <div id="fru">
      <?php
        while($row_fru = mysqli_fetch_array($query_fru)){
      ?>
      <form class="card" style="float:left" action="infoProduct.php?id_product=<?php echo $row_fru['ID_SanPham'];?>" method="POST">
        <div class="d-flex flex-column text-center border">
          <img src="../image/product/<?php echo $row_product['Img']; ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h2><?php echo $row_product['TenSanPham'];?></h2>
            <h6>Giá: <?php echo $row_product['GiaBan'];?> VND</h6>
            <?php if(isset($_SESSION['TenDangNhap'])) { ?>
            <input type="submit" class="btn btn-info" name='submit' value="Mua">  
            <?php }else{ ?>
            <input type="submit" class="btn btn-info" name='submit' value="Xem Thông Tin">
            <?php 
            } 
            ?>
          </div>
        </div>
    </form>
      <?php
      }
      ?>
    </div>

    <div id="meat">
      <?php
        while($row_meat = mysqli_fetch_array($query_meat)){
      ?>
      <form class="card" style="float:left" action="infoProduct.php?id=<?php echo $row_meat['ID_SanPham'];?>" method="POST">
        <div class="d-flex flex-column text-center border">
          <img src="../image/product/<?php echo $row_product['Img']; ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h2><?php echo $row_product['TenSanPham'];?></h2>
            <h6>Giá: <?php echo $row_product['GiaBan'];?> VND</h6>
            <?php if(isset($_SESSION['TenDangNhap'])) { ?>
            <input type="submit" class="btn btn-info" name='submit' value="Mua">  
            <?php }else{ ?>
            <input type="submit" class="btn btn-info" name='submit' value="Xem Thông Tin">
            <?php 
            } 
            ?>
          </div>
        </div>
      </form>
      <?php
      }
      ?>
    </div>
    </div>
  </div>
   
  </div>   
  <?php @include("../footer.php"); ?>     
</body>
</html>