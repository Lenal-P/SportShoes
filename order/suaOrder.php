<?php
include('../conection.php');
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$ID_ThanhVien = isset($_SESSION['ID_ThanhVien']) ? $_SESSION['ID_ThanhVien'] : '';
?>


<?php
if (isset($_POST['back'])) {
  unset($_SESSION['cart']);
  header('location:./phuongthucthanhtoan.php');
}
if (isset($_GET['id'])) {
  $ID_Order = $_GET['id'];
} else {
  echo "Empty query!";
  exit;
}

if (isset($_POST['sua'])) {
  $DiaChi = $_POST['DiaChi'];
  $GhiChu = $_POST['GhiChu'];
  $SoDienThoai = $_POST['SoDienThoai'];
  
  if ($DiaChi == "" || $SoDienThoai == "") {
    echo "Vui lòng nhập đầy đủ Địa chỉ và Số điện thoại!";
  } else {
    $sql_fix = "UPDATE  hoadon  SET DiaChi = '" . $DiaChi . "', GhiChu = '" . $GhiChu . "', SoDienThoai = '" . $SoDienThoai . "' WHERE ID_HoaDon= '$ID_Order'";
    mysqli_query($mysqli, $sql_fix);
    header("location: phuongthucthanhtoan.php?id={$ID_Order}");
  }
}
?>
<?php
  $sql_getOrder = "SELECT * FROM hoadon where ID_HoaDon ='$ID_Order' ORDER BY ID_HoaDon LIMIT 1";
  $query_getOrder = mysqli_query($mysqli, $sql_getOrder);
  $row = mysqli_fetch_array($query_getOrder);
  $sql_getCus = "SELECT * FROM thanhvien where ID_ThanhVien ='$ID_ThanhVien' ORDER BY ID_ThanhVien DESC";
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
  <div class="container" style="margin-top:30px;display:flex;align-item:center;justify-content:center">
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
                      <?php echo number_format($_SESSION['$allMoney'], 0, ',', '.') ?> đ
                  </label>
                  </br>
                  <td>Địa chỉ</td>
                  <td><input class="form-control" type="text" name="DiaChi" value="<?php echo $row['DiaChi']; ?>"></td>
                  <td>
                      <p>Số điện thoại</p>
                  </td>
                  <td> <input class="form-control" type="text" name="SoDienThoai" value="<?php echo $row['SoDienThoai']; ?>">
                  </td>
                  <td>
                      <p>Ghi Chú</p>
                  </td>
                  <td> <input class="form-control" type="text" name="GhiChu" value="<?php echo $row['GhiChu']; ?>"></td>
                  <td></br></td>
                  <td>
                      <a href="./phuongthucthanhtoan.php">
                          <input type="submit" name="sua" value="FIX" style="border:none;padding:10px;border-radius:5px;color:white;background-color:green;font-weight: bold;">
                  </td>
              </tr>
          </form>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>

<style>
  @media screen and (max-width: 1024px) { 
    .container {
      margin-top: 100px !important;
    }
  }
</style>