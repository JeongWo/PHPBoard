<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="test.css">

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

    <div class="container mt-4">
        <form action="write_action.php" method="post">
            <table class="table table-bordered" align="center" width="700">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th colspan="2" class="text-center">글쓰기</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>작성자</td>
                        <td><input type="hidden" name="name" value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?></td>
                    </tr>
                    <tr>
                        <td>제목</td>
                        <td><input type="text" name="title" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>내용</td>
                        <td><textarea class="form-control" name="content" rows="10"></textarea></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center mt-3">
                <button type="submit" >작성</button>
            </div>
        </form>
    </div>

</body>
</html>