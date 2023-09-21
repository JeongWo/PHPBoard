<?php

require_once "connect.php";

$id_find = $_POST['id_find'];

$query = "SELECT * FROM member WHERE id='$id_find'";
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $password = $row['pw'];
    echo 
    "<script>
        alert('$id_find 님의 비밀번호는 $password 입니다.');
        location.href = './index.html'; 
    </script>";
} else {
    echo "아이디가 틀렸습니다.";
}

mysqli_close($connect);
?>