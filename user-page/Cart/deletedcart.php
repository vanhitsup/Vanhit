<?php
session_start();

$id= (int)$_GET['key'];
echo"<pre>";

//Xóa sản phẩm theo ID
unset($_SESSION['cart'][$id]);
header("Location: viewcart.php");
