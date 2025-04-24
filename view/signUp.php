<?php
include '../model/thuvien.php';
$conn = ketnoidb();

if(isset($_POST['signUp'])){
    $tenNguoiDung = $_POST['tenNguoiDung'];
    $tenDangNhap = $_POST['tenDangNhap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password=md5($password);
    $sdt = $_POST['sdt'];
    $diaChi = $_POST['diaChi'];

    $checkEmail = "SELECT * FROM nguoidung where email = '$email'";
    $result = $conn->query($checkEmail);

    if($result->num_rows>0){
      echo "<script>alert('Tài khoản đã được đăng ký!');</script>";
    }else{
        $insertQuery = "INSERT INTO nguoidung(tenNguoiDung,tenDangNhap,email,password,sdt,diaChi)
         VALUES('$tenNguoiDung',' $tenDangNhap','$email','$password','$sdt','$diaChi')";
        if($conn->query($insertQuery) == true){
            header("location:../view/signIn.php");
        }else{
            echo "Error:" . $conn->error;
        }
    }
  }   
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.container{
    background-color: #ffff;
    width: 450px;
    padding: 1.5rem;
    margin: 50px auto;
    border-radius: 10px;
    box-shadow: 0 20px 35px rgba(0,0,1,0.5);
}

.container h2{
    font: size 1.5rem;  
    font-weight:bold;
    text-align:center;
    padding: 1.3rem;
    margin-top:0.1rem;
    margin-bottom:0.2rem;
}

.input-container {
  display: flex; 
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: #f37319;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid black;
}

input[type=submit] {
  background-color: #f37319;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

input[type=submit]  {
  opacity: 1;
}

.social {
  text-align:center;
}
.social i{
  color: #F37319;
  padding: 0.8rem 1.5rem;
  border-radius:10px;
  font-size:1.5rem;
  cursor: pointer;
  border: 2px solid #dfe9f5;
  margin:0 15px;
  
}
.social i:hover{
  font-size:1.6rem;
  border:2px solid #F37319;
  transition:1s;
}

.links{
    display:flex;
    justify-content:center;
    padding:0 4rem;
    margin-top:0.3rem;
    font-weight:bold;
}

.links a{
    color:#F37319;
    text-decoration:none;
    margin: 16px 0px 0px 2px;
    font-size:1rem;
    font-weight:bold;
}
.links a:hover{
    cursor: pointer;
    text-decoration:underline;
    color: red;
}

.back {
  display: inline-block;
  padding: 10px 30px;
  font-size: 15px;
  background: #d3d3d3;
  margin: 0 5px;
  text-decoration: none; 
  color: black;
  font-weight:5px;
  text-align: center;
  border-radius: 5px;
}

.back:hover {
  text-decoration: none;
  background: #b0b0b0; 
}


</style>
</head>
<body>

<div class="container">
<h2>ĐĂNG KÝ</h2>
<form action="signUp.php" method="post" style="max-width:500px;margin:auto">
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Họ và tên" name="tenNguoiDung" required>
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Tên đăng nhập" name="tenDangNhap" required>
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" placeholder="Email" name="email" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Mật khẩu" name="password" required>
  </div>

  <div class="input-container">
  <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" pattern="^0[1-9][0-9]{8,10}$" placeholder="Số điện thoại" name="sdt" required>
  </div>

  <div class="input-container">
  <i class="fa fa-map-marker icon"></i>
    <input class="input-field" type="text" placeholder="Địa chỉ" name="diaChi" required>
  </div>

  <input type="submit" value="Đăng ký" name="signUp">
  <div class="links">
    <p>Đã có tài khoản?</p>
    <a href="../view/signIn.php">Đăng nhập</a>
  </div>

  <a href="../controller/index.php" class="back">Quay lại</a>
</form>
</div>
</body>
</html>