<?php
include("conection.php"); 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto:ital,wght@0,700;1,300&display=swap" rel="stylesheet">

<div class="sticky-top">
    <div class="menu sticky-top">
      <nav class="navbar navbar-expand-lg header-custom">
            <div class="container-fluid font-header-custom" style="max-height:80px">
                <a class="navbar-branch" href="./index.php">
                  <img src="./image/logo/logochinh.jpg">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                  aria-expanded="false" aria-label="Toggle navigation">
                    <span class="material-symbols-outlined">lists</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-product active" href="./sanpham/index.php">Tất cả sản phẩm</a>
                        </li>

                        <li class="nav-cart">
                            <a class="nav-product" href="./cart"><span class="material-symbols-outlined">shopping_cart</span></a>
                        </li>
                        <?php if (isset($_SESSION['TenDangNhap'])) { ?>
                            <li class="nav-item">
                                <a class="nav-product active" href="./historyOrder.php">Lịch sử đặt hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-product" href="./ThanhVien/logout.php">Đăng xuất</a>
                            </li>
                            <li class="nav-item">
                                <a type="button" class="btn btn-secondary"
                                    href="../SportShoes/ThanhVien/profile.php?id=<?php echo $_SESSION['ID_ThanhVien'] ?>" id="btn"
                                    style="color:rgb(222, 90, 0);font-size: 18px;font-weight:bold;position:absolute;right: 2%;cursor: pointer;z-index: 10000;background-color: transparent !important;border: none !important;"></span>
                                    <?php echo $_SESSION['HoVaTen'] ?>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li><a type="button" class="btn btn-first" href="./ThanhVien/login.php"><span class="material-symbols-outlined">person</span></a></li>
                        <?php } ?>
                    </ul>
                    <?php
                    if (isset($_SESSION['cart'])) {
                      ?>
                      <h5></h5>
                      <?php
                    }
                    ?>
                </div>
            </div>
            <form action="./sanpham/actionSanPham.php?TimKiem" class="navbar-form navbar-right" method="POST">
                <div class="input-group" style="right: 220%;width: 200%;">
                    <input type="Search" placeholder="Tìm Kiếm..." class="form-control" name="tukhoa">
                    <div class="input-group-btn">
                    <button type="submit" class="btn btn-secondary" name='tim' style ="position:absolute;right: 2%;cursor: pointer;z-index: 10000;background-color: transparent !important;border: none !important;color: black;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    </div>
                </div>
            </form>   
        </nav>
    </div>
</div>

<style>
  @media screen and (max-width: 1024px) {
    .navbar-branch {
      display: flex;
      align-items: center;
      justify-content: center;
      width: auto;
      margin: 0 45%;
      height: 80px;
      z-index: 0;
      & img {
        margin: 0;
      }
    }
    .navbar-form {
      position: relative;
      background-color: #2a2a2a;
      width: 100%;
      height: 50px;
      border: 2px #2a2a2a;
      & .input-group{
        width: 50% !important;
        height: 40px;
        left: 0;
        right: 0;
        margin: 0 25%;
      }
    }
    .rps-menu {
      display: none;
    }
    .position-fixed {
        display: none !important;
    }
    .collapse .navbar-collapse {
        position: fixed !important;
        display: block;
        width: 100px !important;
        height: 100px !important;
        & ul {
            display: block;
        }
    }
} 
</style>