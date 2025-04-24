<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../view/js/modal.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <link
      rel="shortcut icon"
      href="../view/img/DMTD-Food-Logo.jpg"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="../view/css/style.css" />
    <title>DMTD FOOD</title>
</head>
<body>
<div class="header-banner">60 phút - Giao ngay tận nơi</div>
    <!-- header  -->
    <header class="header-top">
      <div class="container">
        <div class="logo">
          <a href="#" class="logo-img"
            ><img height="70" src="../view/img/DMTD-Food-Logo.jpg" alt="Logo"
          /></a>
          <span><b>DMTD FOOD</b></span>
        </div>
        <div class="box">
          <input type="text" placeholder="Tìm kiếm thức ăn" />
          <a href="filter.html">
            <i class="fa-solid fa-magnifying-glass"></i>
          </a>
        </div>
        <div class="action">
          <div class="item">
            <a href="#"><i class="fa-regular fa-user"></i></a>
            <?php if($isLoggedIn == true) 
              echo $tenDangNhap;
            ?>
            <ul class="item_menu">
              <?php
              if($isLoggedIn == true){
              ?>
              <li class="heder_item_user">
                <a href="../view/cart.php">Giỏ hàng của tôi</a>
              </li>
              <li class="heder_item_user">
                <a href="../view/logOut.php">Đăng xuất</a>
              </li>
              <?php
            } else{
              ?>
              <li class="heder_item_user">
                <a href="../view/signIn.php">Đăng nhập</a>
            </li>
              <li class="heder_item_user">
                <a href="../view/signUp.php">Đăng ký</a>
              </li>
              <?php
            }
            ?> 
            </ul>
          </div>
          <div class="item">
            <a href="register.html"
              ><i class="fa-solid fa-cart-shopping"></i
            ></a>
          </div>
        </div>
      </div>
    </header>
    <!-- header  -->
    <nav>
      <ul>
        <li><a href="#">Trang chủ</a></li>
        <li><a href="#">Món mặn</a></li>
        <li><a href="#">Món chay</a></li>
        <li><a href="#">Món lẩu</a></li>
        <li><a href="#">Nước uống</a></li>
      </ul>
    </nav>

    <div class="banner">
      <img
        src="../view/img/White Texture Modern Korean Food Banner.png"
        alt="banner"
      />
    </div>
