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
					<h2>REGISTER</h2>
				</div>
			</div>   
            
            <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
				<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
                <br>
                <form method="post" action="register.php">
                    <div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="userid" placeholder="Username">
		      		</div>
                    <div class="form-group d-flex">
                        <input type="password" class="form-control rounded-left" name="userpw" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    </body>
</html>
