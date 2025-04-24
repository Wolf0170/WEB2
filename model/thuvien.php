<?php
function ketnoidb(){
    $serve= "localhost";
    $user = "root";
    $password = "";
    $database = "web";

    $conn= new mysqli($serve,$user,$password,$database);
    
    if($conn->connect_error){
        die("Ket noi that bai:" . $conn->connect_error);
      }

    return $conn;
}

function upLoadSanPham($page = 1, $limit = 6) {
  // Kết nối database
  $conn = ketnoidb();

  // Tính OFFSET để lấy sản phẩm theo trang hiện tại
  $offset = ($page - 1) * $limit;

  // Truy vấn dữ liệu với phân trang
  $sql = "SELECT * FROM sanpham ORDER BY MaSP DESC LIMIT $limit OFFSET $offset";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
      die("Lỗi truy vấn: " . mysqli_error($conn));
  }

  // Tạo mảng chứa sản phẩm
  $products = [];
  while ($pro = mysqli_fetch_assoc($result)) {
      $products[] = $pro; // Thêm sản phẩm vào mảng
  }

  mysqli_close($conn);
  return $products; // Trả về mảng sản phẩm
}


function addcart($hinh,$tensp,$gia){

  $fl=0; //kiem tra sp co trung trong gio hang khong?

  for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
      
      if($_SESSION['giohang'][$i][1]==$tensp){
          $fl=1;
          $soluongnew=$soluong+$_SESSION['giohang'][$i][3];
          break;

      }
      
  }
  //neu khong trung sp trong gio hang thi them moi
  if($fl==0){
      //them moi sp vao gio hang
      $sp=[$hinh,$tensp,$gia,$soluong];
      $_SESSION['giohang'][]=$sp;
  }
}

?>