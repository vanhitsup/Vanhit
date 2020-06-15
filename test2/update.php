<?php
session_start();
$_SESSION['cart2'];
if(isset($_POST['btnupdate'])){
   foreach ($_POST['qty'] as $key=>$val)
   {
       $_SESSION['cart2'][$key]['qty']=$val;
   }
}
header("Location: viewcart.php");