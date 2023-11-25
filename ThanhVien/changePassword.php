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
  <link rel="stylesheet" href="../home.css">
  <link rel="stylesheet" href="../menu.css">
  <link rel="stylesheet" href="../footer.css">
  <link rel="stylesheet" href="../themify-icons/themify-icons.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="../image/png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <style type="">
    .divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
}
  </style>
</head>

<body>
  <?php @include("../menu.php"); ?>

  <div class="container" style="height:500px;">
    <br>
    <hr>
    <div class="card bg-light" style="width: 100%;height:80%">
      <article class="card-body mx-auto" style="width: 100%;">
        <h4 class="card-title mt-3 text-center">Đổi mật khẩu</h4>
        <form action="" method="POST" style="display:flex;flex-direction:column;margin: 0 30%;width:60%;">
          <label for="password"><b>Mật khẩu cũ&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;</b></label>
          <input type="password" name="old-password" required style="width:70%;height:30px;transform:scale(1);border-radius:5px;">
          <label for="password-repeat"><b> Mật khẩu mới &nbsp; &nbsp; &nbsp; &nbsp;</b></label>
          <input type="password" name="new-password" required style="width:70%;height:30px;transform:scale(1);border-radius:5px;">
          <label for="password-repeat"><b>Nhập lại mật khẩu</b></label>
          <input type="password" name="new-password-repeat" required style="width:70%;height:30px;transform:scale(1);border-radius:5px;">
          </br>
          </br>
          <input type="submit" class="btn btn-primary btn-block" name="sua" value="Sửa"
            style="float: right; width:100px; ;">
        </form>
      </article>
    </div>
  </div>
  <?php @include("../footer.php"); ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>