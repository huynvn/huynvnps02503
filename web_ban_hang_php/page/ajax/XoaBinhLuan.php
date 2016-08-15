<?php
$ketnoi=mysql_connect("localhost","root","");
if(!$ketnoi)
    echo "Kết nối thất bại";

mysql_select_db("banhang_php",$ketnoi);
mysql_query("set names utf8");

$xoaBinhLuan="DELETE FROM binhluan WHERE MaBinhLuan='".$_POST["mabinhluan"]."'";

    if(mysql_query($xoaBinhLuan))
        echo "Xóa bình luận thành công";
    else
        echo "Đã xảy ra lỗi";
?>