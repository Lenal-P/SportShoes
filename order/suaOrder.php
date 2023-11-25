<?php
include('../conection.php');
session_start();
$ID_ThanhVien = isset($_SESSION['ID_ThanhVien']) ? $_SESSION['ID_ThanhVien'] : '';
?>

<?php
if (isset($_GET['id'])) {
  $ID_Order = $_GET['id'];
} else {
  echo "Empty query!";
  exit;
}
if (!isset($ID_Order)) {
  echo "Empty isbn! check again!";
  exit;
}
if (isset($_POST['sua'])) {
  $DiaChi = $_POST['DiaChi'];
  $GhiChu = $_POST['GhiChu'];
  $SoDienThoai = $_POST['SoDienThoai'];
  if ($DiaChi == "") {
    echo "vui long nhap DiaChi!<br />";
  }
  if ($SoDienThoai == "") {
    echo "vui long nhap SoDienThoai<br />";
  }
  if ($DiaChi != "" && $SoDienThoai != "") {
    $sql_fix = "UPDATE  hoadon  SET DiaChi = '" . $DiaChi . "', GhiChu = '" . $GhiChu . "', SoDienThoai = '" . $SoDienThoai . "' WHERE ID_HoaDon= '$_GET[id]'";
    mysqli_query($mysqli, $sql_fix);
    header("location:phuongthucthanhtoan.php?id={$ID_ThanhVien}");
  }
}
?>

<?php

$sql_getOrder = "SELECT * FROM hoadon where ID_HoaDon='$ID_Order' LIMIT 1";
$query_getOrder = mysqli_query($mysqli, $sql_getOrder);
$row = mysqli_fetch_array($query_getOrder);
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
  <link rel="stylesheet" href="../menu.css">
  <link rel="stylesheet" href="../footer.css">
  <link rel="stylesheet" href="../themify-icons/themify-icons.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">

</head>

<body>
  <?php @include("../menu.php"); ?>

  <div class="container">
    <div class="get-order" style="float: left; ">
      <h2>Sửa Thông tin người dùng</h2>
      <div class="alert alert-success" role="alert">
        <form method="POST" action="">
          <tr>
            <label>Tên Khách hàng:&nbsp;
              <?php echo $row_getCus['HoVaTen'] ?> &nbsp; &nbsp;
            </label>
            </br>
            <label>Mã hóa đơn:&nbsp;
              <?php echo $row['ID_HoaDon'] ?> &nbsp; &nbsp;
            </label>

            <label>Thời gian tạo:&nbsp; &nbsp;
              <?php echo $row['ThoiGianLap'] ?> &nbsp; &nbsp;
            </label>
            </br>
            <label>Tổng Tiền: &nbsp; &nbsp;
              <?php echo $row['GiaTien'] ?> đ
            </label>
            </br>
            <td>Dia Chi</td>
            <td><input class="form-control" type="text" name="DiaChi" value="<?php echo $row['DiaChi']; ?>"></td>
            <td>
              <p>SDT</p>
            </td>
            <td> <input class="form-control" type="text" name="SoDienThoai" value="<?php echo $row['SoDienThoai']; ?>">
            </td>
            <td>
              <p>Ghi CHu</p>
            </td>
            <td> <input class="form-control" type="text" name="GhiChu" value="<?php echo $row['GhiChu']; ?>"></td>
            <td></br></td>
            <td><input type="submit" name="sua" value="FIX"></td>
          </tr>
        </form>
      </div>
    </div>
  </div>
  <?php @include("../menu.php"); ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>