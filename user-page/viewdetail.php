
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
       VietAnhITs.com
    </title>
    <link href="../resources/detail/css/bootstrap.css" rel="stylesheet">
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

<div class="wrapper">
    <div class="header">
        <div class="container">
            <div class="row">

                <div class="clearfix">
                </div>
                <div class="header_bottom">
                    <ul class="option">
                        <li id="search" class="search">
                            <form>
                                <input class="search-submit" type="submit" value="">
                                <input class="search-input" placeholder="Enter your search term..." type="text" value="" name="search">
                            </form>
                        </li>
                        <li class="option-cart">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">
                      Toggle navigation
                    </span>
                            <span class="icon-bar">
                    </span>
                            <span class="icon-bar">
                    </span>
                            <span class="icon-bar">
                    </span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
    </div>

</div>
<div class="clearfix">
</div>
<div class="container_fullwidth">
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
                                echo $row['name'];
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
                     <?php echo $row['note'] ?>
                    </span>
                        </p>
                        <p>

                        </p>
                        <hr class="border">
                        <div class="price">
                            <span class="new_price">
                            <?php echo $row['price'] ?>
                    </span>

                        </div>
                        <hr class="border">
                        <div class="wided">
                            <div class="qty">
                                Qty &nbsp;&nbsp;:
                                <select>
                                    <option>
                                        1
                                    </option>
                                </select>
                            </div>
                            <div class="button_group">
                                <button class="button" >
                                    Add To Cart
                                </button>
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
                            <li>
                                <a href="">
                                    REVIEW
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    PRODUCT TAGS
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content-wrap">
                        <div class="tab-content" id="Descraption">
                            <p >
                            <ul style="font-size: 18px;font-weight:bold">
                                <li style="margin-bottom: 8px">- <?php echo $row['name'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo $row['brand'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo $row['note'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo $row['configuration'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo $row['screencard'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo $row['harddisk'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo $row['chipset'] ?></li>
                                <li style="margin-bottom: 8px">- <?php echo $row['weight'] ?></li>
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
<div class="footer">
    <div class="footer-info">

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