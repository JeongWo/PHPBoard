<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="write.css">

</head>
<body>
<?php
        session_start();
        $URL = "./login.php";
        if (!isset($_SESSION['userid'])) {
            echo "<script>alert('로그인이 필요합니다.'); 
            location.replace('$URL');</script>";
            exit;
        }
    ?>

    <div class="container">
        <div class="form-container">
            
        <h1>게시판 생성</h1>

        <form action="write_action.php" method="post" enctype="multipart/form-data">

            <label align="center">작성자 : <input type="hidden" name="name" value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?></label>
                 
            <label align="center">제목</label>
            <input type="text" name="title" class="form-control">
                   
            <label align="center">사진 업로드</label>
            <input type="file" name="image" class="form-control">

            <label align="center">내용</label>
            <textarea class="form-control" name="content" rows="15"></textarea>
            
            <div class="text-center mt-3">
                <button type="submit" >생성</button>
            </div>
            
        </form>
        
        </div>
        
    </div>

</body>
</html>