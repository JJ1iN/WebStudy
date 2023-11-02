<?php
session_start();
if(isset($_SESSION['userid'])) {
    include 'db_connection.php';

    $userid = $_SESSION['userid'];

    $title = $_POST['title'];
    $content = $_POST['content'];
    $current_time = date("Y-m-d H:i:s");

    /* File upload */
    if (!empty($_FILES['file']['name'])) { 
        $uploadDir = 'uploads/';
        $file_path = $uploadDir.basename($_FILES['file']['name']); 

        move_uploaded_file($_FILES['file']['tmp_name'], $file_path); 
        // title, content, file_path, created_at, updated_at, user_id 넣기
        $sql = "INSERT INTO posts (title, content, file_path, create_time, userid) VALUES ('$title', '$content', '$file_path', '$current_time', '$userid')";
    } else {
        $sql = "INSERT INTO posts (title, content, create_time, userid) VALUES ('$title', '$content', '$current_time', '$userid')";
    }

    $conn->query($sql);

    header('Location: index.php');
}
?>