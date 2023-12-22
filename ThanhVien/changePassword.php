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
<?php
if (isset($_GET['id'])) {
  $ID_ThanhVien = $_GET['id'];
} else {
  echo "Empty query!";
  exit;
}
if (!isset($ID_ThanhVien)) {
  echo "Empty isbn! check again!";
  exit;
}


if (isset($_POST['sua']) && $_POST['old-password'] != "" && $_POST['new-password'] != "" && $_POST['new-password-repeat'] != "") {
  $oldPassword = $_POST['old-password'];
  $newPassword = $_POST['new-password'];
  $newPasswordRepeat = $_POST['new-password-repeat'];
  $MatKhau = $row['MatKhau'];
  if ($oldPassword != $MatKhau)
    echo "Mật khẩu không hợp lệ.";
  else if ($newPassword != $newPasswordRepeat)
    echo "Mật khẩu lặp lại không trùng mật khẩu mới.";
  else {
    $sql_add = "UPDATE thanhvien set MatKhau='" . $newPassword . "' WHERE ID_ThanhVien= '$_GET[id]'";
    mysqli_query($mysqli, $sql_add);
    header("location:logout.php");
  }
}
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
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="../image/png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>

<body>
  <?php @include("../menu.php"); ?>

  <div class="container" style="height:500px;width: 100%;display:flex;justify-content:center;align-items:center;text-align:left;flex-direction:column;">
    <br>
    <hr>
    <div class="card bg-light" style="width: 50%;height:80%">
      <article class="card-body mx-auto" style="width: 100%;display:flex;justify-content:center;align-items:center;text-align:left;flex-direction:column;">
        <h4 class="card-title mt-3 text-center">Đổi mật khẩu</h4>
        <form action="" method="POST">
          <label for="password"><b>Mật khẩu cũ&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;</b></label>
          <input type="password" name="old-password" required style="width:100%;height:30px;transform:scale(1);border-radius:5px;">
          <label for="password-repeat"><b> Mật khẩu mới &nbsp; &nbsp; &nbsp; &nbsp;</b></label>
          <input type="password" name="new-password" required style="width:100%;height:30px;transform:scale(1);border-radius:5px;">
          <label for="password-repeat"><b>Nhập lại mật khẩu</b></label>
          <input type="password" name="new-password-repeat" required style="width:100%;height:30px;transform:scale(1);border-radius:5px;">
          </br>
          </br>
          <input type="submit" class="btn btn-primary btn-block" name="sua" value="Sửa" style="float: right; width:100px;back ;">
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
      height: 400px !important;
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