<?php require_once "connect.php"; ?>
<a href="/PHPBoard/frontend/html/index.html" id="btn-home" align="center">🏠️</a> 
<?php
if(isset ($_SESSION['userid']) && $_SESSION['userid'] === $rows['id']){
    echo '<a href="./modify.php?number=' . $number . '&id=' . $_rows['id'] . '" id="btn-modify"> 수정 </a>';
    echo '<a href="./board_delete.php?number=' . $number. '&id='. $_rows['id'] . '" id="btn-delete"> 삭제 </a>';
}
?>