
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="search_action.css">
    </head>

    <body>
    <div class="container">
    <div class="form-container" id="board-form">
    <?php
    require "connect.php";
    session_start();
    if(isset($_SESSION['userid'])) {
        echo $_SESSION['userid'];?>님 안녕하세요~
        <br/>
        <?php
        echo '<button onclick="location.href=\'./logout.php\'" id="btn-logout">로그아웃</button>';
        ?><br/>
        <?php
    }else{
        ?>  <button  onclick="location.href='./login.php'" align="center">로그인</button><br/>
        <?php 
        }
    ?>
<h1 style="color: #b38bff;">게시판</h1>

        <form method="get" action="search_action.php" class="d-flex">
            <div class="flex-row">
                <select class="form-select" aria-label="Select search option" name="search_option">
                    <option selected>선택</option>
                    <option value="t">제목</option>
                    <option value="w">작성자</option>
                    <option value="tw">제목+내용</option>
                </select>
            </div>
                    </br>
            <div class="flex-row">
                <input type="text" class="form-control" name="search" placeholder="검색어를 입력하세요" />
            </div>
            <div class="flex-row">
                <button class="s_button" type="submit">검색</button>
            </div>
        </form>

        <table class="table table-custom-primary table-striped mt-3">
        <thead>
    <tr class="table-light">
    <th class="table-custom-primary" width="150" align="center">번호</th>
            <th class="table-custom-primary" width="500" align="center">제목</th>
            <th class="table-custom-primary" width="200" align="center">작성자</th>
            <th class="table-custom-primary" width="250" align="center">날짜</th>
            <th class="table-custom-primary" width="150" align="center">조회수</th>
    </tr>
    </thead>
    <tbody>
    <?php

if(isset($_GET['search_option']) && isset($_GET['search'])) {
    $search_option = $_GET['search_option'];
    $search = $_GET['search'];
    
    if($search_option == "t") {
        $query = "SELECT * FROM board WHERE title LIKE '%$search'";
    } else if($search_option == "w") {
        $query = "SELECT * FROM board WHERE id LIKE '%$search%'";
    } else if($search_option == "tw") {
    $query = "SELECT * FROM board WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
}

$s_result = mysqli_query($connect,$query);
$query = "SELECT * FROM board ORDER BY number DESC";
$result = mysqli_query($connect,$query);
$total_rows = mysqli_num_rows($result);
$row_number = $total_rows;

if(mysqli_num_rows($s_result) > 0) {
    while($rows = mysqli_fetch_array($s_result)) {
    ?>
    <tr class="table-dark">
        <td class="table-dark" width = "50" align = "center"><?=$row_number?></td>
        <td class="table-dark" width = "500" align = "center"><a href = "view.php?number=<?=$rows['number']?>"><?=$rows['title']?></a></td>
        <td class="table-dark" width = "100" align="center"><?=$rows['id']?></td>
        <td class="table-dark" width = "200" align="center"><?=substr($rows['date'],0,10)?></td>
        <td class="table-dark" width = "50" align="center"><?=$rows['hit']?></td> 
    </tr>
    <?php
    $row_number--;
    }
}
} else {
    echo "검색 옵션과 검색어를 입력하세요.";
}
?>
</tbody>
    </table>
    <div class="text-center">
         <button onclick="location.href='./write.php'">작성</button>
    </div>
   
</body>
</html>