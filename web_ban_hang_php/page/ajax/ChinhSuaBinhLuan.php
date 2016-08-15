<?php
$ketnoi=@mysql_connect("mysql.hostinger.vn","u361226315_root","123456");
if(!$ketnoi)
    echo "Kết nối thất bại";

mysql_select_db("u361226315_dpphp",$ketnoi);
mysql_query("set names utf8");

$csBinhLuan="UPDATE binhluan SET NoiDung='".$_POST["noidung"]."' WHERE MaBinhLuan='".$_POST["mabinhluan"]."'";

    if(mysql_query($csBinhLuan))
        echo "Chình sửa bình luận thành công";
    else
        echo "Đã xảy ra lỗi";
?>