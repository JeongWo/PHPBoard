<?php
require "connect.php";

$reply_number = $_GET['number'];
$board_number = $_POST['board_number'];

$query = "DELETE FROM comment_reply WHERE reply_number='$reply_number'";
mysqli_query($connect, $query);

header("Location: view.php?number=$board_number");
?>
