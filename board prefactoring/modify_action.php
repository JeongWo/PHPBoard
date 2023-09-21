<?php
include "connect.php";
$number=$_POST['number'];
$title=$_POST['title'];
$content=$_POST['content'];
$date=date('Y-m-d H:i:s');
$query = "UPDATE board SET title='$title', content='$content', date='$date' WHERE number=$number";
$result = mysqli_query($connect,$query);
if($result) {
?>
        <script>
            alert("수정되었습니다.");
            location.replace("./view.php?number=<?=$number?>");
        </script>
        <?php }else{
            echo "실패했습니다.";
        }
?>