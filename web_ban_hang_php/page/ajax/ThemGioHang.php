<?php session_start();

function DinhDangTien($dongia) //1000000
{
    $sResult = $dongia;
    for ( $i = 3; $i < strlen($sResult); $i += 4)
    {
        $sSau = substr($sResult,strlen($sResult) - $i); // 000.000
        $sDau = substr($sResult,0, strlen($sResult) - $i); // 1
        $sResult = $sDau . "." . $sSau; // 1.000.000
    }
    return $sResult;
}

$ketnoi=@mysql_connect("mysql.hostinger.vn","u361226315_root","123456");
if(!$ketnoi)
    echo "Kết nối thất bại";

mysql_select_db("u361226315_dpphp",$ketnoi);
mysql_query("set names utf8");

$laySanPham="SELECT * FROM sanpham WHERE MaSanPham='".$_POST["masanpham"]."'";
$truyvanlaySanPham=mysql_query($laySanPham);
$cot=mysql_fetch_array($truyvanlaySanPham);

$giohangmoi=array(array("masp"=>$cot["MaSanPham"],"hinhsp"=>$cot["Anh"],"tensp"=>$cot["TenSanPham"],"soluong"=>$_POST["soluong"],"dongia"=>$cot["DonGia"])); // khoi tao gio hang moi

if(isset($_SESSION["giohang"])) // kiem tra gio hang ton tai
{
    $themspmoi=false;

    foreach($_SESSION["giohang"] as $cotGH)
    {
        if($cotGH["masp"]==$_POST["masanpham"])
        {
           $soluongdat = $cotGH["soluong"] + $_POST["soluong"];
            if($soluongdat>6)
            {
                $giohangdaco[]=array("masp"=>$cotGH["masp"],"hinhsp"=>$cotGH["hinhsp"],"tensp"=>$cotGH["tensp"],"soluong"=>$cotGH["soluong"],"dongia"=>$cotGH["dongia"]);
                echo "<script>alert('Số lượng đặt vượt quá giới hạn cho phép');</script>";
            }
            else
            {
                $giohangdaco[]=array("masp"=>$cotGH["masp"],"hinhsp"=>$cotGH["hinhsp"],"tensp"=>$cotGH["tensp"],"soluong"=>$soluongdat,"dongia"=>$cotGH["dongia"]);
            }
            $themspmoi=true;
        }
        else
        {
            $giohangdaco[]=array("masp"=>$cotGH["masp"],"hinhsp"=>$cotGH["hinhsp"],"tensp"=>$cotGH["tensp"],"soluong"=>$cotGH["soluong"],"dongia"=>$cotGH["dongia"]);
        }
    }

    if($themspmoi==false)
    {
        $_SESSION["giohang"]=array_merge($giohangdaco,$giohangmoi);
    }
    else
    {
        $_SESSION["giohang"]=$giohangdaco;
    }

}
else
{
    $_SESSION["giohang"]=$giohangmoi;
}

$tongsp=0;
$tongtien=0;
foreach($_SESSION["giohang"] as $cotGH)
{
    $tongsp++;
    $tongtien+=$cotGH["dongia"]*$cotGH["soluong"];
}

?>



<div class="cart box_1">
    <a href="GioHang.php">
        <h3> <div class="total">
                <span >$ <?php echo DinhDangTien($tongtien); ?> </span> (<span id="simpleCart_quantity" > <?php echo $tongsp; ?> </span> SP)</div>
            <img src="../images/cart-1.png" alt="" />
    </a>
    <p><a href="SanPham.php?moiGH=0"  class="simpleCart_empty">Làm mới</a></p>
    <div class="clearfix"> </div>
</div>