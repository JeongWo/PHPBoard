<?php
include "connect.php";
$id=$_GET['id'];
$number=$_GET['number'];
$query= "SELECT title, content, date, id FROM board WHERE number=$number";
$result=$connect->query($query);
$rows=mysqli_fetch_assoc($result);

$title=$rows['title'];
$content=$rows['content'];
$usrid=$rows['id'];

session_start();
$URL="./main.php";
if(!isset($_SESSION['userid'])) {
    ?> <script>
        alert("권한이 없습니다.");
        location.replace("<?=$URL?>");
    </script>
<?php }
else if($_SESSION['userid']==$usrid){
?>
<form action="modify_action.php" method="post" >
<table style="padding-top:50px" align=center width=700 border=0 cellpadding=2>
<tr>
    <td height=20 align=center bgcolor=#ccc><font color=white>글수정</font></td>
</tr>
<tr>
    <td bgcolor=white>
        <table class="table2">
            <tr>
                <td>작성자</td>
                <td><?=$_SESSION['userid']?></td>
            </tr>

            <tr> 
                <td>제목</td>
                <td><input type="text name" name="title"  size=60 value=<?=$title?>></td>
            </tr>

            <tr>
                <td>내용</td>
                <td><textarea name="content" cols=85 rows=15><?=$content?></textarea></td>
            </tr>

            <center>
                <input type="hidden" name="number" value="<?=$number?>">
                <input type="submit" value="수정">
            </center>
    </td>
</tr>
</table>
<?php }else{

?>  
<script>
    alert("권한이 없습니다.");
    location.replace("<?=$URL?>");
</script> 
<?php   }   ?>