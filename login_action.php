<?php

error_reporting( E_ALL );
ini_set( "display_errors", 1 );

session_start();
require "connect.php";

$id=$_POST['id'];
$pw=$_POST['pw'];

$query = "SELECT * FROM member WHERE id='$id' and pw='$pw'";
$result = mysqli_query($connect,$query);

if(mysqli_num_rows($result)==1) {
        $row=mysqli_fetch_assoc($result);
        if($row['pw']==$pw){
            $_SESSION['userid']=$id;
            if(isset($_SESSION['userid'])){
                ?> <script>
                    alert("로그인 되었습니다.");
                    location.replace("./main.php");
                    </script>
                    <?php
            }else{
        echo "seesion fail";
            }
}else{
    ?> <script>
        alert("1아이디 혹은 비밀번호가 잘못되었습니다.");
        history.back();
    </script>
<?php
    }
        }else{
    ?> <script>
        alert("2아이디 혹은 비밀번호가 잘못되었습니다.");
        history.back();
    </script>
    <?php
        }
    ?>