<?php
include("../conection.php");
session_start();

if (isset($_POST['submit'])) {
    $ID_ThanhVien = isset($_GET['id']) ? $_GET['id'] : '';

    // Lấy mảng displayQtyArray từ session
    if (isset($_SESSION['displayQtyArray'])) {
        $displayQtyArray = $_SESSION['displayQtyArray'];
    } else {
        // Xử lý nếu mảng không tồn tại trong session
        echo "Không có dữ liệu displayQtyArray";
        exit;
    }

    $sql_ThanhVien = "SELECT * FROM thanhvien WHERE ID_ThanhVien=$ID_ThanhVien LIMIT 1";
    $query_ThanhVien = mysqli_query($mysqli, $sql_ThanhVien);
    $row = mysqli_fetch_array($query_ThanhVien);

    $ThoiGianLap = date("Y-m-d H:i:s");
    $DiaChi = $row['DiaChi'];
    $SoDienThoai = $row['SoDienThoai'];

    if (isset($_SESSION['cart'])) {
        $allMoney = 0;
        $allAmount = 0;

        foreach ($_SESSION['cart'] as $key => $value) {
            // Lấy số lượng từ mảng displayQtyArray
            $quantity = isset($displayQtyArray[$key]) ? $displayQtyArray[$key] : $value['qty'];

            $Money = $quantity * $value['GiaBan'];
            $amount = $quantity;
            $allMoney += $Money;
            $allAmount += $amount;
        }

        $GiaTien = $allMoney;
	}
	// Thực hiện INSERT dữ liệu vào bảng hoadon
	$sql_saveOrder="INSERT INTO hoadon(ID_ThanhVien,ThoiGianLap,DiaChi,GiaTien,SoDienThoai) VALUES('".$ID_ThanhVien."','".$ThoiGianLap."','".$DiaChi."','".$GiaTien."','".$SoDienThoai."')";
	mysqli_query($mysqli,$sql_saveOrder);

	// Chuyển hướng đến trang phuongthucthanhtoan.php với tham số id
	header("location:phuongthucthanhtoan.php?id={$ID_ThanhVien}");
}
?>
