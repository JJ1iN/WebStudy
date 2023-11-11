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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/style.css">

        <title>Board</title>
    </head>
    <body>
    <section class="ftco-section">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2>LOGIN</h2>
            </div>
        </div>   
            
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap p-4 p-md-5">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-user-o"></span>
                    </div>
                <br>
                <form method="post" action="login.php">
                    <div class="form-group">
                        <input type="text" class="form-control rounded-left" name="userid" placeholder="Username">
                    </div>
                    <div class="form-group d-flex">
                        <input type="password" class="form-control rounded-left" name="userpw" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50"></div>
                        <div class="w-50 text-md-right">
                            <a href="register.php">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    </body>
</html>
