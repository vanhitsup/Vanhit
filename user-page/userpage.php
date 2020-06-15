<?php
include_once "../admin/connect.php";
$sql = "SELECT * FROM category";
$result = $conn -> query($sql);
 session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VietanhIts.com</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="../resources/views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../resources/views/css/shop-homepage.css" rel="stylesheet">
    <style type="text/css">
      .header{
            height: 70px;
         background-color: #4e73df;
          margin-top: -56px;
        }
        .header .contact1{
            color: white;
            text-decoration: none;
        }
        .search{
            margin-top: 8px;
            margin-left: 60px;
        }
      .input {
          outline: none;
      }
     .input[type=search] {
          -webkit-appearance: textfield;
          -webkit-box-sizing: content-box;
          font-family: inherit;
          font-size: 100%;
      }
      .input::-webkit-search-decoration,
      .input::-webkit-search-cancel-button {
          display: none;
      }


      .input[type=search] {
          background: #ededed url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
          border: solid 1px #ccc;
          padding: 9px 10px 9px 32px;
          width: 55px;

          -webkit-border-radius: 10em;
          -moz-border-radius: 10em;
          border-radius: 10em;

          -webkit-transition: all .5s;
          -moz-transition: all .5s;
          transition: all .5s;
      }
      .input[type=search]:focus {
          width: 150px;
          background-color: #fff;
          border-color: #66CC75;

          -webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
          -moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
          box-shadow: 0 0 5px rgba(109,207,246,.5);
      }


      .input:-moz-placeholder {
          color: #999;
      }
      .input::-webkit-input-placeholder {
          color: #999;
      }
        .login-user{
            margin: -30px 0 0 1000px;
        }
    </style>
</head>
<body>

<!-- Header-->
<nav>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 contact " style="margin-top: 20px">
                    <a href="#" class="contact1" style="cursor: pointer" >-Contact <i class="fas fa-phone"></i>+84.854.572.098</a>
                </div>

                <div class="col-md-4 search" >
                    <form>
                        <input class="input" type="search" placeholder="Search">
                    </form>

                </div>
                <div class="col-md-4 login-user"  style="color: white">
                    <i class="far fa-user"></i>
                    <a style="margin-right: 10px">
                        <?php if(isset($_SESSION["fullname"])):?>
                            <?php echo $_SESSION["fullname"]?>
                        <?php endif;?>
                    </a>
                   <a href="../login/logout.php"><button class="btn btn-success btn-sm">Logout</button></a>
                </div>
            </div>
        </div>
    </div>
</nav>




<div class="logo" style="height: 100px;margin:10px 0 0 0">
    <img src="../resources/VietanhITs.com.png" style="height: 150px; margin: 13px 500px" >
</div>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid"src="../resources/views/3005_Thng-6-comeback-_800x300.png" alt="First slide" style="width: 1110px;height: 280px">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../resources/views/0106_800x300.png"  alt="Second slide"  style="width: 1110px; height: 280px">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../resources/views/0603-MSI-tintuc.png" alt="Third slide"  style="width: 1110px; height: 280px">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row">
                <?php foreach ($result as $key=>$item) {?>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top"  src="http://localhost/Project-ITPLus_Final-master/resources/upload/<?php echo $item["image"] ?>" style="height: 185px"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="viewdetail.php?id=<?php echo $item["id"]?>"><?php echo $item["name"] ?></a>
                                </h4>
                                <h5><?php echo number_format($item["price"]) ."đ" ?></h5>
                                <ul>
                                    <li><p class="card-text"><?php echo $item["note"] ?></p></li>
                                    <li><p class="card-text"><?php echo $item["harddisk"] ?></p></li>
                                    <li><p class="card-text"><?php echo $item["weight"] ?></p></li>

                                </ul>

                            </div>
                            <div class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<div class="clearfix">
</div>
<div class="footer" style="margin-bottom: -30px;background-color:#4e73df">
    <div class="footer-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4"  style="color: white">
                    <h5 style="font-weight: bold;margin-top: 10px">   Về chúng tôi</h5>
                    <hr>
                    <p>Luôn đi đầu trong lĩnh vực về thiết bị Laptop. Chúng tôi chuyên cung cấp các loại Laptop phù hợp với nhu cầu người sử dụng
                        . Luôn cung cấp các loại Laptop đẹp - chất lượng.
                    </p>
                </div>

                <div class="col-md-4" style="color: white;margin-top: 50px">
                    <h5> Copyright © 2020. by VietAnhITs.com</h5>
                </div>

                <div class="col-md-4" style="text-align: center;color: white">
                    <h5  style="font-weight: bold;margin-top: 10px">Liên hệ</h5>
                    <hr>
                    <div class="icon" style="font-size: 20px">
                        <div class="fb" style="margin:0 0 10px 8px">
                            <a style="margin-right: 10px"><i class="fab fa-facebook"></i></a> Facebook
                        </div>
                        <div class="ytb"  style="margin:0 0 10px -8px">
                            <a style="margin-right: 10px"><i class="fab fa-youtube"></i></a>Youtube
                        </div>
                        <div class="ig"  style="margin:0 0 0 4px">
                            <a style="margin-right: 10px"><i class="fab fa-instagram"></i></a>Instagram
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="../resources/views/vendor/jquery/jquery.min.js"></script>
<script src="../resources/views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
