
<?php
session_start();
require_once "list.php";
$idproduct=$_GET['id'];
echo $idproduct;
$newpr=array();
foreach ($product as $val ) {
    $newpr[$val['id']] = $val;

}
echo"<pre>";
print_r( $newpr[$idproduct]);
//

if(!isset($_SESSION['cart2'])||$_SESSION['cart2']==null ){
    $newpr[$idproduct]['qty']=1;
    $_SESSION['cart2'][$idproduct]=$newpr[$idproduct];
}
else{

    echo "Có sản phẩm ";
    echo "<br>";
//Cộng thêm 1 lần sản phẩm khi nó đã tồn tại
    if(array_key_exists($idproduct,$_SESSION['cart2'])){
        $_SESSION['cart2'][$idproduct]['qty']+=1;
        print_r($_SESSION['cart2']);
    }
    else{
        //thêm sản phẩm khi trong giỏ chưa có
        $newpr[$idproduct]['qty']=1;
        $_SESSION['cart2'][$idproduct]=$newpr[$idproduct];
    }
}
header("Location: index.php");
