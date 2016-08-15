<?php
session_start();
$ketnoi=@mysql_connect("mysql.hostinger.vn","u361226315_root","123456");
if(!$ketnoi)
    echo "Kết nối thất bại";

mysql_select_db("banhang_php",$ketnoi);
mysql_query("set names utf8");

$tendangnhap=$_POST["tendangnhap"];
$matkhau=$_POST["matkhau"];
$tranghientai=$_POST["tranghientai"];

$ktTonTai="SELECT * FROM thanhvien WHERE TenDangNhap='".$tendangnhap."' and MatKhau='".$matkhau."'";
$truyvanktTonTai=mysql_query($ktTonTai);

if(mysql_num_rows($truyvanktTonTai)>0) {
    echo "<script>alert('Đăng nhập thành công')</script>";
    $_SESSION["tendangnhap"]=$tendangnhap;
}
else {
    echo "<script>alert('Tài khoản hoặc mật khẩu không đúng')</script>";
}

?>

<script>
    location='<?php echo $tranghientai; ?>';
</script>