<?php
include("../conection.php");
session_start();
$ID_ThanhVien = isset($_GET['id']) ? $_GET['id'] : '';
$sql_getOrder = "SELECT * FROM hoadon where ID_ThanhVien='$ID_ThanhVien' ORDER BY ID_HoaDon DESC";
$query_getOrder = mysqli_query($mysqli, $sql_getOrder);
$row_getOrder = mysqli_fetch_array($query_getOrder);
$sql_getCus = "SELECT * FROM thanhvien where ID_ThanhVien='$ID_ThanhVien' ORDER BY ID_ThanhVien DESC";
$query_getCus = mysqli_query($mysqli, $sql_getCus);
$row_getCus = mysqli_fetch_array($query_getCus);
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
    <div class="container">
    <div class="get-order" style="float: left; ">
      <h2>Hóa đơn mua hàng của bạn</h2>
      </br>
      </br>
      <div class="alert alert-success" role="alert">
        <div class="form-group">
          <label>Tên Khách hàng:&nbsp;
            <?php echo $row_getCus['HoVaTen'] ?> &nbsp; &nbsp;
          </label>
          </br>
          <label>Mã hóa đơn:&nbsp;
            <?php echo $row_getOrder['ID_HoaDon'] ?> &nbsp; &nbsp;
          </label>

          <label>Thời gian tạo:&nbsp; &nbsp;
            <?php echo $row_getOrder['ThoiGianLap'] ?> &nbsp; &nbsp;
          </label>
          </br>
          <label>Tổng Tiền: &nbsp; &nbsp;
            <?php echo number_format($row_getOrder['GiaTien'], 0, ',', '.') ?>
          </label>
          </br>
          <label>Địa chỉ: &nbsp; &nbsp;
            <?php echo $row_getOrder['DiaChi'] ?>
          </label>
          </br>
          <label>Số điện thoại: &nbsp; &nbsp;
            <?php echo $row_getOrder['SoDienThoai'] ?>
          </label>
          </br>
          <label>Ghi Chú: &nbsp; &nbsp;
            <?php echo $row_getOrder['GhiChu'] ?>
          </label>
          </br>

        </div>
        <a class="btn btn-primary" href="phuongthucthanhtoan.php?id=<?php echo $row_getOrder['ID_HoaDon']; ?>">Thanh
          toán&nbsp;</a>
        &nbsp;
        &nbsp;
        &nbsp;
        <a class="btn btn-primary" href="suaOrder.php?id=<?php echo $row_getOrder['ID_HoaDon']; ?>">&nbsp;Sửa lại thông
          tin giao hàng</a>
      </div>

    </div>
    <div class="get-order" style="width:550px;float: right; ">
      <h2>Chi tiết hóa đơn</h2>
      </br>
      <div class="tableInfo">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Giá tiền</th>
            </tr>
          </thead>
          <?php
          if (isset($_SESSION['cart'])) {
            $i = 0;
            $allMoney = 0;
            $allAmount = 0;

            ?>
            <tbody>
              <?php foreach ($_SESSION['cart'] as $key => $value) {
                $i++;
                ?>
                <td>
                  <?= $i?>
                </td>
                <td>
                  <?= $value['TenSanPham'] ?>
                </td>
                <td>
                  <?= $value['qty'] ?>
                </td>
                <td>
                  <?php echo number_format($value['GiaBan'], 0, ',', '.') ?> Đồng
                </td>
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
          <h5 style="float: right;">Tổng tiền :
            <?php echo number_format($allMoney, 0, ',', '.') ?> Đồng
          </h5>
          <h5 style="float: right; width: 12.5%;">
            <?= $allAmount ?>
          </h5>
          </br>

          <?php
          $_SESSION['$allMoney'] = $allMoney;
          $_SESSION['$allAmount'] = $allAmount;
        }
        ?>
      </div>
    </div>
  </div>
  <?php @include("../footer.php"); ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>