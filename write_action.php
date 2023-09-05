<?php

include "connect.php";

$number = $_GET['number'];
$id = $_POST['name'];
$pw = $_POST['pw'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');
$hit = $_POST['hit'];

$URL = './main.php';

$query = 
"INSERT INTO board(number,title,content,date,hit,id,password)
VALUES(null,'$title','$content',NOW(),0,'$id','$pw')";    
    $result = mysqli_query($connect,$query);
    if($result){
?>      <script>
            alert("<?="글이 등록되었습니다."?>");
            location.replace("<?=$URL?>");
        </script>
<?php
    }else{
        echo "FAIL";
    }
    mysqli_close($connect);
    ?>
