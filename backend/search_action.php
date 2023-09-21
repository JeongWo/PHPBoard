<?php
require_once "connect.php";

session_start();

if (!isset($_SESSION['userid'])) {
    echo json_encode(['error' => '로그인이 필요합니다.']);
    exit;
}

if (isset($_GET['search_option']) && isset($_GET['search'])) {
    $search_option = $_GET['search_option'];
    $search = $_GET['search'];

    if ($search_option == "t") {
        $query = "SELECT * FROM board WHERE title LIKE '%$search'";
    } else if ($search_option == "w") {
        $query = "SELECT * FROM board WHERE id LIKE '%$search%'";
    } else if ($search_option == "tw") {
        $query = "SELECT * FROM board WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
    }

    $s_result = mysqli_query($connect, $query);
    $boardData = [];

    if (mysqli_num_rows($s_result) > 0) {
        while ($rows = mysqli_fetch_array($s_result)) {
            $boardData[] = $rows;
        }
    }

    echo json_encode($boardData);
} else {
    echo json_encode(['error' => '검색 옵션과 검색어를 입력하세요.']);
}
?>