<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_POST['userid'];
    $userpw = $_POST['userpw'];

    $sql = "SELECT * FROM user_info WHERE userid='$userid' OR userpw='$userpw'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<script language="javascript">alert("Existing ID")</script>';
        exit;
    } else {
        $sql = "INSERT INTO user_info (userid, userpw) VALUES ('$userid', '$userpw')";
        $conn->query($sql);
    
        header('Location: login.php');
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Board</title>
    </head>
    <body>
        <h2>Register</h2>
        <form method="post" action="register.php">
            <p>ID: <input type="text" name="userid"></p>PW: <input type="password" name="userpw"> <input type="submit" value="register">
        </form>
        <p><a href="login.php">Back</a></p>
    </body>
</html>
