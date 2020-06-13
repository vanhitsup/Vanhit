<?php
session_start();


// destroy the session

session_destroy();

header("Location: ../user-page/indexviews.php");
exit;
?>