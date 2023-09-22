<?php require_once "connect.php"; ?>

<div class="mt-5">
    <div class="d-flex justify-content-between">
        <h3 class="text-center">댓글</h3>
        <?php if (isset($_SESSION['userid'])) { ?>
           
        <?php } else { ?>
            <button id="btn-login" onclick="location.href='/PHPBoard/backend/php/login_action.php'">로그인</button>
        <?php } ?>
    </div>

</div>