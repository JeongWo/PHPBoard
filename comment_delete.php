<?php
require_once "connect.php";

$comment_number = $_GET['number'];

$query = "DELETE FROM comment WHERE number='$comment_number'";
$result = mysqli_query($connect, $query);

if ($result) {
    echo "<script>
        alert('댓글이 삭제되었습니다.');
        window.location.href = document.referrer; 
        </script>";
} else {
    echo "오류가 발생하였습니다."; 
}




?>
