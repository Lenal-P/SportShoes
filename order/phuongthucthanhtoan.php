<?php
include("../conection.php");
session_start();

$ID_ThanhVien = isset($_GET['id']) ? $_GET['id'] : '';
$sql_getOrder = "SELECT * FROM hoadon WHERE ID_ThanhVien='$ID_ThanhVien' ORDER BY ID_HoaDon DESC";
$query_getOrder = mysqli_query($mysqli, $sql_getOrder);
$row_getOrder = mysqli_fetch_array($query_getOrder);
$sql_getCus = "SELECT * FROM thanhvien WHERE ID_ThanhVien='$ID_ThanhVien' ORDER BY ID_ThanhVien DESC";
$query_getCus = mysqli_query($mysqli, $sql_getCus);
$row_getCus = mysqli_fetch_array($query_getCus);

if (isset($_POST['dathang'])) {
    $option = isset($_POST['selectPay']) ? $_POST['selectPay'] : false;
    if ($option) {
        if ($_POST['selectPay'] == "shipcod") {
            header('location:dathang.php');
            exit;
        } else if ($_POST['selectPay'] == "shipchuyenkhoan") {
            header('location:finish.php');
            exit;
        }
    } else {
        echo "Phương thức thanh toán là bắt buộc";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <meta charset="utf-8">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">
</head>

<body>
    <?php include("../menu.php"); ?>

    <?php 
    $sql_getOrder = "SELECT * FROM hoadon ORDER BY ID_HoaDon DESC LIMIT 1";
    $query_getOrder = mysqli_query($mysqli, $sql_getOrder);
    $ID_Order = mysqli_fetch_array($query_getOrder);
    if (isset($_GET['id'])) {
        $ID_Order = $_GET['id'];
    } else {
        echo "Empty query!";
        exit;
    }
    ?>
    <main role="main" style="height:120vh;">
        <div class="container mt-4" style="margin:auto;width:100%;">
            <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                <h2>Thanh toán</h2>
                <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
            </div>

            <form class="needs-validation" name="frmthanhtoan" method="post" action="#" style="display:flex;flex-direction:row-reverse;">
                <input type="hidden" name="kh_tendangnhap" value="dnpcuong">
                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3" style="width:20vw">
                            <span class="text-muted">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill">SportWave</span>
                        </h4>
                        <?php
                        if (isset($_SESSION['displayQtyArray']) && is_array($_SESSION['displayQtyArray'])) {
                            $displayQtyArray = $_SESSION['displayQtyArray'];

                            if (isset($_POST['selectedItems']) && is_array($_POST['selectedItems'])) {
                                //------------------------Save Order---------------------------
                                if (isset($_POST['submit'])) {
                                    $ID_ThanhVien=isset($_GET['id']) ? $_GET['id']: '';
                                    $sql_ThanhVien = "SELECT * FROM thanhvien WHERE ID_ThanhVien=$ID_ThanhVien LIMIT 1";
                                    $query_ThanhVien = mysqli_query($mysqli,$sql_ThanhVien);
                                    $row= mysqli_fetch_array($query_ThanhVien);
                                    $ThoiGianLap=date("Y-m-d H:i:s");
                                    $DiaChi=$row['DiaChi'];
                                    if (isset($_SESSION['cart'])) {
                                            $allMoney=0;
                                            $allAmount=0;
                                        foreach ($_SESSION['cart'] as $value) {
                                            $Money =$value['qty']*$value['GiaBan'];
                                            $amount=$value['qty'];
                                            $allMoney +=$Money;
                                            $allAmount+=$amount;
                                        }
                                    $SoDienThoai=$row['SoDienThoai'];
                                    $GiaTien=$allMoney;
                                    }
                                    $sql_saveOrder="INSERT INTO hoadon(ID_ThanhVien,ThoiGianLap,DiaChi,GiaTien,SoDienThoai) VALUES('".$ID_ThanhVien."','".$ThoiGianLap."','".$DiaChi."','".$GiaTien."','".$SoDienThoai."')";
                                        mysqli_query($mysqli,$sql_saveOrder);
                                }
                                //------------------------Save Order---------------------------

                                $selectedItems = $_POST['selectedItems'];
                                $i = 0;
                                $allMoney = 0;
                                ?>
                                <div class="tableInfo">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Giá tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($selectedItems as $selectedItem) {
                                                if (isset($displayQtyArray[$selectedItem])) {
                                                    $displayQty = intval($displayQtyArray[$selectedItem]);
                                                    $sql_product = "SELECT * FROM sanpham WHERE ID_SanPham = $selectedItem";
                                                    $query_product = mysqli_query($mysqli, $sql_product);
                                                    while ($row_product = mysqli_fetch_array($query_product)) {
                                                        $i++;
                                                        $allMoney += $row_product['GiaBan'] * $displayQty;
                                                        ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $row_product['TenSanPham'] ?></td>
                                                            <td><?= $displayQty?></td>
                                                            <td><?= number_format($row_product['GiaBan'], 0, ',', '.') ?> Đồng</td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <h5 style="width:300%;float:left;color:red;margin-left:50%">Tổng tiền : <?= number_format($allMoney, 0, ',', '.') ?> Đồng</h5>
                                    </br>
                                </div>
                                <?php
                            } else {
                                echo "<p>Không có sản phẩm nào được chọn.</p>";
                            }
                        } else {
                            echo "Không có dữ liệu số lượng sản phẩm.";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Thông tin khách hàng</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="kh_ten">Họ tên</label>
                            <input type="text" class="form-control" name="kh_ten" id="kh_ten"
                                value="<?php echo $row_getCus['HoVaTen'] ?>" readonly="">
                        </div>
                        <div class="col-md-12">
                            <label for="kh_diachi">Địa chỉ</label>
                            <input type="text" class="form-control" name="kh_diachi" id="kh_diachi"
                                value="<?php echo $row_getOrder['DiaChi'] ?>" readonly="">
                        </div>
                        <div class="col-md-12">
                            <label for="kh_dienthoai">Điện thoại</label>
                            <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai"
                                value="<?php echo $row_getCus['SoDienThoai'] ?>" readonly="">
                        </div>
                        <div class="col-md-12">
                            <label for="kh_email">Email</label>
                            <input type="text" class="form-control" name="kh_email" id="kh_email"
                                value="<?php echo $row_getCus['Email'] ?>" readonly="">
                        </div>
                        <div class="col-md-12">
                            <label for="kh_ghiChu">Ghi Chú</label>
                            <input type="text" class="form-control" name="kh_ngaysinh" id="kh_ngaysinh"
                                value="<?php echo $row_getOrder['GhiChu'] ?>" readonly="">
                        </div>
                        <div class="col-md-12">
                            <label for="kh_cmnd">Tổng tiền</label>
                            <input type="text" class="form-control" name="kh_cmnd" id="kh_cmnd"
                                value="<?php echo number_format($allMoney, 0, ',', '.') ?>" readonly="">
                        </div>
                    </div>
                    <form action="" method="POST">
                        <label for="kh_hinhThucThanhToan">Phương Thức Thanh toán</label>
                        </br>
                        <select class="form-select" aria-label=".form-select-lg example" style="" name="selectPay">
                            <option value="shipchuyenkhoan" selected>Thanh toán bằng thẻ</option>
                            <option value="shipcod">Thanh toán khi nhận hàng</option>
                        </select>
                        </br>
                        </br>
                        <input type="submit" class="btn btn-info" name='dathang' value="Đặt hàng">
                        <a class="btn btn-primary" href="./suaOrder.php?id=<?php echo $row_getOrder['ID_HoaDon']; ?>">
                            &nbsp;Sửa lại thông tin giao hàng</a>
                    </form>
                </div>
            </div>
        </form>
        </div>
    </main>
    <?php include("../footer.php"); ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>
