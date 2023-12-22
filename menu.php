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
                <a class="navbar-branch" href="../index.php">
                  <img src="../image/logo/logochinh.jpg">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-product active" href="../sanpham/index.php">Tất cả sản phẩm</a>
                        </li>

                        <li class="nav-cart">
                            <a class="nav-product" href="../cart"><span class="material-symbols-outlined">shopping_cart</span></a>
                        </li>
                        <?php if (isset($_SESSION['TenDangNhap'])) { ?>
                            <li class="nav-item">
                                <a class="nav-product active" href="../historyOrder.php">Lịch sử đặt hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-product" href="../ThanhVien/logout.php">Đăng xuất</a>
                            </li>
                            <li class="nav-item">
                                <a type="button" class="btn btn-secondary"
                                    href="../ThanhVien/profile.php?id=<?php echo $_SESSION['ID_ThanhVien'] ?>" id="btn"
                                    style="color:rgb(222, 90, 0);font-size: 18px;font-weight:bold;position:absolute;right: 2%;cursor: pointer;z-index: 10000;background-color: transparent !important;border: none !important;"></span>
                                    <?php echo $_SESSION['HoVaTen'] ?>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li><a type="button" class="btn btn-first" href="../ThanhVien/login.php"><span class="material-symbols-outlined">person</span></a></li>
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
                <label for ="nav-mobile-input" class="navbar-list">
                    <span class="material-symbols-outlined">lists</span>
                </label>
                
                <input type="checkbox" class="nav-input" id="nav-mobile-input">

                <label for ="nav-mobile-input" class="nav-overlay"></label>

                <div class="nav-mobile">
                    <label for ="nav-mobile-input" class="nav-close">
                        <span class="material-symbols-outlined">close</span>
                    </label>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-product home active" href="../index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-product all active" href="../sanpham/index.php">Tất cả sản phẩm</a>
                        </li>
                        <?php if (isset($_SESSION['TenDangNhap'])) { ?>
                            <li class="nav-item">
                                <a class="nav-product his active" href="../historyOrder.php">Lịch sử đặt hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-product logout" href="../ThanhVien/logout.php">Đăng xuất</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <form action="../sanpham/actionSanPham.php?TimKiem" class="navbar-form navbar-right" method="POST">
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
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,700;1,300&display=swap');
    
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        font-family: 'Roboto', sans-serif;
        scroll-behavior: smooth;
    }
    .navbar {
        padding: 0;
        background-color: #2a2a2a;
        height: 80px;
    }

    .navbar-branch img {
        margin-left: 10%;
        width: auto;
        height: 60px;
        z-index: 1000000000;
    }

    .navbar-list {
        display: none;
    }

    .nav-mobile {
        display: none;
    }

    .nav-input {
        display: none;
    }

    .nav-product {
        margin: 0 20px;
        color: white;
        text-transform: uppercase;
        font-size: 16px;
    }

    .btn-secondary{
        &:hover {
            color: rgb(104, 220, 255) !important;
            background-color: transparent;
        }
    }

    .btn-first {
        border: 0;
        margin: 0;
        padding: 27px 0;
        position: absolute;
        right: 2%;
        color: white;
        &:hover {
            color: rgb(104, 220, 255);
        }
    }

    #btn {
        padding: 27px 0;
    }

    .nav-cart .nav-product {
        position: absolute;
        padding: 27px 0;
        right: 6%;
        &:hover {
            color: rgb(104, 220, 255);
        }
    }

    .nav-item .nav-product {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: 80px;
        width: 100%;
        margin-left: 30px;
    }

    .nav-item .nav-product:hover {
        color: white;
        text-decoration: none;
    }

    .nav-item .nav-product::after {
        position: absolute;
        content: "";
        width: 100%;
        height: 3px;
        bottom: 0;
        left: 0;
        transition: transform 0.5s;
        transform: scaleX(0);
        transform-origin: right;
        background-color: rgb(104, 220, 255);
    }

    .nav-item .nav-product:hover::after {
        transform: scaleX(1);
        transform-origin: left;
    }

    @media screen and (max-width: 1024px) { 
        .container {
            margin-top: 100px !important;
        }
        .navbar-branch {
            display: flex;
            align-items: center;
            justify-content: center;
            width: auto;
            margin: 0 45%;
            z-index: 0;
            & img {
                margin: 0;
            }
        }

        .navbar-form {
            position: absolute;
            background-color: #2a2a2a;
            width: 100vw;
            margin-top: 125px;
            height: 50px;
            border: 2px #2a2a2a;
            & .input-group{
                width: 50% !important;
                height: 30px;
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

        .navbar-collapse {
            position: absolute !important;
            display: flex;
            width: 100vw !important;
            height: 100px !important;
            & ul {
                display: block;
            }
        }

        .btn-first {
            position: absolute;
            top: 60px !important;
            height: auto !important;
            width: auto !important;
            padding: 0 !important;
            right: 5% !important;
        }

        .nav-item .nav-product {
            display: none;
        }

        .nav-item .btn-secondary {
            position: absolute;
            top: 60%;
            height: auto !important;
            width: auto !important;
            padding: 0 !important;
            right: 5% !important;
        }

        .nav-product span {
            position: absolute;
            padding: 0 !important;
            height: auto !important;
            width: auto !important;
            left: -100px;
            right: 0;
            top: 10px !important;
            z-index: 2;
        }

        .nav-overlay {
            position: fixed;
            display: none;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            z-index: 100000;
            background-color: rgba(0, 0, 0, 0.4);
            animation: fadeIn linear 0.2s;
        }

        .nav-mobile {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 400px;
            max-width: 100%;
            background-color: white;
            z-index: 1000000;
            border-radius: 15px;
            transform: translate(-100%);
            opacity: 0;
            transition: all linear 0.2s;
            & .nav-close {
                color: rgba(38, 38, 38, 0.8);
                position: absolute;
                right: 5%;
                top: 1%;
            }
            & .nav-item {
                position: absolute;
                left: 0;
                top: 3%;
                height: 100%;
                & .home {
                    display: block !important;
                    color: rgba(38, 38, 38, 0.8);
                    z-index: 10;
                }
                & .all {
                    top: 5%;
                    display: block !important;
                    color: rgba(38, 38, 38, 0.8);
                    z-index: 10;
                }
                & .his {
                    top: 10%;
                    z-index: 10;
                    display: block !important;
                    color: rgba(38, 38, 38, 0.8);
                }
                & .logout{
                    top: 15%;
                    z-index: 10;
                    color: rgba(38, 38, 38, 0.8);
                    display: block !important;
                }
            }
        }

        .navbar-list {
            color: white;
            z-index: 10000;
            display: block;
            position: absolute;
            padding: 0 !important;
            margin: 0 !important;
            height: auto !important;
            width: auto !important;
            left: 5%;
            top: 50px !important;
        }

        .nav-input:checked ~ .nav-overlay {
            display: block;
        }
        
        .nav-input:checked ~ .nav-mobile {
            transform: translate(0);
            opacity: 1;
        }

        .card {
            width: 32%;
        }
    }
    
    @media screen and (max-width: 990px) { 
        .card {
            width: 31% !important;
        }
    }

    @media screen and (min-width: 1025px) and (max-width: 1280px) {
        .container {
            margin-top: 100px !important;
        }
        .navbar-branch {
            display: flex;
            align-items: center;
            justify-content: center;
            width: auto;
            margin: 0 45%;
            z-index: 0;
            & img {
                margin: 0;
            }
        }

        .navbar-form {
            position: absolute;
            background-color: #2a2a2a;
            width: 100vw;
            margin-top: 125px;
            height: 50px;
            border: 2px #2a2a2a;
            & .input-group{
                width: 50% !important;
                height: 30px;
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

        .navbar-collapse {
            position: absolute !important;
            display: flex;
            width: 100vw !important;
            height: 100px !important;
            & ul {
                display: block;
            }
        }

        .btn-first {
            position: absolute;
            top: 60px !important;
            height: auto !important;
            width: auto !important;
            padding: 0 !important;
            right: 5% !important;
        }

        .nav-item .nav-product {
            display: none;
        }

        .nav-item .btn-secondary {
            position: absolute;
            top: 60%;
            height: auto !important;
            width: auto !important;
            padding: 0 !important;
            right: 5% !important;
        }

        .nav-product span {
            position: absolute;
            padding: 0 !important;
            height: auto !important;
            width: auto !important;
            left: -100px;
            right: 0;
            top: 10px !important;
            z-index: 2;
        }

        .nav-overlay {
            position: fixed;
            display: none;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            z-index: 100000;
            background-color: rgba(0, 0, 0, 0.4);
            animation: fadeIn linear 0.2s;
        }

        .nav-mobile {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 400px;
            max-width: 100%;
            background-color: white;
            z-index: 1000000;
            border-radius: 15px;
            transform: translate(-100%);
            opacity: 0;
            transition: all linear 0.2s;
            & .nav-close {
                color: rgba(38, 38, 38, 0.8);
                position: absolute;
                right: 5%;
                top: 1%;
            }
            & .nav-item {
                position: absolute;
                left: 0;
                top: 3%;
                height: 100%;
                & .home {
                    display: block !important;
                    color: rgba(38, 38, 38, 0.8);
                    z-index: 10;
                }
                & .all {
                    top: 5%;
                    display: block !important;
                    color: rgba(38, 38, 38, 0.8);
                    z-index: 10;
                }
                & .his {
                    top: 10%;
                    z-index: 10;
                    display: block !important;
                    color: rgba(38, 38, 38, 0.8);
                }
                & .logout{
                    top: 15%;
                    z-index: 10;
                    color: rgba(38, 38, 38, 0.8);
                    display: block !important;
                }
            }
        }

        .navbar-list {
            color: white;
            z-index: 10000;
            display: block;
            position: absolute;
            padding: 0 !important;
            margin: 0 !important;
            height: auto !important;
            width: auto !important;
            left: 5%;
            top: 50px !important;
        }

        .nav-input:checked ~ .nav-overlay {
            display: block;
        }
        
        .nav-input:checked ~ .nav-mobile {
            transform: translate(0);
            opacity: 1;
        }

        .card {
            width: 31% !important;
        }
    }
</style>