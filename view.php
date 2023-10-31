<?php
include 'db_connection.php';

/* Get post data */
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    
    $sql = "SELECT * FROM posts WHERE id = $postId";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc(); // associative array: key-value pair
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Board</title>
    </head>
    <body>
        <h1><?php echo $row['title']; ?></h1>
        <p><?php echo $row['content']; ?></p>
        <?php
        if ($row['file_path']) { // if file exists
            $file_path = $row['file_path'];
            $filename = basename($file_path);
            echo "<p>File: <a href='$file_path' download>$filename</a></p>";
        }
        ?>
        <a href="edit.php?id=<?php echo $postId; ?>">Edit</a>
        <a href="delete.php?id=<?php echo $postId; ?>">Delete</a><br>
        <p><a href="index.php">Back</a></p>
    </body>
</html>