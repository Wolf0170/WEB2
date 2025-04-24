<?php
session_start();
// KT USER ĐĂNG NHẬP CHƯA
$isLoggedIn = isset($_SESSION['tenDangNhap']);

if($isLoggedIn){
  $tenNguoiDung = $_SESSION['tenNguoiDung'];
  $tenDangNhap = $_SESSION['tenDangNhap']; 
  $email = $_SESSION['email']; 
  $password = $_SESSION['password'];
  $sdt = $_SESSION['sdt'];
  $diaChi = $_SESSION['diaChi'];
}

if(!isset($_SESSION['giohang'])){
    $_SESSION['giohang']=[];
} 
?>

<?php 
include "../view/header.php";
?>

<?php
include "../model/thuvien.php";
$conn = ketnoidb();

// Số sản phẩm hiển thị trên mỗi trang
$limit = 8;

$sql_count = "SELECT COUNT(*) AS TongSanPham FROM sanpham";
$result_count = mysqli_query($conn, $sql_count);
$row = mysqli_fetch_assoc($result_count);
$total_products = $row['TongSanPham']; // Tổng số sản phẩm

$total_pages = ceil($total_products / $limit);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$products = upLoadSanPham($page, $limit);
?>

<?php include "../view/home.php"?>

<?php
$showLoginModal = false;
if(isset($_POST['addcart']) && !$isLoggedIn) {
    $showLoginModal = true;

    if($showLoginModal) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                showLoginModal();
            });
        </script>';
    }
}   
?>


<?php 
include "../view/footer.php";
?>