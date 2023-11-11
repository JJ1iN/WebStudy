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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/style.css">
        
        <title>Board</title>
    </head>
    <body>
    <section class="ftco-section">
        <div class="container" style="max-width: 100%;">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-3">
                    <h2 class="heading-section">Edit</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">

                <form action="edit_proc.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $postId; ?>">
                    <div class="form-group">
                        <input type="text" class="form-control rounded-left" name="title" value="<?php echo $row['title']; ?>">
                    </div>
                    <div class="form-group d-flex">
                        <textarea class="form-control rounded-left" name="content" style="min-height: 300px;"><?php echo $row['content']; ?></textarea>
                    </div>
                    <div class="form-group d-flex">
                        <?php
                        if ($row['file_path']) { // if file exists
                            $file_path = $row['file_path'];
                            $filename = basename($file_path); ?>
                            <div class="w-50"></div>
                            <div class="w-50 text-md-right">
                                File: <a href='<?php echo $file_path; ?>' download><?php echo $filename; ?></a> <a href='delete_only_file.php?postId=<?php echo $postId; ?>'>❌</a>
                            </div>
                        <?php
                        } else {
                            echo '<input type="file" name="file">';
                        }
                        ?>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <div class="form-group d-md-flex">
                            <div class="w-50"></div>
                            <div class="w-50 text-md-right">
                                <a href="index.php">Back</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded submit px-3">Save</button>
                        </div>
                    </div>
                </form>
    </body>
</html>
