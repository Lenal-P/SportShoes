<?php
include("../conection.php");
session_start();

if (isset($_POST['back'])) {
  unset($_SESSION['cart']);
  header('location:../index.php');
}
$sql_getOrder = "SELECT * FROM hoadon WHERE XuLy != 0 ORDER BY ID_HoaDon LIMIT 1";
$query_getOrder = mysqli_query($mysqli, $sql_getOrder);
$row_getOrder = mysqli_fetch_array($query_getOrder);

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
  <link rel="stylesheet" href="../home.css">
  <link rel="stylesheet" href="../footer.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">

</head>

<body>
  <?php @include("../menu.php"); ?>

  <div class="container" style="margin-top:30px;">
    <form method="POST" action="">
      <?php
      $count1 = 1;
      $count2 = 2;
      if ($row_getOrder['XuLy'] == $count1) {
        ?>
        <h4>Bạn đã đặt hàng thành công!</h4>
        <?php
      } else if ($row_getOrder['XuLy'] == $count2) {
        ?>
          <h4>Bạn đã đặt hàng thất bại!</h4>
        <?php
      } else {
        ?>
          <h4> Hãy chờ người xét duyệt đơn đặt hàng của bạn </h4>
          <h5>Mã Hóa đơn chủ bạn là:
          <?php echo $row_getOrder['ID_HoaDon'] ?>
          </h5>
        <?php
      }
      ?>
      
      <td><input type="submit" name="back" value="Trở về trang chủ ?? Hãy nhấn vào đây" style="padding:10px;border-radius:10px;"></td>
    </form>
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
  </br>
  </br>
  </br>
  </br>
  </br>
    <?php @include("../footer.php"); ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>