<?php
    require_once "connect.php";

    $id = $_POST['id_find'];

    $sql = "SELECT pw FROM member WHERE id='$id'";
    $result = mysqli_query($connect,$sql);

    if($row = mysqli_fetch_assoc($result)){
        $password = $row['pw'];
        echo " $id 님의 비밀번호는 $password 입니다. ";
        } else {
        echo "아이디가 틀렸습니다.";
        }
            mysqli_close($connect);
?>





