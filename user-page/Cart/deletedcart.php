<?php
session_start();

$id= (int)$_GET['id'];
echo"<pre>";

//Xóa sản phẩm theo ID
unset($_SESSION['cart2'][$id]);
header("location: viewcart.php");

