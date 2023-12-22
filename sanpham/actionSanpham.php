<?php
include("../conection.php");
if (isset($_GET['id'])) {
  $sql_category_product = "SELECT * FROM sanpham where ID_DanhMuc='$_GET[id]' ORDER BY ID_SanPham DESC";
  $query_category_product = mysqli_query($mysqli, $sql_category_product);
}
if (isset($_POST['tukhoa'])) {
  $tukhoa = $_POST['tukhoa'];
  $sql_search = "SELECT * FROM sanpham where sanpham.TenSanPham LIKE 
  '%" . $tukhoa . "%'";
  $query_search = mysqli_query($mysqli, $sql_search);
}
?>

<?php
$sql_getList = "SELECT * FROM danhmuc ORDER BY ID_DanhMuc DESC";
$query_getList = mysqli_query($mysqli, $sql_getList);
?>
<?php
session_start();
?>


<!DOCTYPE html>
<html style="scroll-behavior: smooth">

<head>
  <meta charset=utf-8>
  <title>Sản phẩm</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/js/bootstrap.bundle.js">
  <link rel="stylesheet" href="../bootstrap/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="./actionSanPham.css">
  <link rel="stylesheet" href="../home.css">
  <link rel="stylesheet" href="../footer.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">

</head>
<body>
  <div class="sticky-top">
    <?php @include("../menu.php"); ?>

    <div class="position-fixed" style="align-items:center;top:225px; left:15px;">
      <ul class="nav flex-column">
        <h4 style="color:white">Liệt kê theo</h4>
        </br>
        <?php
        while ($row_getList = mysqli_fetch_array($query_getList)) {
          ?>
          <a class="btn btn-primary" href="actionSanpham.php?danhmucsanpham&id=<?php echo $row_getList['ID_DanhMuc'] ?>"><?php echo $row_getList['TenDanhMuc'] ?></a>
          </br>
          </br>
          <?php
        }
        ?>
      </ul>
    </div>

    <div class="container" style="height:1000px;">
      <div class="container-fluid">
        <div class="row d-inline-flex">
          </br>
          <div id="allproduct">
            <div style="text-align:center;margin-top:20px">
              <h1>Tất cả sản phẩm</h1>
            </div>
            <?php
            if (isset($_GET['id'])) {
              ?>

              <?php
              while ($row_category_product = mysqli_fetch_array($query_category_product)) {
                ?>

                <form class="card" style="float:left"
                  action="infoProduct.php?id_product=<?php echo $row_category_product['ID_SanPham']; ?>" method="POST">
                  <div class="d-flex flex-column text-center border">
                    <img src="../image/product/<?php echo $row_category_product['Img']; ?>" />
                    <h2>
                      <?php echo $row_category_product['TenSanPham']; ?>
                    </h2>
                    <h6>Giá: <?php echo number_format($row_category_product['GiaBan'], 0, ',', '.') ?> VND</h6>
                    <?php if (isset($_SESSION['TenDangNhap'])) {
                      ?>
                      <input type="submit" class="btn btn-info" name='submit' value="Mua">
                    <?php } else { ?>
                      <input type="submit" class="btn btn-info" name='submit' value="Xem Thông Tin">
                      <?php
                    }
                    ?>
                  </div>
                </form>
                <?php
              }
            }
            ?>
            <?php
            if (isset($_POST['tukhoa'])) {
              ?>
              <?php
              while ($row_search = mysqli_fetch_array($query_search)) {
                ?>
                <form class="card" style="float:left"
                  action="infoProduct.php?id_product=<?php echo $row_search['ID_SanPham']; ?>" method="POST">
                  <div class="d-flex flex-column text-center border">
                    <img src="../image/product/<?php echo $row_search['Img']; ?>" />
                    <h2>
                      <?php echo $row_search['TenSanPham']; ?>
                    </h2>
                    <h6>Giá:
                      <?php echo number_format($row_search['GiaBan'], 0, ',', '.') ?> VND
                    </h6>
                    <?php if (isset($_SESSION['TenDangNhap'])) {
                      ?>
                      <input type="submit" class="btn btn-info" name='submit' value="Mua">
                    <?php } else { ?>
                      <input type="submit" class="btn btn-info" name='submit' value="Xem Thông Tin">
                      <?php
                    }
                    ?>
                  </div>
                </form>
                <?php
              }
            }
            ?>
            </br>
            </br>
          </div>
        </div>
      </div>
    </div>
  <?php @include("../footer.php"); ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>