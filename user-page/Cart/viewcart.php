<?php
session_start();
require_once "../../admin/connect.php";
$sql= "SELECT *FROM category";
$result = $conn->query($sql);
$SUM=0;
if(!isset($_SESSION['cart'])|| count($_SESSION['cart']) == 0)
{
    echo "<script> alert('không có sản phẩm trong giỏ hàng');location.href='../userpage.php'</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../../resources/detail/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<div class="headerpage" style="background-color:#4e73df;height: 60px">
    <div class="header-info">

    </div>
</div>
<div class="clearfix">
</div>

<!-- body-->
<h2 style="text-align: center;margin:50px 50px">Thông tin giỏ hàng</h2>

<div class="container" style="margin: 0 0 30px 80px">
    <form action="" method="POST">
    <table class="table" border="1">

        <thead>
        <tr>
            <th scope="col" style="text-align: center" width="80px">STT</th>
            <th scope="col" style="text-align: center" width="300px">Tên sản phẩm</th>
            <th scope="col" style="text-align: center">Số lượng</th>
            <th scope="col" style="text-align: center">Hình ảnh</th>
            <th scope="col" style="text-align: center">Giá</th>
            <th scope="col" style="text-align: center" width="80px">Xóa</th>
        </tr>
        </thead>
        <?php $stt= 1; foreach ($_SESSION['cart'] as $key=> $value): ?>
        <tbody>
        <tr>
            <td style="text-align: center" width="80px"><?php echo $stt?></td>
            <td style="text-align: center" width="300px"><?php echo $value['name']?></td>
            <td style="text-align: center" width="100px" >
                <input type="number" class="form-control" name="qty" value="<?php echo $value['qty']?>">
            </td>
            <td style="text-align: center">
                <img style="width: 50px; height: 50px" src="http://localhost/PhamTranVietAnh_1019E_SKDA/resources/upload/<?php echo $value["image"] ?>">

            </td>
            <td style="text-align: center"><?php echo number_format($value['price'])." đ"?></td>

            <td width="80px">
                <a href="deletedcart.php?key=<?php echo $key ?>" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
        <?php $SUM+=( $value['price']* $value['qty']); $_SESSION['tongtien']=$SUM;$_SESSION['price']=$value['price']; $_SESSION['qty']= $value['qty']?>
        <?php $stt ++;endforeach; ?>
        </tbody>
    </table>
    </form>
</div>



<div class="update" style="margin: -10px 0 30px 200px">
    <a href="../userpage.php"> <button type="button" class="btn btn-success">Tiếp tục mua hàng</button></a>
</div>

<div class="list-group" style="width: 300px;margin: -60px 0 30px 900px">
    <a href="#" class="list-group-item list-group-item-action active" style="text-align: center">
       Thanh toán đơn hàng
    </a>
    <a href="#" class="list-group-item list-group-item-action">Thuế VAT: <?php echo"10%"?></a>
    <a href="#" class="list-group-item list-group-item-action">Tổng tiền =

        <?php  echo number_format($_SESSION['tongtien']*0.1+$_SESSION['tongtien']) ." "."VNĐ"?>
    </a>
</div>
<div class="" style="margin-bottom: 20px">
    <a href="pay.php" style="margin:-30px 0 60px 990px"> <button type="button" class="btn btn-success">Thanh toán</button></a>
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
</body>
</html>