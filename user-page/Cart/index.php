
<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="../../resources/detail/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<div class="headerpage" style="background-color:#4e73df;height: 60px">
    <div class="header-info">
        aaaaaaaaaaaa
    </div>
</div>
<div class="clearfix">
</div>

<!-- body-->
<h3>Thông tin giỏ hàng</h3>

<?php
if(isset($_SESSION['cart2'])&&$_SESSION['cart2']!=null) {
    echo"<form action='update.php' method='post'>";
    echo"<table border='1' width='600'>";
    echo"<tr>";
    echo"<td>Tên sản phẩm</td>";
    echo"<td>Số lượng</td>";
    echo"<td>Giá</td>";
    echo"<td>Thành tiền</td>";
    echo"<td>Xóa</td>";
    foreach ($_SESSION['cart2']as $list){
        echo"<tr>";
        echo"<td>".$list['name']."</td>";
        echo"<td><input type='text' name='qty[".$list['id']."]' value='".$list['qty']."' ></td>";
        //name='qty[]' khi lấy $_POST của qty thì mình sẽ lấy ra 1 mảng có id là khóa

        echo"<td>".number_format($list['price'])."đ"."</td>";
        echo"<td>".number_format($list['qty']*$list['price'])."đ"."</td>";
        echo"<td>"."<a href='deletecart.php?id=".$list['id']."'>Xóa</a>"."</td>";
        echo"</tr>";

    }

    echo"</table>
    <p align='right' style='width: 600px'>
        <input type='submit' value='update' name='btnupdate'>    
    </p>
    ";
    echo"</form>";
}
?>


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