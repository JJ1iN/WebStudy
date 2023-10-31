<?php
include 'db_connection.php';

$postId = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];

/* File upload */
if (!empty($_FILES['file']['name'])) { 
    $uploadDir = 'uploads/';
    $file_path = $uploadDir.basename($_FILES['file']['name']); 

    move_uploaded_file($_FILES['file']['tmp_name'], $file_path); 
    $update_query = "UPDATE posts SET title = '$title', content = '$content', file_path = '$file_path' WHERE id = $postId";
} else {
    $update_query = "UPDATE posts SET title = '$title', content = '$content' WHERE id = $postId";
}

$conn->query($update_query);

header('Location: view.php?id='.$postId);
?>