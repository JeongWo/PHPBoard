function deleteComment(comment_number) {
    if (confirm("댓글을 삭제하시겠습니까?")) {
        window.location.href = "./comment_delete.php?number="+comment_number;
    }
}

function deleteReply(reply_number) {
    if (confirm("댓글을 삭제하시겠습니까?")) {
        window.location.href = "./reply_delete.php?number="+reply_number;
    }
}