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
                        <h2 class="heading-section">Board</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
				<div class="container">
                    <div class="form-group" style="display: flex; justify-content: space-between;">
                        <div>
                            User: <?php echo $row['userid']; ?>
                            <a href="logout.php">Logout</a><br>
                        </div>
                        <div class="text-md-right">
                            <?php 
                            if ($_SESSION['userid'] == $row['userid']) {
                                echo "<a href='edit.php?id=$postId'>Edit</a> <a href='delete.php?id=$postId'>Delete</a>";  
                            }
                            ?>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th><center>Title</center></th>
                                <th><center>Date</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><center><?php echo $row['title']; ?></center></td>
                                <td><center><?php echo $row['create_time']; ?></center></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table">
                        <thead>
                            <tr>
                                <th><center>Content</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid #dee2e6;">
                                    <center><?php echo $row['content']; ?></center>
                                </td>                            
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-group" style="display: flex; justify-content: space-between;">
                        <div>
                            <a href="index.php">Back</a>
                        </div>
                        <div class="text-md-right">                       
                            <?php
                            if ($row['file_path']) { // if file exists
                                $file_path = $row['file_path'];
                                $filename = basename($file_path);
                                echo "<p>File: <a href='$file_path' download>$filename</a></p>";
                            } 
                            ?>
                        </div>
                    </div>  
                </div>
            </div>  
        </section>
        </body>
    </html>
<?php
    }
}
?>