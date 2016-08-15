<?php
$ketnoi=@mysql_connect("mysql.hostinger.vn","u361226315_root","123456");
if(!$ketnoi)
    echo "Kết nối thất bại";

mysql_select_db("u361226315_dpphp",$ketnoi);
mysql_query("set names utf8");

if($_POST["tendangnhap"]=="")
{
    echo "Bạn phải đăng nhập mới có thể đánh giá";
}
else
{
    $layDanhGia="SELECT * FROM danhgia WHERE MaSanPham='".$_POST["masanpham"]."' and TenDangNhap='".$_POST["tendangnhap"]."'";
    $truyvanlayDanhGia=mysql_query($layDanhGia);
    if(mysql_num_rows($truyvanlayDanhGia)>0)
    {
        echo "Bạn đã đánh giá sản phẩm này";
    }
    else
    {
        $themDanhGia="INSERT INTO danhgia VALUES ('".$_POST["masanpham"]."','".$_POST["tendangnhap"]."','".$_POST["noidung"]."')";
        if(mysql_query($themDanhGia))
            echo "Đánh giá thành công";
        else
            echo "Thất bại";
    }
}

?>