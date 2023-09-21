
document.addEventListener('DOMContentLoaded', function() {
    var userInfo = document.getElementById('user-info');
    var searchForm = document.getElementById('search-form');

    searchForm.addEventListener('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        var searchOption = formData.get('search_option');
        var searchQuery = formData.get('search');
    });

    var writeButton = document.getElementById('write-button');
    
    writeButton.addEventListener('click', function() {
        window.location.href = './write.html';
    });
});