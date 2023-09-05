<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="log_in.css" />
     
</head>    

<body>
    <div class="container">
    <div class="form-container" id="login-form">
    <h1>Login</h1>
        <form action='login_action.php' method='post'>

        <label for="id">Username</label> 
        <input type="text" name="id" id="id" />

        <label for="pw">Password</label>
        <input type="password" name="pw" id="pw" />
           
        <button type="submit">Continue</button>
        </form>
        <div class="center-buttons">
        <button id="join" onclick="location.href='./join.php'">Create your account</button>
        <button id="find_pw" onclick="location.href='./find_pw.php'">Find your password?</button>
        </div>
    </div>
    </div>
</body>
</html>