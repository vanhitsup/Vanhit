<?php
require_once "list.php";
session_start();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>Thông tin giỏ hàng</p>
//kiểm tra xem có sản phẩm trong giỏ không
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
</body>
</html>