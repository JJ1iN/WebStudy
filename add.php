<?php
include 'db_connection.php';

$title = $_POST['title'];
$content = $_POST['content'];

/* File upload */
if (!empty($_FILES['file']['name'])) { 
    $uploadDir = 'uploads/';
    $file_path = $uploadDir.basename($_FILES['file']['name']); 

    move_uploaded_file($_FILES['file']['tmp_name'], $file_path); 
    $sql = "INSERT INTO posts (title, content, file_path) VALUES ('$title', '$content', '$file_path')";
} else {
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
}

$conn->query($sql);

header('Location: index.php');
?>