<?php
include 'db_connection.php';

$sql = "SELECT * FROM posts";
$result = $conn->query($sql); // Connect to MySQL database post table
?>

<!doctype html>
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
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Title</th>
                                <th><center>Date</center></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        session_start();
                        if(isset($_SESSION['userid'])) {
                            $logged_in_user_id = $_SESSION['userid'];
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $i = 1;?>
                                    <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><a href="view.php?id=<?php echo $row['id']; ?>"> <?php echo $row['title']; ?></a></td>
                                    <td><center><?php echo $row['create_time']; ?></center></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                            <div class="form-group" style="display: flex; justify-content: space-between;">
                                <div>
                                    User: <?php echo $logged_in_user_id; ?>
                                    <a href="logout.php">Logout</a><br>
                                </div>
                                <div class="text-md-right">
                                    <a href="add.html">New</a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

        
    </section>
    </body>
</html>