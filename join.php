<!DOCTYPE html>
<html>
    <head> 
        <meta charset='utf-8'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="join.css" />
    </head>

    <body>
    <div class = "container">
    <div class="form-container" id="board-form">
 
    <form action='join_action.php' method='post'> 
    
      <label for="user_id">아이디</label>
      <input type="text"  name="id" id="user_id">
      <input type="hidden" name="decide_id" id="decide_id">
    
      <div class = "id-check-btn">
      <label id="decide" style='color:red;'>중복 확인하기</label>
      <input type="button" id="check_button" value="중복확인" onclick="checkid();" />
      </div>
  
      <label for="pw" >비밀번호</label>
      <input type="password"  name="pw" id="pw">
  
      <label for="pw_check" >비밀번호 확인</label>
      <input type="password"  name="pw_check" id="pw_check">
   
      <label for="email" >Email</label>
      <input type="email" name="email" id="email">
   
    <button type="submit" id="join_button">회원가입</button>
      
    </form>

    </div>
    </div>
    
  <script>

  function checkid(){
    var userid = document.getElementById("user_id").value;
    if(userid) {
      var url = "id_check.php?userid="+userid;
      window.open(url,"chkid","width=400,height=200");
    }else{
          alert("아이디를 입력하세요.")
    }
        }

  function decide(){
    document.getElementById("decide").innerHTML = "<span style='color:red;'>ID 중복 여부를 확인해주세요. </span>";
    document.getElementById("decide_id").value = document.getElementById("user_id").value
    document.getElementById("user_id").disabled = true
    document.getElementById("join_button").disabled = false
    document.getElementById("check_button").value = "다른 ID로 변경"
    document.getElementById("check_button").setAttribute("onclick","change()")
        }

  function change(){
	  document.getElementById("decide").innerHTML = "<span style='color:red;'>ID 중복 여부를 확인해주세요.</span>"
	  document.getElementById("user_id").disabled = false
	  document.getElementById("user_id").value = ""
	  document.getElementById("join_button").disabled = true
	  document.getElementById("check_button").value = "ID 중복 검사"
	  document.getElementById("check_button").setAttribute("onclick", "checkid()")
        }
  </script>



  </body>
  </html>