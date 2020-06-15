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
    <title>Document</title>
    <style type="text/css">
        ul{
            margin: 0;
            padding: 0;
            list-style: none;
        }
        li{
            width: 400px;
            border: 1px solid black;
            padding: 5p;
        }
    </style>
</head>
<body>
<?php
$total=0;
//Kiểm tra $_SESSION['cart'] có rỗng hay ko
if(isset($_SESSION['cart2'])&& $_SESSION['cart2']!=null){
    foreach ($_SESSION['cart2'] as $list){
        $total +=$list['qty'];
    }
}
?>
<?php
echo" Bạn đang có" .$total. " sản phẩm trong giỏ hàng";
echo "<br>";
echo "<a href='viewcart.php'>Sản phẩm trong giỏ</a> ";
?>
</body>
</html>
<?php
include_once "list.php";

echo "<ul>";
foreach ($product as $listproduct){
    echo "<li><h3>".$listproduct['name']."</h3>
            <p>Giá bán:".number_format($listproduct['price'],0)."</p>
            <p><a href='insertcart.php?id=".$listproduct['id']."'>Mua ngay</a></p>
</li>";
}
echo"</ul>";

?>
