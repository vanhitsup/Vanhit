
<?php
session_start();
$_SESSION['cart'];
if(isset($_POST['btnupdate'])){
    foreach ($_POST['qty'] as $key=>$value)
    {
        $_SESSION['cart'][$key]['qty']=$value;
    }
}
header("Location: viewcart.php");