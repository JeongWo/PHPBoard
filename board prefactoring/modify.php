<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="modify.css">
</head>

<body>

<?php
require "connect.php";
$id=$_GET['id'];
$number=$_GET['number'];
$query= "SELECT title, content, date, id FROM board WHERE number=$number";
$result=$connect->query($query);
$rows=mysqli_fetch_assoc($result);

$title=$rows['title'];
$content=$rows['content'];
$usrid=$rows['id'];

session_start();
$URL="./index.php";

if(!isset($_SESSION['userid'])) {
    ?> <script>
        alert("권한이 없습니다.");
        location.replace("<?=$URL?>");
    </script>
<?php }
else if($_SESSION['userid']==$usrid){
?>
<div class="container">
    <div class="form-container">

<h1>게시글 수정</h1>

<form action="modify_action.php" method="post" >

    <td bgcolor=white>
        <table class="table2">
           
                <label align="center"> 작성자 : <?=$_SESSION['userid']?> </label>
            
                <label align="center"> 제목</label>
                <input type="text" name="title" value=<?=$title?> >
          
                <label align="center"> 내용</label>
                <textarea class="form-control" name="content" rows="15"><?=$content?></textarea>
            
            <div class="text-center mt-3">
                <input type="hidden" name="number" value="<?=$number?>">
                <button type="submit" >수정</button>
            </div>
  
        </form>

    </div>

</div>

<?php }else{

?>  
<script>
    alert("권한이 없습니다.");
    location.replace("<?=$URL?>");
</script> 
<?php   }   ?>

</body>
</html>