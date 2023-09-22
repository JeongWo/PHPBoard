<?php
require_once "connect.php";
session_start();

$board_number = $_POST['board_number'];
$parent_comment_number = $_POST['parent_comment_number'];
$id = $_POST['id'];
$content = $_POST['content'];
$date = date("Y-m-d H:i:s");

$query = "INSERT INTO comment_reply (parent_comment_number, board_number, id, content, date) 
          VALUES ('$parent_comment_number', '$board_number', '$id', '$content', '$date')";

if(mysqli_query($connect, $query)) {
    echo json_encode(['board_number' => $board_number]);
} else {
    echo json_encode(['error' => '댓글 작성 중 오류가 발생했습니다.']);
}

mysqli_close($connect);
?>