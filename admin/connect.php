<?php

$host = "localhost";
$user = "root";
$password = "";
$dbName = "projectitplus";

$conn = new mysqli($host, $user, $password, $dbName);
if ($conn -> connect_errno) {
    echo "Lỗi kết nối tới cơ sở dữ liệu " . $conn -> connect_error;
    exit();
}
?>
