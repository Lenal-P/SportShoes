<?php
include("../conection.php");
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
  <link rel="stylesheet" href="../home.css">
  <link rel="stylesheet" href="../menu.css">
  <link rel="stylesheet" href="../footer.css">
  <link rel="stylesheet" href="../themify-icons/themify-icons.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">

</head>

<body>
  <?php @include("../menu.php"); ?>

  <div class="container">
    <div class="container p-0">
      <div class="card px-4">
        <h4>Thanh Toán Trực Tuyến</h2>
          <div class="row gx-3">
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Họ và tên</p> <input class="form-control mb-3" type="text" placeholder="Name"
                  value="<?php echo $_SESSION['HoVaTen'] ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Tên Ngân Hàng</p> <input class="form-control mb-3" type="text"
                  placeholder="Agribank">
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Số tài khoản ngân hàng</p> <input class="form-control mb-3" type="text"
                  placeholder="1234 5678 435678">
              </div>
            </div>
            <div class="col-6">
              <div class="d-flex flex-column">
                <p class="text mb-1">Ngày đăng kí</p> <input class="form-control mb-3" type="text"
                  placeholder="MM/YYYY">
              </div>
            </div>
            <div class="col-6">
              <div class="d-flex flex-column">
                <p class="text mb-1">Mật Khẩu</p> <input class="form-control mb-3 pt-2 " type="password"
                  placeholder="***">
              </div>
            </div>
            <a type="button" class="btn btn-secondary" href="dathang.php"
              style="background-color: green; color:white;"></span> Thanh Toán</a>
          </div>
      </div>
    </div>

  </div>
  <?php @include("../footer.php"); ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>