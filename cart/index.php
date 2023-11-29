<?php
include("../conection.php");
session_start();
$sql_ThanhVien = "SELECT * FROM thanhvien ORDER BY ID_ThanhVien DESC";
$query_ThanhVien = mysqli_query($mysqli, $sql_ThanhVien);
$row = mysqli_fetch_array($query_ThanhVien);
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
  <link rel="stylesheet" href="./cart.css">
  <link rel="stylesheet" href="../themify-icons/themify-icons.css">
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<script>
  $(document).ready(function () {
    initializeTotal(); // Gọi hàm khi trang được tải

    function initializeTotal() {
      $('#allMoney').text('0 VND');
      $('#allAmount').text('0 sản phẩm có giá:');
    }

    function updateTotal() {
      var allMoney = 0;
      var allAmount = 0;

      // ... (giữ nguyên phần còn lại của hàm updateTotal)

      $('#allMoney').text(numberWithCommas(allMoney) + ' VND');
      $('#allAmount').text(numberWithCommas(allAmount) + ' sản phẩm có giá:');
    }
    $('#selectAllCheckbox').change(function () {
      var isChecked = $(this).prop('checked');
      $('.checkBoxCart').prop('checked', isChecked);
      updateTotal();
    });

    $('.checkBoxCart').change(function () {
      var anyUnchecked = $('.checkBoxCart:not(:checked)').length > 0;
      $('#selectAllCheckbox').prop('checked', !anyUnchecked);
      updateTotal();
    });

    $('.checkbox').change(function () {
      updateTotal();
    });

    $('.selectAllCheckbox').change(function () {
      $('.checkbox').prop('checked', $(this).prop('checked'));
      updateTotal();
    });

    function updateTotal() {
      var allMoney = 0;
      var allAmount = 0;

      $('.checkbox:checked').each(function () {
        var row = $(this).closest('tr');
        var price = parseFloat(row.find('td:eq(6)').text().replace(/\D/g, ''));
        var quantity = parseInt(row.find('td:eq(5)').text());
        var subtotal = price * quantity;

        allMoney += subtotal;
        allAmount += quantity;
      });

      $('#allMoney').text(numberWithCommas(allMoney) + ' VND');
      $('#allAmount').text(numberWithCommas(allAmount) + ' sản phẩm có giá:');
    }

    function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }  

    var selectedItems = [];

    $('.checkBoxCart:checked').each(function() {
      var productId = $(this).data('ID_SanPham');
      var quantity = parseInt($(this).closest('tr').find('.quantity-input').val());

      // if (!isNaN(quantity) && quantity > 0) {
      //     var displayQty = parseInt($(this).closest('tr').find('.display-qty').text());
      //     selectedItems.push({productId: productId, quantity: quantity, displayQty: displayQty});
      // }
    });

    if (selectedItems.length > 0) {
        // Gửi dữ liệu đến trang phuongthucthanhtoan.php bằng phương thức POST
        $.post('../order/phuongthucthanhtoan.php', {selectedItems: selectedItems}, function(response) {
            // Xử lý phản hồi từ trang phuongthucthanhtoan.php (nếu cần)
            console.log(response);
        });
    } else {
        // Gửi dữ liệu đến trang phuongthucthanhtoan.php bằng phương thức POST
        $.post('../order/phuongthucthanhtoan.php', {selectedItems: selectedItems}, function(response) {
            // Xử lý phản hồi từ trang phuongthucthanhtoan.php (nếu cần)
            console.log(response);
        });
    }
});
</script>

<body>
  <?php @include("../menu.php"); ?>
  <div class="container">
    <h2>Giỏ hàng</h2>
    </br>
    <div class="tableInfo">
      <?php
      if (isset($_SESSION['ID_ThanhVien'])) {

        ?>
        <form method="POST" action="../order/phuongthucthanhtoan.php?id=<?php echo $_SESSION['ID_ThanhVien'] ?>">
          <input type="hidden" name="selectedItems" value="<?php echo implode(',', array_keys($_SESSION['cart'])); ?>">
          <table class="table" style="vertical-align: middle;">
            <thead>
              <tr style="vertical-align: middle;">
                <th><input type="checkbox" id="selectAllCheckbox" class="checkBoxCart"></th>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Tùy chọn</th>
              </tr>
            </thead>
            <?php
            if (isset($_SESSION['cart'])) {
              $i = 0;
              $allMoney = 0;
              $allAmount = 0;
              $displayQtyArray = array(); // Mảng tạm để lưu displayQty
              ?>
              <tbody style="border-bottom: 2px solid #dee2e6;">
                <?php foreach ($_SESSION['cart'] as $key => $value) {
                  $i++;
                  ?>
                  <td><input type="checkbox" name="selectedItems[]" class="checkBoxCart checkbox" value="<?= $key ?>"></td>
                  <td>
                    <?= $i ?>
                  </td>
                  <td>
                    <?= $key ?>
                  </td>
                  <td>
                    <?= $value['TenSanPham'] ?>
                  </td>
                  <td><img src="../image/product/<?= $value['Img'] ?>" style="max-width:240px;max-height:240px"></td>
                  <td>
                  <?php
                    // Lấy ID sản phẩm từ $key hoặc từ bất kỳ nguồn dữ liệu nào phù hợp
                    $productID = $key;
                    // Truy vấn SQL để lấy giá trị SoLuong của sản phẩm
                    $sql_getQuantity = "SELECT SoLuong FROM sanpham WHERE ID_SanPham = $productID";
                    $query_getQuantity = mysqli_query($mysqli, $sql_getQuantity);
                    $row_product = mysqli_fetch_array($query_getQuantity);
                    // Kiểm tra xem có dữ liệu được trả về hay không
                    if ($row_product) {
                      // Sử dụng giá trị SoLuong từ dữ liệu trả về
                      $displayQty = ($value['qty'] > $row_product['SoLuong']) ? $row_product['SoLuong'] : $value['qty'];
                      $displayQtyArray[$key] = $displayQty;
                      echo $displayQty;
                      // Lưu mảng displayQty vào session
                      $_SESSION['displayQtyArray'] = $displayQtyArray;
                    } else {
                      // Xử lý nếu không có dữ liệu trả về
                      echo "Không có dữ liệu SoLuong";
                    }
                  ?>
                  </td>
                  <td>
                    <?php echo number_format($value['GiaBan'], 0, ',', '.') ?> VND
                  </td>
                  <td><a href="actionCart.php?id_product=<?= $key ?>">Xóa</a></td>
                </tbody>
                <?php
                }
            } else {
            ?>
              <h4>Không có gì trong giỏ hàng</h4>
              <?php
            }
            ?>
          </table>
          <?php if (isset($_SESSION['cart'])) {?>
            <h4 id="allMoney" style="float: right;color:red;">
              <?php echo number_format($allMoney, 0, ',', '.') ?>
            </h4>
            <h5 id="allAmount" style="float: right; width: 3%;">
              <?= $allAmount ?>
            </h5>
            </br>

            <?php
            $_SESSION['$allMoney'] = $allMoney;
            $_SESSION['$allAmount'] = $allAmount;
          }
          ?>
          </br>
          </br>
      </div>
      <a href="phuongthucthanhtoan.php">
        <input type="submit" class="btn btn-info" name='submit' value="Thanh toán" style="float:right; width: 20%">
      </a>
      </form>
      <?php
      } else {
      ?>
        <h4>Vui lòng đăng nhập để mua hàng</h4>
      <?php
      }
      ?>
    </div>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
  </div>
  <?php @include("../footer.php"); ?>
</body>
</html>