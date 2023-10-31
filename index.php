<?php
include 'db_connection.php';

$sql = "SELECT * FROM posts";
$result = $conn->query($sql); // Connect to MySQL database post table
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Board</title>
    </head>
    <body>
        <h1>Board</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {?>
                <li><a href="view.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>
                <?php
            }
        }
        ?> 
        <p><a href="add.html">New</a></p>
    </body>
</html>