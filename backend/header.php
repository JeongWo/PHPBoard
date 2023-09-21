<?php
require_once "connect.php";
session_start();
if(isset($_SESSION['userid'])) {
    echo $_SESSION['userid'];?>님 안녕하세요~<br/>
    <?php
    echo '<button onclick="location.href=\'./logout.php\'" id="btn-logout">로그아웃</button>';
}else{
    ?> <button id="btn-login" onclick="location.href='./login.php'" >로그인</button><br/>
    <?php
}
?>