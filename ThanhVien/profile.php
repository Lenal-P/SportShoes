<?php
include("../conection.php");
session_start();
if (isset($_GET['id'])) {
  $ID_ThanhVien = $_GET['id'];
}
$sql_Cus = "SELECT * FROM thanhvien WHERE ID_ThanhVien = $ID_ThanhVien LIMIT 1";
$query_Cus = mysqli_query($mysqli, $sql_Cus);
$row = mysqli_fetch_array($query_Cus);
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
  <link rel="stylesheet" href="../footer.css">
  <link rel="stylesheet" href="./profile.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="../image/png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">   
</head>

<body>
  <?php @include("../menu.php"); ?>

    <div class="container">
      <br>
      <hr>
      <div class="card bg-light">
        <article class="card-body mx-auto" style="margin:0 !important;">
          <h4 class="card-title mt-3 text-center">Thông tin cá nhân</h4>
          <form>
            <div class="form-group input-group info">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
              </div>
              <input name="HoVaTen" class="form-control" value="<?php echo $row['HoVaTen'] ?>"readonly>
            </div> <!-- form-group// -->
            <div class="form-group input-group info">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              </div>
              <input name="Email" class="form-control" value="<?php echo $row['Email'] ?>"readonly>
            </div> <!-- form-group// -->
            <div class="form-group input-group info">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
              </div>
              <input name="" class="form-control" value="<?php echo $row['SoDienThoai'] ?>"readonly>
            </div> <!-- form-group// -->
            <div class="form-group input-group info">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-building"></i> </span>
              </div>
              <input name="" class="form-control" placeholder="Phone number" type="text"
                value="<?php echo $row['DiaChi'] ?>"readonly>
            </div> <!-- form-group end.// -->
            </br>
            <p class="text-center">Bạn muốn Đổi mật khẩu? <a
                href="changePassword.php?id=<?php echo $row['ID_ThanhVien'] ?>">Nhấn vào đây</a> </p>
            <p class="text-center">Bạn muốn sửa thông tin? <a
                href="profilefix.php?id=<?php echo $row['ID_ThanhVien'] ?>">Nhấn vào đây</a> </p>
          </form>
        </article>
      </div>
    </div>
    <?php @include("../footer.php"); ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>

<style>
  @media screen and (max-width: 1024px) { 
    .bg-light {
      margin: 10% 0;
      height: 500px !important;
      width: 500px !important;
      & form {
        height: 450px;
      }
    }
    .navbar-right {
      left: 0;
      right: 0;
    }
  }
</style>