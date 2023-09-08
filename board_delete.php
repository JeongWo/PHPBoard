<?php
require "connect.php";
$URL = './index.php';

$number = $_GET['number'];

$query = " DELETE FROM board WHERE number='$number' ";    
$result = mysqli_query($connect,$query);


    if($result){
?>      <script>
            alert("<?="글이 삭제되었습니다."?>");
            location.replace("<?=$URL?>");
        </script>
<?php
    }else{
        echo "FAIL";
    }
    mysqli_close($connect);
    ?>
