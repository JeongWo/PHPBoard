<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="view.css">
</head>

<body>

<?php
require_once "connect.php";

session_start();

$number = $_GET['number'];
$number = mysqli_real_escape_string($connect, $number);

$query = "SELECT * FROM board WHERE number= $number";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_array($result);

$update_query = "UPDATE board SET hit=hit + 1 WHERE number= $number";
mysqli_query($connect, $update_query);

$file_name = basename($rows['images']);

$image_path = "/uploads/" . $file_name;

?>

<div class="container">
    <div class="form-container">
        <h1 class="text-center"> 제목 : </Title><?=$rows['title']?></h1>
        <div class="border p-3 mt-3">
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-center bg-light p-2">작성자: <?=$rows['id']?></div>
                <div class="text-center bg-light p-2">조회수: <?=$rows['hit']?></div>
            </div>
            <hr>
        <div>
        <?php 
            if(isset($image_path) && !empty($image_path)){?>
            <img src="<?=$image_path?>" width="100%" height="auto">
        <?php 
        } 
        ?>
        </div>

        <p class="lead"><?=$rows['content']?></p>
    </div>
    
    <div class="d-flex justify-content-center mt-4">
        <a href="./index.php" id="btn-home" align="center">🏠️</a> 
        <?php
        if(isset ($_SESSION['userid']) && $_SESSION['userid'] === $rows['id']){
            echo '<a href="./modify.php?number=' . $number . '&id=' . $_rows['id'] . '" id="btn-modify"> 수정 </a>';
            echo '<a href="./board_delete.php?number=' . $number. '&id='. $_rows['id'] . '" id="btn-delete"> 삭제 </a>';
        }
        ?>
    </div>

    <div class="mt-5">
    <div class="d-flex justify-content-between">
        <h3 class="text-center">댓글</h3>
                <?php if (isset($_SESSION['userid'])) { ?>
             
                <?php } else { ?>
            <button id="btn-login" onclick="location.href='./login.php'">로그인</button>
        <?php } ?>
    </div>

        <?php
        $sql = "SELECT * FROM comment WHERE board_number='$number' ORDER BY number DESC";
        $comment_result = mysqli_query($connect, $sql);
        while ($cl = mysqli_fetch_array($comment_result)) {
            $comment_number = $cl['number'];
        ?>

        <div class="border p-3 mt-3">
            <div class="d-flex justify-content-between">
                <div><b><?=$cl['id'];?></b> | <?=substr($cl['date'],0,10);?></div>
                <hr>
                <?php if (isset($_SESSION['userid']) && $_SESSION['userid'] == $cl['id']) { ?>
                    <button id="btn-c-delete" onclick="deleteComment(<?=$cl['number']?>)">삭제</button>
                <?php } ?>
            </div>
            <div class="mt-2"><?=$cl['content'];?></div>

         
            <?php
            $reply_query = "SELECT * FROM comment_reply WHERE parent_comment_number='$comment_number' ORDER BY reply_number DESC";
            $reply_result = mysqli_query($connect, $reply_query);
            while ($reply = mysqli_fetch_array($reply_result)) {
            ?>
                <div class="border p-3 mt-3">
                    <div class="d-flex justify-content-between">
                        <div><b><?=$reply['id'];?></b> | <?=substr($reply['date'],0,10);?></div>
                        <hr>
                        <?php if (isset($_SESSION['userid']) && $_SESSION['userid'] == $reply['id']) { ?>
                            <button id="btn-c-delete" onclick="deleteReply(<?=$reply['reply_number']?>)">삭제</button>
                        <?php } ?>
                    </div>
                    <div class="mt-2"><?=$reply['content'];?></div>
                </div>
            <?php } ?>

            
            <?php if (isset($_SESSION['userid'])) { ?>
                <div class="border p-3 mt-4"> 
                    <form action="reply_write.php" method="post">
                        <input type="hidden" name="board_number" value="<?=$number?>">
                        <input type="hidden" name="parent_comment_number" value="<?=$comment_number?>">
                        <input type="hidden" name="id" value="<?=$_SESSION['userid']?>">
                        <div class="mb-3">
                            <textarea class="form-control" name="content" rows="3" placeholder="댓글을 작성해주세요~"></textarea>
                        </div>
                        <button type="submit" id="btn-comment">댓글작성</button>
                    </form> 
                </div>
            <?php } ?>

        </div>
        <?php } ?>

        <?php if (isset($_SESSION['userid'])) { ?>
            <div class="border p-3 mt-4"> 
                <form action="comment_write.php" method="post">
                    <input type="hidden" name="board_number" value="<?=$number?>">
                    <input type="hidden" name="parent_comment_number" value="0">
                    <input type="hidden" name="id" value="<?=$_SESSION['userid']?>">
                    <div class="mb-3">
                        <textarea class="form-control" name="content" rows="3" placeholder="댓글을 작성해주세요~"></textarea>
                    </div>
                    <button type="submit" id="btn-comment">댓글작성</button>
                </form> 
            </div>
        <?php } ?>
    </div>
</div>
        </div>

<script>
    function deleteComment(comment_number) {
        if (confirm("댓글을 삭제하시겠습니까?")) {
            window.location.href = "./comment_delete.php?number="+comment_number;
        }
    }

    function deleteReply(reply_number) {
        if (confirm("댓글을 삭제하시겠습니까?")) {
            window.location.href = "./reply_delete.php?number="+reply_number;
        }
    }
</script>

</body>
</html>