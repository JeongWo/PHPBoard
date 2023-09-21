<?php require_once "connect.php"; ?>

<label align="center">작성자 : <input type="hidden" name="name" value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?></label>
                 
<label align="center">제목</label>
<input type="text" name="title" class="form-control">
                   
<label align="center">사진 업로드</label>
<input type="file" id="image" name="image" class="form-control">

<label align="center">내용</label>
<textarea class="form-control" name="content" rows="15"></textarea>