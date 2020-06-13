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

    <title>VietAnhIts.com</title>

    <link href="../resources/views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../resources/views/css/shop-homepage.css" rel="stylesheet">

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="userpage.php" style="font-weight: bold;font-size:30px;color:white">VietAnhITs.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php if(isset($_SESSION["fullname"])):?>
                    <p style="color: white;margin-top: 8px">Xin chào: <?php echo $_SESSION["fullname"]?></p>
                    <?php endif;?>
                </li>

                <li class="nav-item">
                    <a class="nav-link" ></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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
                        <img class="d-block img-fluid" src="../resources/views/0106_800x300.png" alt="First slide" style="width: 1110px;height: 280px">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="../resources/views/3005_Thng-6-comeback-_800x300.png" alt="Second slide"  style="width: 1110px; height: 280px">
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
                                <h5><?php echo $item["price"] ?></h5>
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
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; 2020 by PhamTranVietAnh</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="../resources/views/vendor/jquery/jquery.min.js"></script>
<script src="../resources/views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
