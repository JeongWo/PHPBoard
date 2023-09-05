<?php
require "connect.php";
$board_number = $_POST['board_number'];
$id = $_POST['id'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');

$query = "INSERT INTO comment (board_number, id, content, date, parent_number) VALUES ('$board_number', '$id', '$content', '$date', 0)";
$result = mysqli_query($connect, $query);
if ($result) {
    echo "<script>
        alert('댓글이 작성되었습니다.');
        location.href = document.referrer; 
        </script>";
} else {
    echo "오류가 발생하였습니다.";
}
?>




