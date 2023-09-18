<?php
require_once "connect.php";
$number = $_GET['number']; 
$id = $_POST['name'];
$pw = $_POST['pw'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');
$hit = $_POST['hit'];

$target_dir = "uploads/";

$target_file = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . basename($_FILES["image"]["name"]);
$uploadOk = 1;
// $imageFileType = mime_content_type($_FILES["image"]["tmp_name"]);
if ($_FILES["image"]["size"] > 5000000) {
    echo "파일이 너무 큽니다.";
    $uploadOk = 0;
}

// if ($imageFileType !== "image/jpeg" && $imageFileType !== "image/png" && $imageFileType !== "image/gif") {
    //     echo "JPG, JPEG, PNG, GIF 형식만 가능합니다.";
    //     $uploadOk = 0; 
    // }
    
    
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            chmod($target_file, 0777);
        echo "파일 " . basename($_FILES["image"]["name"]) . "이 업로드 되었습니다.";
        $image_path = $target_file; 
        $_SESSION['image_path'] = $image_path; 
        var_dump($_SESSION['image_path']);
    } else {
        $error = error_get_last();
        echo "파일 업로드 중에 오류가 발생했습니다."; $error['message'];
        $image_path = "";
    }
} else {
    $image_path = "";
}

$URL = './index.php';

$query = "INSERT INTO board(number,title,content,date,hit,id,password,images) VALUES(null,'$title','$content',NOW(),0,'$id','$pw','$image_path')";
$result = mysqli_query($connect, $query);

if ($result) {
    ?>
    <script>
        alert("<?="글이 등록되었습니다."?>");
        location.replace("<?=$URL?>");
    </script>
    <?php
} else {
    echo "FAIL";
}

mysqli_close($connect);
?>