<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    $sql = "DELETE FROM posts WHERE id = $postId";
    $conn->query($sql);
}

header('Location: index.php');
?>