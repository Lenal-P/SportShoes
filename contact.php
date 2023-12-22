<?php
include("conection.php"); 
session_start();
if (isset($_POST['contact'])) {
  $ID_ThanhVien=$_GET['id'];
  $TenThanhVien=$_POST['name'];
  $Email=$_POST['email'];
  $NoiDung=$_POST['NoiDung'];
  $sql_ThanhVien = "INSERT INTO lienhe(ID_ThanhVien,TenThanhVien,Email,NoiDung) VALUES('".$ID_ThanhVien."','".$TenThanhVien."','".$Email."','".$NoiDung."')";
    mysqli_query($mysqli,$sql_ThanhVien);
    header("location:contact.php?id={$ID_ThanhVien}");
  }
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset=utf-8>
    <title>Trang chủ</title>
    <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"  href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet"  href="bootstrap/js/bootstrap.bundle.js">
    <link rel="stylesheet"  href="bootstrap/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="./home.css">
    <link rel="stylesheet" href="./footer.css">
    <link rel="shortcut icon" href="https://img.icons8.com/cotton/2x/laptop--v3.png" type="image/png">
  </head>
  <body> 
    <?php @include("./menu-home.php"); ?>
   <div class="container">
         <h2 style="text-align:center; margin-top: 30px;">Liên hệ</h2>
    <div class="get-order" style=" margin-left: 250px; width: 600px;">

     <div class="alert alert-success" role="alert">
      <form method="POST" action="">
        
   <td>Tên Người dùng</td>
   <td><input class="form-control" style="width:300px" type="text"  name="name" value="<?php echo $_SESSION['HoVaTen']?>" ></td> 
   <td><p>Email</p></td>
   <td> <input class="form-control" style="width:300px" type="text" name="email" value="<?php echo $_SESSION['Email']?>" ></td>
   <td><p>Nội dung</p></td>
   <td> <textarea class="form-control" type="text" name="NoiDung" value="" ></textarea></td>
   <td></br></td>
   <td><input type="submit" name="contact" value="Gửi"></td>
 </tr>
</form>    
</div>
</div>
</div>
  <?php @include("./footer-home.php"); ?>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>
