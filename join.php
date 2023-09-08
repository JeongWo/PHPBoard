<!DOCTYPE>
<html>
    <head> 
        <meta charset='uft-8'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="test.css" />
    </head>
    <body>
    
    
    <form action='join_action.php' method='post' > 
    
    <div class="row mb-3">
      <label for="user_id" class="col-sm-2 col-form-label" >Id</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="id" id="user_id">
        <input type="hidden" name="decide_id" id="decide_id">
        <p><span id="decide" style='color:red;'>ID 중복 여부를 확인해주세요.</span>
        <input type="button" id="check_button" value="확인하기" onclick="checkid();" class="btn btn-dark" />
      </div>
    </div>
    
    <div class="row mb-3">
      <label for="pw" class="col-sm-2 col-form-label" >Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="pw" id="pw">
      </div>
    </div>
    
    <div class="row mb-3">
      <label for="email" class="col-sm-2 col-form-label" >Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" id="email">
      </div>
    </div>
    
    <fieldset class="row mb-3">
      </div>
      <button type="submit" id="join_button" class="btn btn-dark">회원가입</button>
    </form>

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