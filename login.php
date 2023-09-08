<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="log_in.css" />
     
</head>    

<body>
    <div class="container">
    <div class="form-container" id="login-form">
    <h1>로그인</h1>
        <form action='login_action.php' method='post'>

        <label for="id">ID</label> 
        <input type="text" name="id" id="id" placeholder="아이디"/>

        <label for="pw">PW</label>
        <input type="password" name="pw" id="pw" placeholder="비밀번호"/>
           
        <button type="submit">로그인</button>
        </form>
        <div class="center-buttons">
        <button id="join" onclick="location.href='./join.php'">회원가입</button>
        <button id="find_pw" onclick="location.href='./find_pw.php'">비밀번호찾기</button>
        </div>
    </div>
    </div>
</body>
</html>