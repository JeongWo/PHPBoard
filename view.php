<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>
body {
  font-family: "Open Sans", sans-serif;
  background-color: #333;
}
.border {
    background-color: white;
}
h1.text-center {
    color: #b38bff;
}
h3.text-center {
    color: #b38bff;
}
a.btn {
    background: white;
}
.border.p {
    background: #333;
}
#btn-home {
  padding: 6px;
  background-color: #b38bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 20px;
  transition: background-color 0.2s ease-in-out;
}

#btn-home:hover {
  background-color: #8c5fb2;
}
#btn-modify {
  padding: 6px;
  background-color: #b38bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 20px;
  transition: background-color 0.2s ease-in-out;
}

#btn-modify:hover {
  background-color: #8c5fb2;
}
#btn-delete {
  padding: 6px;
  background-color: #b38bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 20px;
  transition: background-color 0.2s ease-in-out;
}

#btn-delete:hover {
  background-color: #8c5fb2;
}

#btn-login {
  padding: 6px;
  background-color: #b38bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 20px;
  transition: background-color 0.2s ease-in-out;
}

#btn-login:hover {
  background-color: #8c5fb2;
}

#btn-comment {
  padding: 5px;
  background-color: #b38bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 15px;
  transition: background-color 0.2s ease-in-out;
}

#btn-comment:hover {
  background-color: #8c5fb2;
}

#btn-c-delete {
  padding: 5px;
  background-color: #ff3333;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
  transition: background-color 0.2s ease-in-out;
}

#btn-c-delte:hover {
  background-color: #ff3333;
}

</style>
<body>

<?php
require_once "connect.php";

session_start();
$number = $_GET['number'];
$number = mysqli_real_escape_string($connect, $number);

$query = "SELECT * FROM board WHERE number='$number' ";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_array($result);

$update_query = "UPDATE board SET hit=hit + 1 WHERE number='$number'";
mysqli_query($connect, $update_query);
?>

<div class="container mt-4">
    <h1 class="text-center">제목 : </Title><?=$rows['title']?></h1>
    <div class="border p-3 mt-3">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="text-center bg-light p-2">작성자: <?=$rows['id']?></div>
            <div class="text-center bg-light p-2">조회수: <?=$rows['hit']?></div>
        </div>
        <hr>
        <p class="lead"><?=$rows['content']?></p>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <a href="./main.php" id="btn-home" align="center">🏠️</a> 
        <?php
        if(isset ($_SESSION['userid']) && $_SESSION['userid'] === $rows['id']){
            echo '<a href="./modify.php?number=' . $number . '&id=' . $_rows['id'] . '" id="btn-modify">수정</a>';
            echo '<a href="./board_delete.php?number=' . $number. '&id='. $_rows['id'] . '" id="btn-delete">삭제</a>';
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

<script>
    function deleteComment(comment_number) {
        if (confirm("Are you sure you want to delete the comment?")) {
            window.location.href = "./comment_delete.php?number="+comment_number;
        }
    }

    function deleteReply(reply_number) {
        if (confirm("Are you sure you want to delete the comment?")) {
            window.location.href = "./reply_delete.php?number="+reply_number;
        }
    }
</script>

</body>
</html>