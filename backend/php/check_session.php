<?php
require_once "connect.php";

session_start();

$URL = "/PHPBoard/frontend/html/login.html";

if (!isset($_SESSION['userid'])) {
    echo "<script>alert('로그인이 필요합니다.'); 
    location.replace('$URL');</script>";
    exit;
}

$number = $_GET['number'];
$number = mysqli_real_escape_string($connect, $number);

$query = "SELECT * FROM board WHERE number= $number";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_array($result);

$update_query = "UPDATE board SET hit=hit + 1 WHERE number= $number";
mysqli_query($connect, $update_query);

$file_name = basename($rows['images']);

$image_path = "/uploads/" . $file_name;

?>