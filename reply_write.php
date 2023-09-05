<?php
require_once "connect.php";
session_start();
$board_number = $_POST['board_number'];
$parent_comment_number = $_POST['parent_comment_number'];
$id = $_POST['id'];
$content = $_POST['content'];
$date = date("Y-m-d H:i:s");

$query = "INSERT INTO comment_reply (parent_comment_number, board_number, id, content, date) VALUES ('$parent_comment_number', '$board_number', '$id', '$content', '$date')";
mysqli_query($connect, $query);

header("Location: view.php?number=$board_number");


?>