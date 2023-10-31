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
        <h1>Edit</h1>
        <form action="edit_proc.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $postId; ?>">
            <p>Title: <input type="text" name="title" value="<?php echo $row['title']; ?>"></p>
            <p>Content: <textarea name="content"><?php echo $row['content']; ?></textarea></p>
            <?php
            if ($row['file_path']) { // if file exists
                $file_path = $row['file_path'];
                $filename = basename($file_path);
                echo "<p>File: $filename</a>";
                echo "&nbsp; <a href='$file_path' download>Download</a>";
                echo "&nbsp; <a href='delete_only_file.php?id=$postId'>Delete</a></p>";
            } else {
                echo '<p>File: <input type="file" name="file"></p>';
            }
            ?>  
            <p><input type="submit" value="Save"></p>
        </form>
        <a href="index.php">Back</a> 
    </body>
</html>
