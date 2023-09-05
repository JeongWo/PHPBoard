<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>

    <style>
        table{
            border-top: 1px solid #444444;
            border-collapse: collapse;
        }
        tr{
            border-bottom: 1px solid #444444;
            padding: 10px;
        }
        td{
            border-bottom: 1px solid #efefef;
            padding: 10px;
        }
        table .even{
            background: #efefef;
        }
        .text{
            text-align:center;
            padding-top:20px;
            color:#000000;
        }
        .text:hover{
            text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover {text-decoration : underline;}
    </style>
<body>
    <?php
    require "connect.php";
    
    session_start();
        
    if(isset($_SESSION['userid'])) {
        echo $_SESSION['userid'];?>님 안녕하세요
        <br/>
        <?php
        echo '<button class="btn btn-dark" onclick="location.href=\'./logout.php\'">로그아웃</button>';
        ?>
        <?php
    }else{
        ?> <button class="btn btn-dark" onclick="location.href='./login.php'">로그인</button>
        <br/>
    
    <?php }
    ?>

    <h2 align=center>게시판</h2>

    <table class="table table-success table-striped" align = center>
    <thead align = "center">
        
        <tr class="table-light">
            <td class="table-dark" width = "50" aligin="center">번호</td>
            <td class="table-dark" width = "500" aligin="center">제목</td>
            <td class="table-dark" width = "100" aligin="center">작성자</td>
            <td class="table-dark" width = "200" aligin="center">날짜</td>
            <td class="table-dark" width = "50" aligin="center">조회수</td>
        </tr>
        
    </thead>
    
    <form method="get" action="search_action.php">
        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="search_option">
            <option selected>선택</option>    
            <option value="t">제목</option>
            <option value="w">작성자</option>
            <option value="tw">제목+내용</option>
        </select>
        <input type="text" class="form-control" name="search" size="40"/>
        <button class="btn btn-dark" type="submit">검색</button>
    </form>
    
    <tbody>

        <?php
        
        $query = "SELECT * FROM board order by number desc";
        $result = mysqli_query($connect,$query);
        $total_rows = mysqli_num_rows($result);
        $row_number = $total_rows;
        
        while($rows = mysqli_fetch_array($result)){
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
            ?>
            
    </tbody>
    </table>
    <div class=text>
        <button class="btn btn-dark"><font style="cursor: hand"onClick="location.href='./write.php'">글쓰기</font></button>
    </div>
   
</body>
</html>