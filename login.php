<?php
include 'db_connection.php';

$sql = "SELECT * FROM user_info";
$result = $conn->query($sql); // Connect to MySQL database post table

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['userid'] == $_POST['userid'] && $row['userpw'] == $_POST['userpw']) {
                session_start();
                $_SESSION['userid'] = $row['userid'];
                header('Location: index.php');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Board</title>
    </head>
    <body>
        <h2>Login</h2>
        <form method="post" action="login.php">
            <p>ID: <input type="text" name="userid"></p>PW: <input type="password" name="userpw"> <input type="submit" value="login">
        </form>
        <p><a href="register.php">register</a></p>
    </body>
</html>
