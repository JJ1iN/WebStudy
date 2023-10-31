<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    $sql = "UPDATE posts SET file_path = NULL WHERE id = $postId";
    $conn->query($sql);
}

header("Location: view.php?id=$postId");
?>