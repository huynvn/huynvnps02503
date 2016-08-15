<?php
include("../layout/header.php");

$laySPcao1="SELECT * FROM sanpham ORDER BY DonGia DESC LIMIT 0,1";
$truyvan_laySPcao1=mysql_query($laySPcao1);
$cot1=mysql_fetch_array($truyvan_laySPcao1);

$laySPcao2="SELECT * FROM sanpham ORDER BY DonGia DESC LIMIT 1,1";
$truyvan_laySPcao2=mysql_query($laySPcao2);
$cot2=mysql_fetch_array($truyvan_laySPcao2);

$laySP="SELECT * FROM sanpham ORDER BY SoLuong DESC LIMIT 0,8";
$truyvan_laySP=mysql_query($laySP);


?>

<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <div class="banner-1"></div>
            </li>
            <li>
                <div class="banner-2"></div>
            </li>
            <li>
                <div class="banner-3"></div>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--banner-ends-->
<!--Slider-Starts-Here-->
<script src="../script/jsNguoiDung/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!--End-slider-script-->
<!--start-banner-bottom-->
<div class="banner-bottom">
    <div class="container">
        <div class="banner-bottom-top">
            <div class="col-md-6 banner-bottom-left">
                <div class="bnr-one">
                    <div class="bnr-left">
                        <h1><a href="ChiTietSanPham.php?MaSP=<?php echo $cot1["MaSanPham"] ?>"><?php echo $cot1["TenSanPham"] ?></a></h1>
                        <p>Nulla tempus facilisis purus at.</p>
                        <div class="b-btn">
                            <a href="ChiTietSanPham.php?MaSP=<?php echo $cot1["MaSanPham"] ?>">MUA NGAY</a>
                        </div>
                    </div>
                    <div class="bnr-right">
                        <a href="ChiTietSanPham.php?MaSP=<?php echo $cot1["MaSanPham"] ?>">
                            <img width="150" height="150" src="../images/HinhSP/<?php echo $cot1["Anh"]; ?>" alt="" />
                        </a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>

            <div class="col-md-6 banner-bottom-right">
                <div class="bnr-two">
                    <div class="bnr-left">
                        <h1><a href="ChiTietSanPham.php?MaSP=<?php echo $cot2["MaSanPham"] ?>"><?php echo $cot2["TenSanPham"] ?></a></h1>
                        <p>Nulla tempus facilisis purus at.</p>
                        <div class="b-btn">
                            <a href="ChiTietSanPham.php?MaSP=<?php echo $cot2["MaSanPham"] ?>">MUA NGAY</a>
                        </div>
                    </div>
                    <div class="bnr-right">
                        <a href="ChiTietSanPham.php?MaSP=<?php echo $cot2["MaSanPham"] ?>">
                            <img width="150" height="150" src="../images/HinhSP/<?php echo $cot2["Anh"]; ?>" alt="" />
                        </a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--end-banner-bottom-->
<!--start-shoes-->
<div class="shoes">
    <div class="container">
        <div class="product-one"></div>

            <?php
            $i=0;
            while($cot=mysql_fetch_array($truyvan_laySP))
                {
                    $i++;
                ?>
        <div class="product-one">
            <div class="col-md-3 product-left">
                <div class="p-one simpleCart_shelfItem">
                    <a href="ChiTietSanPham.php?MaSP=<?php echo $cot["MaSanPham"]; ?>">
                        <img height="250" src="../images/HinhSP/<?php echo $cot["Anh"]; ?>" alt="" />
                        <div class="mask">
                            <span>Xem chi tiết</span>
                        </div>
                    </a>
                    <h4><?php echo $cot["TenSanPham"]; ?></h4>
                    <p><a class="item_add" href="#"><i></i> <span class=" item_price">$ <?php echo DinhDangTien($cot["DonGia"]); ?></span></a></p>

                </div>
            </div>
        </div>
            <?php
                    if($i%4==0)
                    { ?>
                    <div class="clearfix"></div>
                <?php
                    }
                }
            ?>



    </div>
</div>
<!--end-shoes-->
<!--start-abt-shoe-->
<div class="abt-shoe">
    <div class="container">
        <div class="abt-shoe-main">
            <div class="col-md-4 abt-shoe-left">
                <div class="abt-one">
                    <a ><img src="../images/abt-1.jpg" alt="" /></a>
                    <h4><a >Cras dolor ligula</a></h4>
                    <p>Phasellus auctor vulputate egestas. Nulla facilisi. Cras dolor ligula, pharetra vitae efficitur ac, tempus vitae nisl. Aliquam erat volutpat. </p>
                </div>
            </div>
            <div class="col-md-4 abt-shoe-left">
                <div class="abt-one">
                    <a ><img src="../images/abt-2.jpg" alt="" /></a>
                    <h4><a >Cras dolor ligula</a></h4>
                    <p>Phasellus auctor vulputate egestas. Nulla facilisi. Cras dolor ligula, pharetra vitae efficitur ac, tempus vitae nisl. Aliquam erat volutpat. </p>
                </div>
            </div>
            <div class="col-md-4 abt-shoe-left">
                <div class="abt-one">
                    <a ><img src="../images/abt-3.jpg" alt="" /></a>
                    <h4><a >Cras dolor ligula</a></h4>
                    <p>Phasellus auctor vulputate egestas. Nulla facilisi. Cras dolor ligula, pharetra vitae efficitur ac, tempus vitae nisl. Aliquam erat volutpat. </p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>


<?php
include("../layout/footer.php");
?>
