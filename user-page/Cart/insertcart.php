<?php
session_start();
require_once "../../admin/connect.php";
if(isset($_GET['id']) && $_GET['id'] != null)
{
    $id = $_GET['id'];
}
$sql= "SELECT *FROM category WHERE id=$id";
$result = $conn->query($sql);
$row=$result->fetch_assoc();


if($row)
{
    if(isset($_SESSION['cart']))
    {
        if(isset($_SESSION['cart'][$id]))
        {
            $_SESSION['cart'][$id]['qty'] +=1;
        }
        else
        {
            $_SESSION['cart'][$id]['qty'] = 1;

        }
        $_SESSION['cart'][$id]['name'] = $row['name'];
        $_SESSION['cart'][$id]['image'] = $row['image'];
        $_SESSION['cart'][$id]['price'] = $row['price'];
        header("Location:../userpage.php");

    }
    else
    {
        $_SESSION['cart'][$id]['qty'] = 1;
        $_SESSION['cart'][$id]['name'] = $row['name'];
        $_SESSION['cart'][$id]['image'] = $row['image'];
        $_SESSION['cart'][$id]['price'] = $row['price'];



        header("Location:../userpage.php");
    }

}





