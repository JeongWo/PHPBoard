<?php

require_once "connect.php";

$id=$_POST['decide_id'];
$pw=$_POST['pw']; 
$pw_check=$_POST['pw_check']; 
$email=$_POST['email'];

function passwordCheck($pw,$pw_check)
{
    if (10 > strlen($pw) && strlen($pw) < 20) {
        return array(false, "비밀번호는 최소 10자 ~ 최대 20자로 입력해주세요.");
    }

    if (preg_match("/\s/", $pw)) {
        return array(false, "비밀번호에 공백을 포함할 수 없습니다.");
    }

    if (!preg_match('/[0-9]/', $pw) || !preg_match('/[a-z]/', $pw) || !preg_match("/[\!\@\#\$\%\^\&\*]/", $pw)) {
        return array(false, "비밀번호에는 영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
    }

    if ($pw != $pw_check) {
        return array(false, "비밀번호가 같지 않습니다.");
    }

    return array(true);
}

if (empty($id) || empty($pw) || empty($email)) {
    ?>
    <script>
    alert('기입하지 않은 정보가 있습니다.');
    location.replace('../join.html');
    </script>
    <?php
    exit;
}

$checkResult = passwordCheck($pw, $pw_check);
$isValid = $checkResult[0]; 
$errorMessage = $checkResult[1]; 

list($isValid, $errorMessage) = passwordCheck($pw, $pw_check);

if (!$isValid) {
    ?>
    <script>
    alert('<?php echo $errorMessage; ?>');
    location.replace('./join.html');
    </script>
    <?php
    exit;
}

$date = date('Y-m-d H:i:s');
$query = " INSERT INTO member(id, pw, email, date, permit, pw_check) VALUES ('$id','$pw','$email','$date',0, '$pw_check')";

$result = $connect->query($query);
if($result) {
    ?> 
    <script>
    alert("회원가입 되었습니다.");
    location.replace("./login.html");
    </script>

<?php
} else {
    ?>
    <script>
    alert("회원가입에 실패했습니다.");
    </script>
<?php
}
mysqli_close($connect);
?>