document.addEventListener('DOMContentLoaded', function() {
    var commentReplyForm = document.getElementById('comment-reply-form');
    commentReplyForm.addEventListener('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        fetch('comment_reply_action.php', {
            method: 'POST',
            body: formData
        })
        .then(function(response) {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(function(data) {
            if (data.error) {
                alert(data.error);
            } else {
                alert('댓글이 작성되었습니다.');
                window.location.href = 'view.php?number=' + data.board_number;
            }
        })
        .catch(function(error) {
            console.error('Error:', error);
        });
    });
});