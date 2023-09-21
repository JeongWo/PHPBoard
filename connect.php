<?php
error_reporting(1);
ini_set("display_errors", 1);

$connect = mysqli_connect('localhost','root','abcd123!','board');

if(mysqli_error($connect)){
    echo "mysql 접속중 오류가 발생했습니다.";
    echo mysqli_connect_error();
}
  
?> 