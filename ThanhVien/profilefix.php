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


if (isset($_POST['sua']) && $_POST['HoVaTen'] != "" && $_POST['Email'] != "" && $_POST['SoDienThoai'] != "" && $_POST['DiaChi'] != "") {
  $HoVaTen = $_POST['HoVaTen'];
  $Email = $_POST['Email'];
  $SoDienThoai = $_POST['SoDienThoai'];
  $DiaChi = $_POST['DiaChi'];
  $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
  if (!preg_match("/^[0-9]*$/", $phonenumber))
    echo "Số điện thoại không hợp lệ.";
  else {
    $sql_add = "UPDATE thanhvien set HoVaTen='" . $HoVaTen . "',Email='" . $Email . "', DiaChi = '" . $DiaChi . "',  SoDienThoai = '" . $SoDienThoai . "' WHERE ID_ThanhVien= '$_GET[id]'";
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
  <link rel="stylesheet" href="./profile.css">
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

    <div class="container">
      <div class="card bg-light">
        <article class="card-body mx-auto" style="margin:0 !important;">
          <h4 class="card-title mt-3 text-center">Thông tin cá nhân</h4>
          <form action="" method="POST">
            <div class="form-group input-group info">
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
              <input name="HoVaTen" class="form-control" value="<?php echo $row['HoVaTen'] ?>">
            </div>
            <div class="form-group input-group info">
              <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              <input name="Email" class="form-control" value="<?php echo $row['Email'] ?>">
            </div>
            <div class="form-group input-group info">
              <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
              <input name="SoDienThoai" class="form-control" value="<?php echo $row['SoDienThoai'] ?>">
            </div>
            <div class="form-group input-group info">
              <span class="input-group-text"> <i class="fa fa-building"></i> </span>
              <input name="DiaChi" class="form-control" placeholder="Phone number" type="text"
                value="<?php echo $row['DiaChi'] ?>">
            </div>
            </br>
            <div class="form-group">
              <p>Sau khi nhấn nút sửa bạn sẽ đăng nhập lại.</br> Bạn Có chắc chứ?</p>
              <input type="submit" class="btn btn-primary btn-block" name="sua" value="Sửa">
            </div>
          </form>
        </article>
      </div>
    </div>

    <?php @include("../footer.php"); ?>

  </div>
</body>
<script src="https://code.j33uery.com/jquery-3.2.1.slim.min.js"></script>
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