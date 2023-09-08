<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="log_in.css" />
</head>    

<body>
    <div class="container">
    <div class="form-container" id="login-form">
    <h1>비밀번호 찾기</h1>
        <form action='find_pw_action.php' method='post'>
        <label for="id">ID</label>
        <input type="text" id="id_find" name="id_find" type="text" placeholder="ID를 입력해주세요." />
        <button type="submit">찾기</button>
        </form>
</div>
</div>
</body>
</html>
