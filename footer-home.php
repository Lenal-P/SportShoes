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

<footer class="footer">
  <div class="footer_container">
      <a class="footer-logo" href="./index.php">
        <img src="./image/logo/logochinh.jpg">
      </a>
      <h4>Le Van Nhut & Le Thanh Phat</h4>
      <a href="https://www.facebook.com/profile.php?id=100087437781133" style="background:none;">
          <i class="fa-brands fa-facebook" style= "margin:0;padding:0;background:none;margin:0 20px;margin-top:3rem;"></i>
      </a>
      <a href="https://www.tiktok.com/@lenalpiggy">
          <i class="fa-brands fa-tiktok" style= "margin:0;padding:0;background:none;margin:0 20px;margin-top:3rem;"></i>
      </a>
      <a href="https://github.com/Lenal-P">
          <i class="fa-brands fa-github" style= "margin:0;padding:0;background:none;margin:0 20px;margin-top:3rem;"></i>
      </a>
  </div>
</footer>

<style>
  @media screen and (max-width: 1024px) { 
    .footer {
        margin-top: 140% !important;
        & img {
            height: 150px;
            width: auto;
        }
    }
  }
</style>