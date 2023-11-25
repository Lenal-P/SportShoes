<?php
include("../conection.php");
session_start();
$sql_ThanhVien = "SELECT * FROM thanhvien ORDER BY ID_ThanhVien DESC";
$query_ThanhVien = mysqli_query($mysqli, $sql_ThanhVien);
$row = mysqli_fetch_array($query_ThanhVien);
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
  <link rel="stylesheet" href="./cart.css">
  <link rel="stylesheet" href="../home.css">
  <link rel="stylesheet" href="../menu.css">
  <link rel="stylesheet" href="../footer.css">
  <link rel="stylesheet" href="../themify-icons/themify-icons.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">

</head>

<body>
  <?php @include("../menu.php"); ?>
  <div class="container">
    <h2>Giỏ hàng</h2>
    </br>
    <div class="tableInfo">
      <?php
      if (isset($_SESSION['ID_ThanhVien'])) {

        ?>
        <form method="POST" action="../order/saveorder.php?id=<?php echo $_SESSION['ID_ThanhVien'] ?>">
          <table class="table" style="vertical-align: middle;">
            <thead>
              <tr style="vertical-align: middle;">
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Tùy chọn</th>
              </tr>
            </thead>
            <?php
            if (isset($_SESSION['cart'])) {
              $i = 0;
              $allMoney = 0;
              $allAmount = 0;

              ?>
              <tbody style="border-bottom: 2px solid #dee2e6;">
                <?php foreach ($_SESSION['cart'] as $key => $value) {
                  $i++;
                  ?>
                  <td>
                    <?= $i ?>
                  </td>
                  <td>
                    <?= $key ?>
                  </td>
                  <td>
                    <?= $value['TenSanPham'] ?>
                  </td>
                  <td><img src="../image/product/<?= $value['Img'] ?>"></td>
                  <td>
                    <?= $value['qty'] ?>
                  </td>
                  <td>
                    <?= $value['GiaBan'] ?> VND
                  </td>
                  <td><a href="actionCart.php?id_product=<?= $key ?>">Xóa</a></td>
                </tbody>
                <?php
                }
            } else {
              ?>
              <h4>Không có gì trong giỏ hàng</h4>
              <?php
            }
            ?>

          </table>
          <?php if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $value) {
              $Money = $value['qty'] * $value['GiaBan'];
              $amount = $value['qty'];
              $allMoney += $Money;
              $allAmount += $amount;
            }

            ?>
            <h4 style="float: right;color:red;">
              <?= $allMoney ?> VND
            </h4>
            <h5 style="float: right; width: 3%;"> Tổng tiền
              <?= $allAmount ?> sản phẩm:
            </h5>
            </br>

            <?php
            $_SESSION['$allMoney'] = $allMoney;
            $_SESSION['$allAmount'] = $allAmount;
          }
          ?>
          </br>
          </br>
      </div>
      <input type="submit" class="btn btn-info" name='submit' value="Thanh toán" style="float:right; width: 20%">
      </form>
      <?php
      } else {
        ?>
      <h4>Vui lòng đăng nhập để mua hàng</h4>
      <?php
      }
      ?>
    </div>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
  </div>
  <?php @include("../footer.php"); ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>