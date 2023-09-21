<?php
require_once "connect.php";
 
$id = $_GET['userid'];

$sql="SELECT * FROM member WHERE id='$id'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_array($result);

if(!$row){
    echo "<span style= 'color:blue;'>$id</span> 는 사용 가능한 아이디 입니다.";
    ?>
    
    <p><input type="button" value="이 ID 사용" onclick="opener.decide(); window.close();"></p>
    
    <?php
    } else {
    echo "<span style='color:red;'>$id</span> 는 중복된 아이디 입니다.";
    ?>
    
    <p><input type="button" value="다른 ID 사용" onclick="opener.change(); window.close();"></p>
    
    <?php
    }
    mysqli_close($connect);
?>