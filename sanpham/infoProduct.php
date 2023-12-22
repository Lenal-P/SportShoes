<?php
include("../conection.php");
session_start();
if (isset($_SESSION['ID_ThanhVien'])) {
    $id_cus = $_SESSION['ID_ThanhVien'];
}
?>
<?php
$sql_product = "SELECT * FROM sanpham  where ID_SanPham='$_GET[id_product]' ORDER BY ID_SanPham DESC";
$query_product = mysqli_query($mysqli, $sql_product);
$row_product = mysqli_fetch_array($query_product);
$sql_comment = "SELECT * FROM binhluan,thanhvien 
where binhluan.ID_SanPham='$_GET[id_product]' and binhluan.ID_ThanhVien=thanhvien.ID_ThanhVien";
$query_comment = mysqli_query($mysqli, $sql_comment);
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
    <link rel="stylesheet" href="./infoProduct.css">
    <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">

</head>

<body>
    <?php @include("../menu.php"); ?>

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <div class="card">
                <div class="container-fliud">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post" action="../cart/add.php?id=<?php echo $row_product['ID_SanPham']; ?>">
                        <input type="hidden" name="sp_ten" id="sp_ten" value="<?php echo $row_product['TenSanPham']; ?>">
                        <input type="hidden" name="sp_gia" id="sp_gia" value="<?php echo number_format($row_product['GiaBan'], 0, ',', '.') ?>">
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien"
                            value="<?php echo $row_product['Img']; ?>">
                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-3">
                                        <img src="../image/product/<?php echo $row_product['Img']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title">
                                    <?php echo $row_product['TenSanPham']; ?>
                                </h3>

                                <p class="product-description">
                                    <?php echo $row_product['MoTa']; ?>
                                </p>

                                <h4 class="price">Giá: <span>
                                    <?php echo number_format($row_product['GiaBan'], 0, ',', '.') ?> VND
                                    </span></h4>
                                <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                    <strong>Uy tín</strong>!
                                </p>

                                <?php if (isset($_SESSION['TenDangNhap'])) { ?>
                                    <div class="form-group" style="gap:10px">
                                        <label for="soluong">Số lượng đặt mua:</label>
                                        <input type="number" class="form-control" id="soluong" name="soluong" value="1" max="<?php echo $row_product['SoLuong']; ?>" min="1">
                                        <label for="soluong">Sản phẩm có sẵn: <?php echo $row_product['SoLuong']; ?></label>
                                    </div>
                                    <div class="action">
                                        <input type="submit" class="btn btn-primary" name='submit' value="Mua hàng" readonly="">
                                        <input type="submit" class="btn btn-add-cart" name='submit' value="Thêm vào giỏ hàng" readonly="">
                                    </div>
                                <?php } else { ?>
                                    <p style="color:red !important;text-transform:uppercase;">Bạn cần đăng nhập để mua hàng hoặc bình luận !</p>
                                    <a href="../ThanhVien/login.php"><input type="login" class="btn btn-primary" name='submit' value="Đăng nhập" readonly=""></a>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if (isset($_SESSION['TenDangNhap'])) { ?>
                <div class="card">
                    <div class="container-fluid">
                        <h3>Bình luận</h3>
                        <?php
                        $i = 0;
                        while ($row_comment = mysqli_fetch_array($query_comment)) {
                            $i++;
                            ?>
                            <div class="alert alert-success" role="alert">
                                <form class="form-floating"
                                    action="actionComment.php?id_product=<?php echo $row_product['ID_SanPham']; ?>"
                                    method="POST">
                                    <small><label for="floatingInputValue" style="font-weight: bold;">
                                            <?php echo $row_comment['HoVaTen']; ?>
                                        </label>
                                        <label for="floatingInputValue">
                                            <?php echo $row_comment['ThoiGianBinhLuan']; ?>
                                        </label>

                                    </small>
                                    </br>
                                    <label for="floatingInputValue" style="font-size: 20px">
                                        <?php echo $row_comment['NoiDung']; ?>
                                    </label>
                            </div>
                            <?php
                        }
                        ?>
                        <?php if (isset($_SESSION['TenDangNhap'])) {
                            ?>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Hãy bình luận sản phẩm tại đây"
                                    id="floatingTextarea2" name="NoiDung" style="height: 100px"></textarea>
                                </br>
                            </div>
                            <div class="action">
                                <input type="submit" class="btn btn-primary" name='comment' value="Bình luận"
                                    style="float:right;">
                            </div>
                        <?php
                        }
                        ?>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
        </div>
    </main>
    <?php @include("../footer.php"); ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>

<style>
  @media screen and (max-width: 1024px) { 
    .card {
        width: 100%;
    }
    .wrapper {
        width: 100%;
        position: relative;
        margin: 0;
    }
  }
</style>