<?php

require_once "connect.php";

$number = $_GET['number'];
$id = $_POST['name'];
$pw = $_POST['pw'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');
$hit = $_POST['hit'];


$target_dir = "uploads/"; // 이미지가 저장될 폴더
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$URL = './index.php';

$query = 
"INSERT INTO board(number,title,content,date,hit,id,password)
VALUES(null,'$title','$content',NOW(),0,'$id','$pw')";    
    $result = mysqli_query($connect,$query);
    if($result){
?>      <script>
            alert("<?="글이 등록되었습니다."?>");
            location.replace("<?=$URL?>");
        </script>
<?php
    }else{
        echo "FAIL";
    }
    mysqli_close($connect);


// 파일 크기 제한 (여기선 5MB로 설정)
if ($_FILES["image"]["size"] > 5000000) {
    echo "파일이 너무 큽니다.";
    $uploadOk = 0;
  }

// 원하는 파일 형식만 허용
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif") {
  echo "JPG, JPEG, PNG, GIF 형식만 허용됩니다.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "파일을 업로드할 수 없습니다.";
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "파일 " . htmlspecialchars(basename($_FILES["image"]["name"])) . "이(가) 업로드 되었습니다.";

    // 이미지 업로드 성공 시, 데이터베이스에 정보 저장
    $query =
      "INSERT INTO board (number, title, content, date, hit, id, password, image_path)
      VALUES (null, '$title', '$content', '$date', $hit, '$id', '$pw', '$target_file')";
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
  } else {
    echo "파일 업로드 중에 오류가 발생했습니다.";
  }
}

mysqli_close($connect);
?>
