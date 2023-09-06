<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <div class="container">
        <div class="form-container" id="board-form">
            <?php
            require "connect.php";
            session_start();
            if(isset($_SESSION['userid'])) {
                echo $_SESSION['userid'];
                ?><br/>
                <?php
                echo '<button onclick="location.href=\'./logout.php\'">로그아웃</button>';
            }else{
                ?> <button  onclick="location.href='./login.php'" align="center">Login</button><br/>
                <?php
            }
            ?>
            <h1 style="color: #b38bff;">게시판</h1>

            <form method="get" action="search_action.php" class="d-flex">
                <div class="flex-grow-2">
                    <select class="form-select" aria-label="Select search option" name="search_option">
                        <option selected>선택</option>
                        <option value="t">제목</option>
                        <option value="w">작성자</option>
                        <option value="tw">제목+내용</option>
                    </select>
                </div>
        </br>
                <div class="flex-grow-3">
                    <input type="text" class="form-control" name="search" placeholder="검색어를 입력하세요" />
                </div>
                <div class="flex-grow-2">
                    <button class="s_button" type="submit">Search</button>
                </div>
            </form>

            <table class="table table-custom-primary table-striped mt-3">
    <thead>
        <tr class="table-custom-primary">
            <th class="table-custom-primary" width="150" align="center">번호</th>
            <th class="table-custom-primary" width="500" align="center">제목</th>
            <th class="table-custom-primary" width="200" align="center">작성자</th>
            <th class="table-custom-primary" width="250" align="center">날짜</th>
            <th class="table-custom-primary" width="150" align="center">조회수</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM board ORDER BY number DESC";
        $result = mysqli_query($connect, $query);
        $total_rows = mysqli_num_rows($result);
        $row_number = $total_rows;
        $is_even_row = true;
        while($rows = mysqli_fetch_array($result)){
            $row_class = $is_even_row ? 'table-custom-light' : 'table-custom-primary';
        ?>    
        <tr class="<?php echo $row_class; ?>">
            <td class="<?php echo $row_class; ?>" align="center"><?=$row_number?></td>
            <td class="<?php echo $row_class; ?>" align="center"><a href="view.php?number=<?=$rows['number']?>"><?=$rows['title']?></a></td>
            <td class="<?php echo $row_class; ?>" align="center"><?=$rows['id']?></td>
            <td class="<?php echo $row_class; ?>" align="center"><?=substr($rows['date'], 0, 10)?></td>
            <td class="<?php echo $row_class; ?>" align="center"><?=$rows['hit']?></td> 
        </tr>
        <?php
            $is_even_row = !$is_even_row;
            $row_number--;
        }
        ?>
    </tbody>
</table>
            <div class="text-center">
                <button onclick="location.href='./write.php'">write Post</button>
            </div>
        </div>
    </div>
</body>
</html>