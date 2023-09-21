<?php
require_once "connect.php";

$reply_number = $_GET['number'];
$board_number = $_POST['board_number'];

$query = "DELETE FROM comment_reply WHERE reply_number='$reply_number'";
$result = mysqli_query($connect, $query);

if ($result) {
    echo "<script>
        alert('댓글이 삭제되었습니다.');
        location.href = document.referrer; 
        </script>";
} else {
    echo "오류가 발생하였습니다."; 
}

mysqli_close($connect);
?>