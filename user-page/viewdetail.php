
<?php
// nạp file kết nối CSDL
include_once "../admin/connect.php";

$id = (int) $_GET["id"];
$sqlSelect = "SELECT * FROM category WHERE id=".$id;
$result = $conn -> query($sqlSelect);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
       VietanhITs.com
    </title>
    <link href="../resources/detail/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="../resources/detail/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/detail/css/flexslider.css" type="text/css" media="screen"/>
    <link href="../resources/detail/css/style.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="../resources/detail/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
    </script>
    <script src="../resources/detail/https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
    </script>
    <![endif]-->
</head>
<body>

<div class="headerpage" style="background-color:#4e73df;height: 60px">
    <div class="header-info">
    </div>
</div>




<!-- Body -->
<div class="clearfix">
</div>
<div class="container_fullwidth">

    <a href="userpage.php" style="margin-left: 100px"> <button type="button" class="btn btn-success">Quay lại trang chủ</button></a>

    <h4 style="text-align: center;font-weight: bold">Thông tin chi tiết sản phẩm : Laptop <?php
        echo $row['name'];
        ?></h4>
    <div class="container">
        <div class="row">
            <div class="col-md-9" >
                <div class="products-details">
                    <div class="preview_image">
                        <div class="preview-small">
                            <img id="zoom_03" src="../resources/upload/<?php echo $row['image']?>" data-zoom-image="images/products/Large/products-01.jpg" alt="">
                        </div>
                        <div class="thum-image">
                            <ul id="gallery_01" class="prev-thum">
                                <li>
                                    <a href="#" data-image="../resources/upload/<?php echo $row['image']?>" data-zoom-image="images/products/Large/products-01.jpg">
                                        <img src="../resources/upload/<?php echo $row['image']?>" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-image="../resources/upload/<?php echo $row['image']?>" data-zoom-image="images/products/Large/products-02.jpg">
                                        <img src="../resources/upload/<?php echo $row['image']?>" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-image="../resources/upload/<?php echo $row['image']?>" data-zoom-image="images/products/Large/products-03.jpg">
                                        <img src="../resources/upload/<?php echo $row['image']?>" alt="">
                                    </a>
                                </li>

                            </ul>
                            <a class="control-left" id="thum-prev" href="javascript:void(0);">
                                <i class="fa fa-chevron-left">
                                </i>
                            </a>
                            <a class="control-right" id="thum-next" href="javascript:void(0);">
                                <i class="fa fa-chevron-right">
                                </i>
                            </a>
                        </div>
                    </div>
                    <div class="products-description">
                        <h5 class="name">
                            <?php
                              echo  "Laptop: ".$row['name'];
                            ?>
                        </h5>
                        <p>
                            <img alt="" src="../resources/detail/images/star.png">
                            <a class="review_num" href="#">
                                02 Review(s)
                            </a>
                        </p>
                        <p>

                            <span class=" light-red">
                     <?php echo "Màu sắc: ".$row['note'] ?>
                    </span>
                        </p>
                        <p>

                        </p>
                        <hr class="border">
                        <div class="price">
                            <span class="new_price">
                            <?php echo "Giá bán :"." ". (number_format($row['price']) ."đ" )?>
                    </span>

                        </div>
                        <hr class="border">
                        <div class="wided">

                            <div class="button_group">

                                <button class="button compare">
                                    <i class="fa fa-exchange">
                                    </i>
                                </button>
                                <button class="button favorite">
                                    <i class="fa fa-heart-o">
                                    </i>
                                </button>
                                <button class="button favorite">
                                    <i class="fa fa-envelope-o">
                                    </i>
                                </button>
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>
                        <hr class="border">
                        <img src="../resources/detail/images/share.png" alt="" class="pull-right">
                    </div>
                </div>
                <div class="clearfix">
                </div>
                <div class="tab-box">
                    <div id="tabnav">
                        <ul>
                            <li>
                                <a href="">
                                    Thông số kỹ thuật:
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content-wrap">
                        <div class="tab-content" id="Descraption">
                            <p >
                            <ul style="font-size: 18px;font-weight:bold">
                                <li style="margin-bottom: 8px">- <?php echo "Laptop: ".$row['name'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo "Hãng: ".$row['brand'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo "Màu sắc: ".$row['note'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo "Hệ điều hành: ".$row['configuration'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo "Card đồ họa: ".$row['screencard'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo "Ổ cứng: ".$row['harddisk'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo "CPU: ".$row['chipset'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo "Kích thước: ".$row['weight'] ?></li>
                            </ul>
                            </p>

                        </div>
                    </div>

                </div>
                <div class="clearfix">
                </div>
                <div id="productsDetails" class="hot-products">
                    <h3 class="title">
                        <strong>
                            Hot
                        </strong>
                        Products
                    </h3>
                    <div class="control">
                        <a id="prev_hot" class="prev" href="#">
                            &lt;
                        </a>
                        <a id="next_hot" class="next" href="#">
                            &gt;
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix">
        </div>
</div>
<div class="clearfix">
</div>
<div class="footer" style="margin-bottom: -30px;background-color:#4e73df">
    <div class="footer-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4"  style="color: white">
                <h5 style="font-weight: bold">   Về chúng tôi</h5>
                    <hr>
                    <p>Luôn đi đầu trong lĩnh vực về thiết bị Laptop. Chúng tôi chuyên cung cấp các loại Laptop phù hợp với nhu cầu người sử dụng
                    . Luôn cung cấp các loại Laptop đẹp - chất lượng.
                    </p>
                </div>

                <div class="col-md-4" style="color: white">
                   <h5> © 2020 VietAnhITs.com. All rights reserved.</h5>
                </div>

                <div class="col-md-4" style="text-align: center;color: white">
                    <h5  style="font-weight: bold">Liên hệ</h5>
                    <hr>
                    <div class="icon" style="font-size: 20px">
                       <div class="fb" style="margin:0 0 10px 8px">
                           <a style="margin-right: 10px"><i class="fab fa-facebook" style="color: white"></i></a> Facebook
                       </div>
                        <div class="ytb"  style="margin:0 0 10px -8px">
                            <a style="margin-right: 10px"><i class="fab fa-youtube" style="color: white"></i></a>Youtube
                        </div>
                        <div class="ig"  style="margin:0 0 0 4px">
                            <a style="margin-right: 10px"><i class="fab fa-instagram" style="color: white"></i></a>Instagram
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript==================================================-->
<script type="text/javascript" src="../resources/detail/js/jquery-1.10.2.min.js">
</script>
<script type="text/javascript" src="../resources/detail/js/bootstrap.min.js">
</script>
<script defer src="../resources/detail/js/jquery.flexslider.js">
</script>
<script type="text/javascript" src="../resources/detail/js/jquery.carouFredSel-6.2.1-packed.js">
</script>
<script type="text/javascript" src='../resources/detail/js/jquery.elevatezoom.js'>
</script>
<script type="text/javascript" src="../resources/detail/js/script.min.js" >
</script>
</body>
</html>