<?php
session_start();
include 'db_connection.php';

/* Get post data */
if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    
    $sql = "SELECT * FROM posts WHERE id = $postId";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc(); // associative array: key-value pair
    if (isset($_SESSION['userid'])) {?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Board</title>
        </head>
        <body>
            <h1><?php echo $row['title']; ?></h1>
            <h5>ID: <?php echo $row['userid']; ?> / Date: <?php echo $row['create_time']; ?></h5>
            <p><?php echo $row['content']; ?></p>
            <?php
            if ($row['file_path']) { // if file exists
                $file_path = $row['file_path'];
                $filename = basename($file_path);
                echo "<p>File: <a href='$file_path' download>$filename</a></p>";
            }      
            if ($_SESSION['userid'] == $row['userid']) {
                echo "<p><a href='edit.php?id=$postId'>Edit</a> <a href='delete.php?id=$postId'>Delete</a></p>";  
            }
            ?>
            <p><a href="index.php">Back</a></p>
        </body>
    </html>
    <?php
    }
}
?>